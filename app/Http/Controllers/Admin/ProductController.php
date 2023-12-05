<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// thêm use Str

use App\Models\Category;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Promotion;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\OrderDetail;

class ProductController extends Controller
{
// Trong hàm index của controller
public function index(Request $request)
{
    // Lấy danh sách products với thông tin từ category
    $products = Product::select('id', 'producer_id', 'name', 'slug','image', 'sku_code', 'OS', 'rate', 'created_at')
        ->whereHas('product_details', function ($query) {
            $query->where('import_quantity', '>', 0);
        })
        ->with([
            'producer' => function ($query) {
                // Thay đổi để load thông tin từ category
                $query->select('id', 'category_id')->with('category:id,name');
            }
        ])
        ->withCount([
            'product_details' => function ($query) {
                $query->where([['import_quantity', '>', 0], ['quantity', '>', 0]]);
            }
        ])->latest()->get();

    // Lấy danh sách types từ các categories
    $categories = Category::all();
    $types = $categories->pluck('name')->toArray();

    $selectedType = $request->input('type');


    // dd($selectedType);

    return view('admin.product.index', compact('products', 'types', 'selectedType'));
}

  public function delete(Request $request)
  {
    $product = Product::whereHas('product_details', function (Builder $query) {
      $query->where('import_quantity', '>', 0);
    })->where('id', $request->product_id)->first();

    if(!$product) {

      $data['type'] = 'error';
      $data['title'] = 'Thất Bại';
      $data['content'] = 'Bạn không thể xóa sản phẩm không tồn tại!';
    } else {

      $can_delete = 1;
      $product_details = $product->product_details;
      foreach($product_details as $product_detail) {
        if($product_detail->import_quantity == 0 || $product_detail->import_quantity != $product_detail->quantity) {
          $can_delete = 0;
          break;
        }
      }

      if($can_delete) {

        foreach($product_details as $product_detail) {
          foreach($product_detail->product_images as $image) {
            Storage::disk('public')->delete('images/products/' . $image->image_name);
            $image->delete();
          }
          $product_detail->delete();
        }
        foreach ($product->promotions as $promotion) {
          $promotion->delete();
        }
        foreach ($product->product_votes as $product_vote) {
          $product_vote->delete();
        }
        $product->delete();
      } else {
        foreach($product_details as $product_detail) {
          if($product_detail->import_quantity > 0 && $product_detail->import_quantity == $product_detail->quantity) {

            foreach($product_detail->product_images as $image) {
              Storage::disk('public')->delete('images/products/' . $image->image_name);
              $image->delete();
            }
            $product_detail->delete();
          } else {

            $product_detail->import_quantity = 0;
            $product_detail->quantity = 0;
            $product_detail->save();
          }
        }
        foreach ($product->promotions as $promotion) {
          $promotion->delete();
        }
      }

      $data['type'] = 'success';
      $data['title'] = 'Thành Công';
      $data['content'] = 'Xóa sản phẩm thành công!';
    }

    return response()->json($data, 200);
  }
public function create_phone(Request $request)
{
    // Logic xử lý nếu cần
    return view('admin.product.create_phone');
}

public function create_watch(Request $request)
{
    $producers = Producer::select('id', 'name')->orderBy('name', 'asc')->get();
    $categories = Category::pluck('name', 'id')->toArray();
    $defaultCategory = 'Đồng hồ'; // Tên danh mục mặc định nếu không chọn

    // dd ($defaultCategory);
    return view('admin.product.create_watch', compact('producers', 'categories', 'defaultCategory'));
}

public function create_accessory(Request $request)
{
    // $producers = Producer::select('id', 'name')->orderBy('name', 'asc')->get();
    $categories = Category::pluck('name', 'id')->toArray();
    $defaultCategory = 'Phụ kiện'; // Tên danh mục mặc định nếu không chọn

    // dd ($defaultCategory);
    return view('admin.product.create_accessory', compact( 'categories', 'defaultCategory'));
}

public function new(Request $request)
{
    $producers = Producer::select('id', 'name')->orderBy('name', 'asc')->get();
    $type = $request->input('type', 'default_type');
    // Mặc định giá trị nếu không có giá trị được truyền

    // Dựa vào điều kiện nào đó, chọn một trong những view để trả về
    // if ($type == 'watch') {
    //     return view('admin.product.create_watch', compact('type', 'producers'));
    // } else {
    //     return view('admin.product.new', compact('type', 'producers'));
    // }
        $defaultCategory = 'Điện thoại' ;

    return view('admin.product.new', compact('type', 'producers', 'defaultCategory'));
}


public function save(Request $request)
{
    $product = new Product;


    // dd ($watchCategoryId);

    // Khắc phục lỗi DOMDocument
    libxml_use_internal_errors(true);

    // Xử lý thông tin chi tiết sản phẩm
    if ($request->information_details != null) {
        $information_details = $request->information_details;

        $dom = new \DomDocument();
        $information_details = mb_convert_encoding($information_details, 'HTML-ENTITIES', "UTF-8");
        $dom->loadHtml($information_details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Xử lý ảnh trong nội dung
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){

          $data = $img->getAttribute('src');

          if(Str::containsAll($data, ['data:image', 'base64'])){

              list(, $type) = explode('data:image/', $data);
              list($type, ) = explode(';base64,', $type);

              list(, $data) = explode(';base64,', $data);

              $data = base64_decode($data);

              $image_name = time().$k.'_'.Str::random(8).'.'.$type;

              Storage::disk('public')->put('images/posts/'.$image_name, $data);

              $img->removeAttribute('src');
              $img->setAttribute('src', '/storage/images/posts/'.$image_name);
          }
      }

        $information_details = $dom->saveHTML();
        $information_details = mb_convert_encoding($information_details, "UTF-8", 'HTML-ENTITIES');
        list($information_details) = explode('<html><body>', $information_details);
        list($information_details ) = explode('</body></html>', $information_details);

        $product->information_details = $information_details;
    }

    // Xử lý giới thiệu sản phẩm
    if ($request->product_introduction != null) {
        $product_introduction = $request->product_introduction;

        $dom = new \DomDocument();
        $product_introduction = mb_convert_encoding($product_introduction, 'HTML-ENTITIES', "UTF-8");
        $dom->loadHtml($product_introduction, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Xử lý ảnh trong nội dung
        $images = $dom->getElementsByTagName('img');
           foreach($images as $k => $img){

          $data = $img->getAttribute('src');

          if(Str::containsAll($data, ['data:image', 'base64'])){

              list(, $type) = explode('data:image/', $data);
              list($type, ) = explode(';base64,', $type);

              list(, $data) = explode(';base64,', $data);

              $data = base64_decode($data);

              $image_name = time().$k.'_'.Str::random(8).'.'.$type;

              Storage::disk('public')->put('images/posts/'.$image_name, $data);

              $img->removeAttribute('src');
              $img->setAttribute('src', '/storage/images/posts/'.$image_name);
          }
      }

        $product_introduction = $dom->saveHTML();
        $product_introduction = mb_convert_encoding($product_introduction, "UTF-8", 'HTML-ENTITIES');
        list( $product_introduction) = explode('<html><body>', $product_introduction);
        list($product_introduction ) = explode('</body></html>', $product_introduction);

        $product->product_introduction = $product_introduction;
    }

    // Thiết lập các thuộc tính cơ bản của sản phẩm

    $product->slug = Str::slug($request->name);
    $product->name = $request->name;
// nếu category khác Điện thoại thì không hiện các thông số kỹ thuật dưới đây


    // dd ($categoryName);
    // So sánh với
        $categories = Category::pluck('name', 'id')->toArray();
        $defaultCategory = $request->input('defaultCategory');
        // dd ($defaultCategory);
        // với <input type="hidden" name="defaultCategory" value="{{ $defaultCategory }}">
if (in_array($defaultCategory, $categories)) {

    // Nếu category là defaultCategory, thực hiện xử lý cho sản phẩm là đồng hồ
    // lưu vào trường category_id của bảng products
    $watchCategoryId = Category::where('name', $defaultCategory)->first()->id;
    $product->category_id = $watchCategoryId;
    $product->producer_id = $request->producer_id;
    $product->sku_code = $request->sku_code;
    // $product->monitor = $request->monitor;
    // $product->front_camera = $request->front_camera;
    // $product->rear_camera = $request->rear_camera;
    // $product->CPU = $request->CPU;
    // $product->GPU = $request->GPU;
    // $product->RAM = $request->RAM;
    // $product->ROM = $request->ROM;
    // $product->OS = $request->OS;
    // $product->pin = $request->pin;
    // Bạn có thể thêm xử lý khác nếu cần
} else {
    // Nếu category khác defaultCategory, thực hiện xử lý cho sản phẩm không phải là đồng hồ
    // Đánh dấu sản phẩm không phải là đồng hồ

    // Gán các thông số kỹ thuật từ request vào sản phẩm
    // $product->producer_id = $request->producer_id;
    // $product->sku_code = $request->sku_code;
    // $product->monitor = $request->monitor;
    // $product->front_camera = $request->front_camera;
    // $product->rear_camera = $request->rear_camera;
    // $product->CPU = $request->CPU;
    // $product->GPU = $request->GPU;
    // $product->RAM = $request->RAM;
    // $product->ROM = $request->ROM;
    // $product->OS = $request->OS;
    // $product->pin = $request->pin;

    // Bạn có thể thêm xử lý khác nếu cần
}


    // Lấy id của category để lưu vào product



    $product->rate = 5.0;

    // Xử lý ảnh sản phẩm
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = time().'_'.Str::random(8).'_'.$image->getClientOriginalName();
        $image->storeAs('images/products', $image_name, 'public');
        $product->image = $image_name;
    }


    // dd ($categories);
    // dd ($product);

    $product->save();


    // Xử lý khuyến mãi
    if ($request->has('product_promotions')) {
        foreach ($request->product_promotions as $product_promotion) {
        $promotion = new Promotion;
        $promotion->product_id = $product->id;
        $promotion->content = $product_promotion['content'];

        //Xử lý ngày bắt đầu, ngày kết thúc
        list($start_date, $end_date) = explode(' - ', $product_promotion['promotion_date']);

        $start_date = str_replace('/', '-', $start_date);
        $start_date = date('Y-m-d', strtotime($start_date));

        $end_date = str_replace('/', '-', $end_date);
        $end_date = date('Y-m-d', strtotime($end_date));

        $promotion->start_date = $start_date;
        $promotion->end_date = $end_date;

        $promotion->save();
      }
    }

    // Xử lý chi tiết sản phẩm
    if ($request->has('product_details')) {
      foreach ($request->product_details as $key => $product_detail) {
        $new_product_detail = new ProductDetail;
        $new_product_detail->product_id = $product->id;
        $new_product_detail->color = $product_detail['color'];
        $new_product_detail->import_quantity = $product_detail['quantity'];
        // thêm capacity
        $new_product_detail->capacity = $product_detail['capacity'];

        $new_product_detail->quantity = $product_detail['quantity'];
        $new_product_detail->import_price = str_replace('.', '', $product_detail['import_price']);
        $new_product_detail->sale_price = str_replace('.', '', $product_detail['sale_price']);
        if($product_detail['promotion_price'] != null) {
          $new_product_detail->promotion_price = str_replace('.', '', $product_detail['promotion_price']);
        }
        if($product_detail['promotion_date'] != null) {
          //Xử lý ngày bắt đầu, ngày kết thúc
          list($start_date, $end_date) = explode(' - ', $product_detail['promotion_date']);

          $start_date = str_replace('/', '-', $start_date);
          $start_date = date('Y-m-d', strtotime($start_date));

          $end_date = str_replace('/', '-', $end_date);
          $end_date = date('Y-m-d', strtotime($end_date));

          $new_product_detail->promotion_start_date = $start_date;
          $new_product_detail->promotion_end_date = $end_date;
        }

        $new_product_detail->save();

        foreach ($request->file('product_details')[$key]['images'] as $image) {
          $image_name = time().'_'.Str::random(8).'_'.$image->getClientOriginalName();
          $image->storeAs('images/products',$image_name,'public');

          $new_image = new ProductImage;
          $new_image->product_detail_id = $new_product_detail->id;
          $new_image->image_name = $image_name;

          $new_image->save();
        }
      }
    }

    // Chuyển hướng với thông báo thành công
    return redirect()->route('admin.product.index')->with(['alert' => [
        'type' => 'success',
        'title' => 'Thành Công',
        'content' => 'Thêm sản phẩm thành công.'
    ]]);
}
  public function edit($id)
  {
    $producers = Producer::select('id', 'name')->orderBy('name', 'asc')->get();
    $product = Product::select('id', 'producer_id', 'name', 'image', 'sku_code', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU', 'RAM', 'ROM', 'OS', 'pin', 'information_details', 'product_introduction')
    ->whereHas('product_details', function (Builder $query) {
      $query->where('import_quantity', '>', 0);
    })->where('id', $id)->with([
      'promotions' => function ($query) {
        $query->select('id', 'product_id', 'content', 'start_date', 'end_date');
      },
      'product_details' => function ($query) {
        $query->select('id', 'product_id', 'color', 'import_quantity', 'import_price', 'sale_price', 'promotion_price', 'promotion_start_date', 'promotion_end_date','capacity')->where('import_quantity', '>', 0)
        ->with([
          'product_images' => function ($query) {
            $query->select('id', 'product_detail_id', 'image_name');
          },
          'order_details' => function ($query) {
            $query->select('id', 'product_detail_id', 'quantity');
          }
        ]);
      }
    ])->first();
    if(!$product) abort(404);
    return view('admin.product.edit')->with(['product' => $product, 'producers' =>$producers]);
  }

  public function update(Request $request, $id)
{
    $product = Product::whereHas('product_details', function (Builder $query) {
        $query->where('import_quantity', '>', 0);
    })->where('id', $id)->first();

    if(!$product) abort(404);

    libxml_use_internal_errors(true); // Bỏ qua lỗi cú pháp XML

    if($request->information_details != null) {
        $information_details = $request->information_details;

        $dom = new \DomDocument();
        $information_details = mb_convert_encoding($information_details, 'HTML-ENTITIES', "UTF-8");
        $dom->loadHtml($information_details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Xử lý ảnh trong nội dung
        $images = $dom->getElementsByTagName('img');
      foreach($images as $k => $img){

          $data = $img->getAttribute('src');

          if(Str::containsAll($data, ['data:image', 'base64'])){

              list(, $type) = explode('data:image/', $data);
              list($type, ) = explode(';base64,', $type);

              list(, $data) = explode(';base64,', $data);

              $data = base64_decode($data);

              $image_name = time().$k.'_'.Str::random(8).'.'.$type;

              Storage::disk('public')->put('images/posts/'.$image_name, $data);

              $img->removeAttribute('src');
              $img->setAttribute('src', '/storage/images/posts/'.$image_name);
          }
      }

        $information_details = mb_convert_encoding($dom->saveHTML(), "UTF-8", 'HTML-ENTITIES');
        list( $information_details) = explode('<html><body>', $information_details);
        list($information_details ) = explode('</body></html>', $information_details);
        $product->information_details = $information_details;
    }

    if($request->product_introduction != null) {
      //Xử lý Ảnh trong nội dung
      $product_introduction = $request->product_introduction;

      $dom = new \DomDocument();

      // conver utf-8 to html entities
      $product_introduction = mb_convert_encoding($product_introduction, 'HTML-ENTITIES', "UTF-8");

      $dom->loadHtml($product_introduction, LIBXML_HTML_NODEFDTD);

      $images = $dom->getElementsByTagName('img');

      foreach($images as $k => $img){

          $data = $img->getAttribute('src');

          if(Str::containsAll($data, ['data:image', 'base64'])){

              list(, $type) = explode('data:image/', $data);
              list($type, ) = explode(';base64,', $type);

              list(, $data) = explode(';base64,', $data);

              $data = base64_decode($data);

              $image_name = time().$k.'_'.Str::random(8).'.'.$type;

              Storage::disk('public')->put('images/posts/'.$image_name, $data);

              $img->removeAttribute('src');
              $img->setAttribute('src', '/storage/images/posts/'.$image_name);
          }
      }

      $product_introduction = $dom->saveHTML();

      //conver html-entities to utf-8
      $product_introduction = mb_convert_encoding($product_introduction, "UTF-8", 'HTML-ENTITIES');

      //get content
      list(, $product_introduction) = explode('<html><body>', $product_introduction);
      list($product_introduction, ) = explode('</body></html>', $product_introduction);

      $product->product_introduction = $product_introduction;
    }
    $product->slug = Str::slug($request->name);
    $product->name = $request->name;
    $product->producer_id = $request->producer_id;
    $product->sku_code = $request->sku_code;
    $product->monitor = $request->monitor;
    $product->front_camera = $request->front_camera;
    $product->rear_camera = $request->rear_camera;
    $product->CPU = $request->CPU;
    $product->GPU = $request->GPU;
    $product->RAM = $request->RAM;
    $product->ROM = $request->ROM;
    $product->OS = $request->OS;
    $product->pin = $request->pin;

    if($request->hasFile('image')){
      $image = $request->file('image');
      $image_name = time().'_'.Str::random(8).'_'.$image->getClientOriginalName();
      $image->storeAs('images/products',$image_name,'public');
      Storage::disk('public')->delete('images/products/' . $product->image);
      $product->image = $image_name;
    }

    $product->save();

    if ($request->has('old_product_promotions')) {
      foreach ($request->old_product_promotions as $key => $old_product_promotion) {
        $promotion = Promotion::where('id', $key)->first();
        if(!$promotion) abort(404);

        $promotion->content = $old_product_promotion['content'];

        //Xử lý ngày bắt đầu, ngày kết thúc
        list($start_date, $end_date) = explode(' - ', $old_product_promotion['promotion_date']);

        $start_date = str_replace('/', '-', $start_date);
        $start_date = date('Y-m-d', strtotime($start_date));

        $end_date = str_replace('/', '-', $end_date);
        $end_date = date('Y-m-d', strtotime($end_date));

        $promotion->start_date = $start_date;
        $promotion->end_date = $end_date;

        $promotion->save();
      }
    }

    if ($request->has('product_promotions')) {
      foreach ($request->product_promotions as $product_promotion) {
        $promotion = new Promotion;
        $promotion->product_id = $product->id;
        $promotion->content = $product_promotion['content'];

        //Xử lý ngày bắt đầu, ngày kết thúc
        list($start_date, $end_date) = explode(' - ', $product_promotion['promotion_date']);

        $start_date = str_replace('/', '-', $start_date);
        $start_date = date('Y-m-d', strtotime($start_date));

        $end_date = str_replace('/', '-', $end_date);
        $end_date = date('Y-m-d', strtotime($end_date));

        $promotion->start_date = $start_date;
        $promotion->end_date = $end_date;

        $promotion->save();
      }
    }

    if ($request->has('old_product_details')) {
      foreach ($request->old_product_details as $key => $product_detail) {
        $sum = OrderDetail::where('product_detail_id', $key)->sum('quantity');
        $old_product_detail = ProductDetail::where('id', $key)->first();
        if(!$old_product_detail) abort(404);

        $old_product_detail->color = $product_detail['color'];
        $old_product_detail->import_quantity = $product_detail['quantity'];
        $old_product_detail->quantity = $product_detail['quantity'] - $sum;
        $old_product_detail->import_price = str_replace('.', '', $product_detail['import_price']);
        $old_product_detail->sale_price = str_replace('.', '', $product_detail['sale_price']);
        if($product_detail['promotion_price'] != null) {
          $old_product_detail->promotion_price = str_replace('.', '', $product_detail['promotion_price']);
        }
        if($product_detail['promotion_date'] != null) {
          //Xử lý ngày bắt đầu, ngày kết thúc
          list($start_date, $end_date) = explode(' - ', $product_detail['promotion_date']);

          $start_date = str_replace('/', '-', $start_date);
          $start_date = date('Y-m-d', strtotime($start_date));

          $end_date = str_replace('/', '-', $end_date);
          $end_date = date('Y-m-d', strtotime($end_date));

          $old_product_detail->promotion_start_date = $start_date;
          $old_product_detail->promotion_end_date = $end_date;
        }

        $old_product_detail->save();
      }
    }

    if ($request->has('product_details')) {
      foreach ($request->product_details as $key => $product_detail) {
        $new_product_detail = new ProductDetail;
        $new_product_detail->product_id = $product->id;
        $new_product_detail->color = $product_detail['color'];
        $new_product_detail->import_quantity = $product_detail['quantity'];
        $new_product_detail->quantity = $product_detail['quantity'];
        $new_product_detail->import_price = str_replace('.', '', $product_detail['import_price']);
        $new_product_detail->sale_price = str_replace('.', '', $product_detail['sale_price']);
        if($product_detail['promotion_price'] != null) {
          $new_product_detail->promotion_price = str_replace('.', '', $product_detail['promotion_price']);
        }
        if($product_detail['promotion_date'] != null) {
          //Xử lý ngày bắt đầu, ngày kết thúc
          list($start_date, $end_date) = explode(' - ', $product_detail['promotion_date']);

          $start_date = str_replace('/', '-', $start_date);
          $start_date = date('Y-m-d', strtotime($start_date));

          $end_date = str_replace('/', '-', $end_date);
          $end_date = date('Y-m-d', strtotime($end_date));

          $new_product_detail->promotion_start_date = $start_date;
          $new_product_detail->promotion_end_date = $end_date;
        }

        $new_product_detail->save();

        foreach ($request->file('product_details')[$key]['images'] as $image) {
          $image_name = time().'_'.Str::random(8).'_'.$image->getClientOriginalName();
          $image->storeAs('images/products',$image_name,'public');

          $new_image = new ProductImage;
          $new_image->product_detail_id = $new_product_detail->id;
          $new_image->image_name = $image_name;

          $new_image->save();
        }
      }
    }

    if($request->file('old_product_details') != null){
      foreach ($request->file('old_product_details') as $key => $images) {
        foreach($images['images'] as $image) {
          $image_name = time().'_'.Str::random(8).'_'.$image->getClientOriginalName();
          $image->storeAs('images/products',$image_name,'public');

          $new_image = new ProductImage;
          $new_image->product_detail_id = $key;
          $new_image->image_name = $image_name;

          $new_image->save();
        }
      }
    }

    return redirect()->route('admin.product.index')->with(['alert' => [
      'type' => 'success',
      'title' => 'Thành Công',
      'content' => 'Chỉnh sửa sản phẩm thành công.'
    ]]);
  }

  public function delete_promotion(Request $request)
  {
    $promotion = Promotion::where('id', $request->promotion_id)->first();

    if(!$promotion) {

      $data['type'] = 'error';
      $data['title'] = 'Thất Bại';
      $data['content'] = 'Bạn không thể xóa khuyễn mãi không tồn tại!';
    } else {

      $promotion->delete();

      $data['type'] = 'success';
      $data['title'] = 'Thành Công';
      $data['content'] = 'Xóa khuyến mãi thành công!';
    }

    return response()->json($data, 200);
  }

  public function delete_product_detail(Request $request)
  {
    $product_detail = ProductDetail::where([['id', $request->product_detail_id], ['import_quantity', '>', 0]])->first();

    if(!$product_detail) {

      $data['type'] = 'error';
      $data['title'] = 'Thất Bại';
      $data['content'] = 'Bạn không thể xóa chi tiết sản phẩm không tồn tại!';
    } else {

      if($product_detail->import_quantity == $product_detail->quantity) {
        foreach($product_detail->product_images as $image) {
          Storage::disk('public')->delete('images/products/' . $image->image_name);
          $image->delete();
        }
        $product_detail->delete();
      } else {
        $product_detail->import_quantity = 0;
        $product_detail->quantity = 0;
        $product_detail->save();
      }

      $data['type'] = 'success';
      $data['title'] = 'Thành Công';
      $data['content'] = 'Xóa chi tiết sản phẩm thành công!';
    }

    return response()->json($data, 200);
  }

  public function delete_image(Request $request)
  {
    $image = ProductImage::find($request->key);
    Storage::disk('public')->delete('images/products/' . $image->image_name);
    $image->delete();
    return response()->json();
  }
}
