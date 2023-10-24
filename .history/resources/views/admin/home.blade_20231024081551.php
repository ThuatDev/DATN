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
<input type="number" min="1" name="RAM" class="form-control" id="RAM" placeholder="RAM" required="" autocomplete="off" data-listener-added_12ed8c60="true">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>ROM (GB)</label>
<input type="number" min="1" name="ROM" class="form-control" id="ROM" placeholder="ROM" required="" autocomplete="off" data-listener-added_12ed8c60="true">
</div>
</div>
<div class="col-lg-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Thông Tin Mầu Sắc Và Giá Sản Phẩm</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      {{-- detail --}}
      <div id="product-details"></div>
    </div>
    <div class="text-center box-footer">
      <button class="add btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mầu Sắc Sản Phẩm</button>
    </div>
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
<script>
  tinymce.init({
    selector: '#product-information>textarea',
    plugins: 'media image code table link lists preview fullscreen',
    toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image media table | code preview fullscreen',
    toolbar_drawer: 'sliding',
    entity_encoding : "raw",
    branding: false,
    /* enable title field in the Image dialog*/
    image_title: true,
    height: 400,
    min_height: 300,
    /* Link Custom */
    link_assume_external_targets: 'http',
    /* disable media advanced tab */
    media_alt_source: false,
    media_poster: false,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */

      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    }
  });

  tinymce.init({
    selector: '#product-introduction>textarea',
    plugins: 'media image code table link lists preview fullscreen',
    toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image media table | code preview fullscreen',
    toolbar_drawer: 'sliding',
    entity_encoding : "raw",
    branding: false,
    /* enable title field in the Image dialog*/
    image_title: true,
    height: 400,
    min_height: 300,
    /* Link Custom */
    link_assume_external_targets: 'http',
    /* disable media advanced tab */
    media_alt_source: false,
    media_poster: false,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */

      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    }
  });

  $(document).ready(function(){
    $("#upload").change(function(event) {
      var target = event.target || event.srcElement;
      var files = target.files;
      var image = files[0];



    });
  });

  function getImageURL(input) {
    return URL.createObjectURL(input.files[0]);
  };

  $(function() {
    $("#product-promotions").repeatable({
      addTrigger: 'button.add-promotion',
      deleteTrigger: 'button.delete-promotion',
      template: "#product-promotion",
      afterAdd:function () {
        $('.promotion-reservation').daterangepicker({
          autoApply: true,
          minDate: moment(),
          "locale": {
            "format": "DD/MM/YYYY",
          }
        });
        $('#product-promotions .box').boxWidget();
        $('#product-promotions .field-group:not(:last-child) .box').boxWidget('collapse');
        $('#product-promotions .field-group:last-child .box').boxWidget('expand');
        $('input.promotion').on('keyup', function() {
          var val = $(this).val().trim();
          $(this).closest('.box').find('.box-header .box-title').text(val);
        });
      }
    });
    $("#product-details").repeatable({
      console.log('test');
      addTrigger: 'button.add',
      deleteTrigger: 'button.delete',
      max: 5,
      min: 1,
      template: "#product-detail",
      afterAdd:function () {
        $(".product-detail-images").fileinput({
          theme: "explorer-fa",
          required: true,
          showUpload: false,
          showCaption: false,
          showClose: false,
          maxFileCount: 8,
          allowedFileExtensions: ['jpg', 'png', 'gif'],
          initialPreviewAsData: true,
          maxFileSize: 1000,
          overwriteInitial: false,
          removeFromPreviewOnError: true,
        });
        $('.reservation').daterangepicker({
          autoApply: true,
          autoUpdateInput: false,
          minDate: moment(),
          "locale": {
            "format": "DD/MM/YYYY",
          }
        });
        $('.reservation').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
        $('.reservation').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });
        $('input.currency').autoNumeric('init', {
          aSep: '.',
          aDec: ',',
          aPad: false,
          lZero: 'deny',
          vMin: '0'
        });
        $('#product-details .box').boxWidget();
        $('#product-details .field-group:not(:last-child) .box').boxWidget('collapse');
        $('#product-details .field-group:last-child .box').boxWidget('expand');
        $('input.color').on('keyup', function() {
          var val = $(this).val().trim();
          if(val !== '') val = ' - ' + val;
          var name = $('input[name="name"]').val().trim();
          $(this).closest('.box').find('.box-header .box-title span.name').text(name);
          $(this).closest('.box').find('.box-header .box-title span.color').text(val);
        });
      },
      beforeDelete: function(target) {
        $(target).find('.product-detail-images').fileinput('destroy');
      }
    });

    $(".product-detail-images").fileinput({
      theme: "explorer-fa",
      required: true,
      showUpload: false,
      showCaption: false,
      showClose: false,
      maxFileCount: 8,
      allowedFileExtensions: ['jpg', 'png', 'gif'],
      initialPreviewAsData: true,
      maxFileSize: 1000,
      overwriteInitial: false,
      removeFromPreviewOnError: true,
    });

    $('input[name="name"]').on('keyup', function() {
      var val = $(this).val().trim();
      $('#product-details .field-group .box .box-header .box-title span.name').text(val);
    });

    $('input.color').on('keyup', function() {
      var val = $(this).val().trim();
      if(val !== '') val = ' - ' + val;
      var name = $('input[name="name"]').val().trim();
      $(this).closest('.box').find('.box-header .box-title span.name').text(name);
      $(this).closest('.box').find('.box-header .box-title span.color').text(val);
    });

    $('.reservation').daterangepicker({
      autoApply: true,
      autoUpdateInput: false,
      minDate: moment(),
      "locale": {
        "format": "DD/MM/YYYY",
      }
    });
    $('.reservation').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
    $('.reservation').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
    $('input.currency').autoNumeric('init', {
      aSep: '.',
      aDec: ',',
      aPad: false,
      lZero: 'deny',
      vMin: '0'
    });
    $("#productForm").validate({
      normalizer: function( value ) {
        return $.trim( value );
      },
      errorElement: "span",
      ignore: "",
      highlight: function(element, errorClass, validClass) {
        $(element).addClass(errorClass).removeClass(validClass);
        if($(element).parents('div#product-details').length || $(element).parents('div#product-promotions').length) {
          $(element).parents('.box').boxWidget('expand');
        }
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass(errorClass).addClass(validClass);
      }
    });
  });
