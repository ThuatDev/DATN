<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;
use App\Models\Producer;
use App\Models\ProductDetail;
use App\Models\Advertise;
use App\Models\Post;
use Carbon\Carbon;
class HomePage extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {

    // $products = Product::select('id', 'name', 'image', 'slug', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'rate')
    //   ->whereHas('product_detail', function (Builder $query) {
    //     $query->where('quantity', '>', 0);
    //   })
    //   ->with([
    //     'product_detail' => function ($query) {
    //       $query->select('id', 'product_id', 'quantity', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date')
    //         ->where('quantity', '>', 0)
    //         ->orderBy('sale_price', 'ASC');
    //     },
    //     'productImages' => function ($query) {
    //       $query->select('product_images.id', 'product_detail_id', 'image_name'); // chỉ định rõ trường id ở đây
    //     },
    //   ])
    //   ->latest()
    //   ->limit(8)
    //   ->get();
    $product_phone = Product::select('id', 'name', 'image', 'slug', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'rate', 'category_id')
      ->whereHas('product_detail', function (Builder $query) {
        $query->where('quantity', '>', 0);
      })
      ->where('category_id', '=', '1') // Thay 'your_category_id_for_phone' bằng giá trị category_id cho điện thoại
      ->with([
        'product_detail' => function ($query) {
          $query->select('id', 'product_id', 'quantity', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date')
            ->where('quantity', '>', 0)
            ->orderBy('sale_price', 'ASC');
        },
        'productImages' => function ($query) {
          $query->select('product_images.id', 'product_detail_id', 'image_name'); // chỉ định rõ trường id ở đây
        },
      ])
      ->latest()
      ->limit(8)
      ->get();
    //   dd ($product_phone->toArray());
    // dd ($products->toArray());
    $product_watch = Product::select('id', 'name', 'image', 'slug', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'rate', 'category_id')
      ->whereHas('product_detail', function (Builder $query) {
        $query->where('quantity', '>', 0);
      })
      ->where('category_id', '=', '2') // Thay 'your_category_id_for_watch' bằng giá trị category_id cho đồng hồ
      ->with([
        'product_detail' => function ($query) {
          $query->select('id', 'product_id', 'quantity', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date')
            ->where('quantity', '>', 0)
            ->orderBy('sale_price', 'ASC');
        },
        'productImages' => function ($query) {
          $query->select('product_images.id', 'product_detail_id', 'image_name'); // chỉ định rõ trường id ở đây
        },
      ])
      ->latest()
      ->limit(8)
      ->get();
    //   dd ($product_watch->toArray());

$product_phukien = Product::select('id', 'name', 'image', 'slug', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'rate', 'category_id')
    ->whereHas('product_detail', function ($query) {
        $query->where('quantity', '>', 0);
    })
    ->where(function ($query) {
        $query->orWhere('category_id', '<>', '3') // Thay 'your_specific_category_id' bằng giá trị category_id cụ thể
              ->orWhereNull('category_id');
    })
    ->with([
        'product_detail' => function ($query) {
            $query->select('id', 'product_id', 'quantity', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date')
                ->where('quantity', '>', 0)
                ->orderBy('sale_price', 'ASC');
        },
        'productImages' => function ($query) {
            $query->select('product_images.id', 'product_detail_id', 'image_name'); // chỉ định rõ trường id ở đây
        },
    ])
    ->latest()
    ->limit(8)
    ->get();
    //   dd ($product_phukien->toArray());

$favorite_products = Product::select('id', 'name', 'image', 'slug', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'rate', 'discount', 'start_date', 'end_date', 'category_id')
    ->whereHas('product_detail', function (Builder $query) {
        $query->where('quantity', '>', 0);
    })
    ->whereNotNull('start_date')
    ->whereNotNull('end_date')
    ->with(['product_detail' => function ($query) {
        $query->select('id', 'product_id', 'quantity', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date')
            ->where('quantity', '>', 0)
            ->orderBy('sale_price', 'ASC');
    },    'productImages' => function ($query) {
            $query->select('product_images.id', 'product_detail_id', 'image_name'); // chỉ định rõ trường id ở đây
        },
    ])
    ->latest()
    ->orderBy('rate', 'DESC')
    ->limit(10)
    ->get();

// Thêm trường giá flash sale và thời gian giảm giá còn lại
foreach ($favorite_products as $product) {
    // Tính giá sau khi giảm giá
    $discountedPrice = $product->product_detail->sale_price - ($product->product_detail->sale_price * $product->discount / 100);

    // Cập nhật giá flash sale vào sản phẩm
    $product->flash_sale_price = $discountedPrice;

    // Tính thời gian giảm giá còn lại
    $now = Carbon::now();
    $promotionEndDate = Carbon::parse($product->end_date);

    // Kiểm tra xem thời gian kết thúc có lớn hơn thời gian hiện tại không
    if ($now->lessThan($promotionEndDate)) {
          $remainingTime = $now->diff($promotionEndDate)->format('%H giờ %i phút %s giây');
        $totalSeconds = $now->diffInSeconds($promotionEndDate);
        $product->remaining_time = $remainingTime;
        $product->total_seconds = $totalSeconds;
    } else {
        $product->remaining_time = 'Đã kết thúc';
        $product->total_seconds = 0;
    }
}

// dd($favorite_products->toArray());

//     dd ($favorite_products->toArray());

        $producers = Producer::select('id', 'name')->get();
    $advertises = Advertise::where([
      ['start_date', '<=', date('Y-m-d')],
      ['end_date', '>=', date('Y-m-d')],
      ['at_home_page', '=', true]
    ])->latest()->limit(5)->get(['product_id', 'title', 'image']);

    $posts = Post::select('id', 'title', 'image', 'created_at')->latest()->limit(4)->get();
    // dd($products);
    return view('pages.home')->with('data', [ 'product_phone' => $product_phone,
    'product_watch' => $product_watch,
    'product_phukien' => $product_phukien,'favorite_products' => $favorite_products, 'posts' => $posts, 'advertises' => $advertises, 'producers' => $producers]);
  }
}
