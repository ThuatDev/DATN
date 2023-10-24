@extends('admin.main')
@section('content')
   <div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Add</h4>
<h6>Create new product</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Tên Sản Phẩm</label>
<input type="text" name="name" class="form-control" id="inputEmailAddress" placeholder="Tên Sản Phẩm">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Màn Hình </label>
<input type="text" name="monitor" class="form-control" id="monitor" placeholder="Màn hình" required="" autocomplete="off">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Hãng Sản Xuất </label>
<select class="select">
<option>Choose Sub Category</option>
<option>Fruits</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Hệ Điều Hành </label>
<select class="form-control select" name="producer_id" required="">
                  <option value="">-- Chọn hãng sản xuất --</option>
                                      <option value="1">Apple</option>
                                      <option value="5">Huawei</option>
                                      <option value="4">OPPO</option>
                                      <option value="2">Samsung</option>
                                      <option value="3">Sony</option>
                                      <option value="6">Xiaomi</option>
                                  </select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Mã Sản Phẩm </label>
  <input type="text " name="sku_code" class="form-control" id="inputEmailAddress" placeholder="Mã Sản Phẩm">
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Camera Trước </label>
<input type="text" name="front_camera" class="form-control" id="front_camera" placeholder="Camera trước" required="" autocomplete="off">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Camera Sau</label>
<input type="text" name="rear_camera" class="form-control" id="rear_camera" placeholder="Camera sau" required="" autocomplete="off">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Pin</label>
<input type="text" name="pin" class="form-control" id="pin" placeholder="Pin" required="" autocomplete="off">
</div>
</div>
<!-- cpu gpu ram rom -->
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>CPU </label>
 <input type="text" name="CPU" class="form-control" id="CPU" placeholder="CPU" required="" autocomplete="off" data-listener-added_12ed8c60="true">
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>GPU </label>
<input type="text" name="GPU" class="form-control" id="GPU" placeholder="GPU" required="" autocomplete="off" data-listener-added_12ed8c60="true">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>RAM (GB)</label>
<input type="text" name="rear_camera" class="form-control" id="rear_camera" placeholder="Camera sau" required="" autocomplete="off">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Pin</label>
<input type="text" name="pin" class="form-control" id="pin" placeholder="Pin" required="" autocomplete="off">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control"></textarea>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Tax</label>
<select class="select">
<option>Choose Tax</option>
<option>2%</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Discount Type</label>
<select class="select">
<option>Percentage</option>
<option>10%</option>
<option>20%</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label> Status</label>
<select class="select">
<option>Closed</option>
<option>Open</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label> Product Image</label>
<div class="image-upload">
<input type="file">
<div class="image-uploads">
<img src="/template_admin_layout//img/icons/upload.svg" alt="img">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
<a href="productlist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
@endsection
