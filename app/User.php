<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\ActiveAccountNotification;
use App\Models\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'active_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'active_token',
    ];

    /**
     * Relationships
    **/

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function notices() {
        return $this->hasMany('App\Models\Notice');
    }
    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
    public function product_votes() {
        return $this->hasMany('App\Models\ProductVote');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
public function sendActiveAccountNotification($token)
{
    $this->notify(new ActiveAccountNotification($token));
}



   public function userOrders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

 public function hasPurchased($product_id)
{
    // Kiểm tra xem người dùng có đơn hàng nào chứa sản phẩm này hay không
    return $this->orders()->whereHas('order_details.product_detail.product', function ($query) use ($product_id) {
        $query->where('id', $product_id);
    })->exists();
}

    public function canReviewProduct($product_id)
    {
        // Kiểm tra xem người dùng có thể đánh giá sản phẩm với $product_id hay không
        return $this->hasPurchased($product_id);
    }

}