</script>
<script type="text/template" id="product-detail">
<div class="field-group">
  <div class="box box-solid box-default" style="margin-bottom: 5px;">
    <div class="box-header">
      <h3 class="box-title"><span class="name"></span><span class="color"></span></h3>
      <div class="box-tools">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool delete" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="color_{?}">Mầu Sắc <span class="text-red">*</span></label>
            <input type="text" name="product_details[{?}][color]" class="form-control color" id="color_{?}" placeholder="Mầu sắc" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="quantity_{?}">Số Lượng <span class="text-red">*</span></label>
            <input type="number" min="1" name="product_details[{?}][quantity]" class="form-control" id="quantity_{?}" placeholder="Số lượng" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="import_price_{?}">Giá Nhập (VNĐ) <span class="text-red">*</span></label>
            <input type="text" name="product_details[{?}][import_price]" class="form-control currency" id="import_price_{?}" placeholder="Giá nhập" required autocomplete="off">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="sale_price_{?}">Giá Bán (VNĐ) <span class="text-red">*</span></label>
            <input type="text" name="product_details[{?}][sale_price]" class="form-control currency" id="sale_price_{?}" placeholder="Giá bán" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="promotion_price_{?}">Giá Khuyến Mại (VNĐ)</label>
            <input type="text" name="product_details[{?}][promotion_price]" class="form-control currency" id="promotion_price_{?}" placeholder="Giá khuyến mại" autocomplete="off">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Thời Gian Khuyến Mại</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right reservation" name="product_details[{?}][promotion_date]" autocomplete="off">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group" style="margin-bottom: 0;">
        <label>Hình Ảnh Chi Tiết <span class="text-red">*</span></label>
        <input type="file" name="product_details[{?}][images][]" class="product-detail-images" multiple>
      </div>
    </div>
  </div>
</div>
</script>
<script type="text/template" id="product-promotion">
<div class="field-group">
  <div class="box box-solid box-default" style="margin-bottom: 5px;">
    <div class="box-header">
      <h3 class="box-title"></h3>
      <div class="box-tools">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool delete-promotion" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group" style="margin-bottom: 0;">
            <label for="promotion_{?}">Khuyến Mãi <span class="text-red">*</span></label>
            <input type="text" name="product_promotions[{?}][content]" class="form-control promotion" id="promotion_{?}" placeholder="Khuyến Mãi" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Thời Gian Khuyến Mãi</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right promotion-reservation" name="product_promotions[{?}][promotion_date]" autocomplete="off" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</script>
@endsection
