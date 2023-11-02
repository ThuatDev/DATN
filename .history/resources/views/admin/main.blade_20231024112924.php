<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>
<body>
<!-- <div id="global-loader">
<div class="whirly-loader"> </div> -->
</div>

<div class="main-wrapper">

<div class="header">

<div class="header-left active">
<a href="index.html" class="logo">
<img src="/template_admin_layout//img/logo.png" alt="">
</a>
<a href="index.html" class="logo-small">
<img src="/template_admin_layout//img/logo-small.png" alt="">
</a>
<a id="toggle_btn" href="javascript:void(0);">
</a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Search Here ...">
<div class="search-addon">
<span><img src="/template_admin_layout//img/icons/closes.svg" alt="img"></span>
</div>
</div>
<a class="btn" id="searchdiv"><img src="/template_admin_layout//img/icons/search.svg" alt="img"></a>
</form>
</div>
</li>


<li class="nav-item dropdown has-arrow flag-nav">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
<img src="/template_admin_layout//img/flags/us1.png" alt="" height="20">
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="javascript:void(0);" class="dropdown-item">
<img src="/template_admin_layout//img/flags/us.png" alt="" height="16"> English
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="/template_admin_layout//img/flags/fr.png" alt="" height="16"> French
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="/template_admin_layout//img/flags/es.png" alt="" height="16"> Spanish
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="/template_admin_layout//img/flags/de.png" alt="" height="16"> German
</a>
</div>
</li>


<li class="nav-item dropdown">
<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<img src="/template_admin_layout//img/icons/notification-bing.svg" alt="img"> <span class="badge rounded-pill">4</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="/template_admin_layout//img/profiles/avatar-02.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="/template_admin_layout//img/profiles/avatar-03.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="/template_admin_layout//img/profiles/avatar-06.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="/template_admin_layout//img/profiles/avatar-17.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="/template_admin_layout//img/profiles/avatar-13.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>

<li class="nav-item dropdown has-arrow main-drop">
<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><img src="/template_admin_layout//img/profiles/avator1.jpg" alt="">
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
<span class="user-img"><img src="/template_admin_layout//img/profiles/avator1.jpg" alt="">
<span class="status online"></span></span>
<div class="profilesets">
<h6>John Doe</h6>
<h5>Admin</h5>
</div>
</div>
<hr class="m-0">
<a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
<a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="signin.html"><img src="/template_admin_layout//img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
</div>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="generalsettings.html">Settings</a>
<a class="dropdown-item" href="signin.html">Logout</a>
</div>
</div>

</div>

  @include  ('admin.sidebar')




<form id="productForm" action="{{ route('admin.product.save') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
  @csrf
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Thông Tin Sản Phẩm</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <label for="title">Hình Ảnh Hiển Thị <span class="text-red">*</span></label>
          <div class="upload-image text-center">
            <div title="Image Preview" class="image-preview" style="background-image: url('{{ Helper::get_image_product_url() }}'); padding-top: 100%; background-size: contain; background-repeat: no-repeat; background-position: center; margin-bottom: 5px; border: 1px solid #f4f4f4;"></div>
            <label for="upload" title="Upload Image" class="btn btn-primary btn-sm"><i class="fa fa-folder-open"></i>Chọn Hình Ảnh</label>
            <input type="file" accept="image/*" id="upload" style="display:none" name="image" required>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Tên Sản Phẩm <span class="text-red">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản Phẩm" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="sku_code">Mã Sản Phẩm <span class="text-red">*</span></label>
                <input type="text" name="sku_code" class="form-control" id="sku_code" placeholder="Mã sản Phẩm" required autocomplete="off">
              </div>
            </div>
           <div class="col-md-4">
  <div class="form-group">
    <label>Hãng Sản Xuất <span class="text-red">*</span></label>
    <select class="form-control" name="producer_id">
      <option value="">-- Chọn hãng sản xuất --</option>
      @foreach ($producers as $producer)
        <option value="{{ $producer->id }}">{{ $producer->name }}</option>
      @endforeach
    </select>
  </div>
</div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="monitor">Màn Hình <span class="text-red">*</span></label>
                <input type="text" name="monitor" class="form-control" id="monitor" placeholder="Màn hình" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="front_camera">Camera Trước <span class="text-red">*</span></label>
                <input type="text" name="front_camera" class="form-control" id="front_camera" placeholder="Camera trước" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="rear_camera">Camera Sau <span class="text-red">*</span></label>
                <input type="text" name="rear_camera" class="form-control" id="rear_camera" placeholder="Camera sau" required autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Hệ Điều Hành <span class="text-red">*</span></label>
                <select class="form-control" name="OS" required>
                  <option value="">-- Chọn hệ điều hành --</option>
                  <option value="Android">Android</option>
                  <option value="IOS">IOS</option>
                  <option value="Windows Phone">Windows Phone</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="CPU">CPU <span class="text-red">*</span></label>
                <input type="text" name="CPU" class="form-control" id="CPU" placeholder="CPU" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="GPU">GPU <span class="text-red">*</span></label>
                <input type="text" name="GPU" class="form-control" id="GPU" placeholder="GPU" required autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="RAM">RAM (GB) <span class="text-red">*</span></label>
                <input type="number" min="1" name="RAM" class="form-control" id="RAM" placeholder="RAM" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="ROM">ROM (GB) <span class="text-red">*</span></label>
                <input type="number" min="1" name="ROM" class="form-control" id="ROM" placeholder="ROM" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="pin">PIN <span class="text-red">*</span></label>
                <input type="text" name="pin" class="form-control" id="pin" placeholder="Pin" required autocomplete="off">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Thông Tin Khuyến Mãi</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div id="product-promotions"></div>
      <div class="text-center">
        <button class="add-promotion btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Khuyến Mãi</button>
      </div>
    </div>
  </div>
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
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#product-information" data-toggle="tab">Cấu Hình Chi Tiết</a></li>
      <li><a href="#product-introduction" data-toggle="tab">Bài Viết Sản Phẩm</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="product-information">
        <textarea name="information_details" rows="20"></textarea>
      </div>
      <div class="tab-pane" id="product-introduction">
        <textarea name="product_introduction" rows="20"></textarea>
      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
        <a href="" class="btn btn-danger btn-flat pull-right" style="margin-right: 5px;"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</a>
      </div>
    </div>
  </div>
</form>

  @include ('admin.footer')
</body>
</html>
