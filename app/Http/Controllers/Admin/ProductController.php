<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\ProductVote;

class ProductController extends Controller
{
    // ... Các phương thức khác

    public function store(Request $request)
    {
        // Thêm sản phẩm mới
        $product = new Product;
        $product->producer_id = $request->producer_id;
        $product->name = $request->name;
        // Các trường khác
        $product->save();

        // Thêm chi tiết sản phẩm
        $productDetail = new ProductDetail;
        $productDetail->product_id = $product->id;
        $productDetail->color = $request->color;
        // Các trường khác
        $productDetail->save();

        // Thêm hình ảnh sản phẩm
        $productImage = new ProductImage;
        $productImage->product_detail_id = $productDetail->id;
        $productImage->image_name = $request->image_name;
        $productImage->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        // Hiển thị form sửa sản phẩm
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Cập nhật sản phẩm
        $product = Product::findOrFail($id);
        $product->producer_id = $request->producer_id;
        $product->name = $request->name;
        // Các trường khác
        $product->save();

        // Cập nhật chi tiết sản phẩm
        $productDetail = ProductDetail::where('product_id', $id)->first();
        $productDetail->color = $request->color;
        // Các trường khác
        $productDetail->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        // Xóa sản phẩm và các liên quan
        ProductImage::whereHas('productDetail', function ($query) use ($id) {
            $query->where('product_id', $id);
        })->delete();

        ProductDetail::where('product_id', $id)->delete();
        ProductVote::where('product_id', $id)->delete();
        Product::destroy($id);

        return redirect()->route('products.index');
    }
}