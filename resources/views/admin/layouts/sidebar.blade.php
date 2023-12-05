


<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel">
      <div class="">
        <img src="{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}" class="avatar" alt="{{ Auth::user()->name }}">
      </div>
      <div class="info">
        <p class="text-dark">{{ Auth::user()->name }}</p>

      </div>
    </div> --}}
<div class="main-profile text-center mt-5">
					<div class="image-bx  mx-auto">
					        <img src="{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}" class="avatar" style="display: inline-block;" alt="{{ Auth::user() ->name }}">
						<a href="javascript:void(0);"></a>
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> wellcome channel</h5>
					<p class="email text-dark admin"><a href="/cdn-cgi/l/email-protection" class="text-dark admin" data-cfemail="95f8f4e7e4e0f0efefefefd5f8f4fcf9bbf6faf8">{{ Auth::user()->name }}</a></p>
				</div>
    <!-- Sidebar Menu -->

    <ul class="sidebar-menu mt-5" data-widget="tree">
        <li class="header" id="main-navigation">
        MAIN NAVIGATION
        <i class="fa fa-caret-down caret-icon"></i>
      <!-- Optionally, you can add icons to the links -->
      <li class="{{ Helper::check_active(['admin.dashboard']) }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="{{ Helper::check_active(['admin.advertise.index', 'admin.advertise.new', 'admin.advertise.edit']) }}"><a href="{{ route('admin.advertise.index') }}"><i class="fa fa-sliders" aria-hidden="true"></i> <span>Quản Lý Quảng Cáo</span></a></li>
      <li class="{{ Helper::check_active(['admin.users', 'admin.user_show']) }}"><a href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Quản Lý Tài Khoản</span></a></li>
      <li class="{{ Helper::check_active(['admin.post.index', 'admin.post.new', 'admin.post.edit']) }}"><a href="{{ route('admin.post.index') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Quản Lý Bài Viết</span></a></li>
      <li class="{{ Helper::check_active(['admin.product.index', 'admin.product.new', 'admin.product.edit']) }}"><a href="{{ route('admin.product.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Quản Lý Sản Phẩm</span></a></li>
      <li class="{{ Helper::check_active(['admin.order.index', 'admin.order.show']) }}"><a href="{{ route('admin.order.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Quản Lý Đơn Hàng</span></a></li>
      <li class="{{ Helper::check_active(['admin.statistic']) }}"><a href="{{ route('admin.statistic') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> <span>Thống Kê Doanh Thu</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function () {
    // Chọn phần tử <li> có id "main-navigation"
    var $headerItem = $("#main-navigation");

    // Chọn tất cả các phần tử liền sau phần tử <li> có id "main-navigation"
    var $menuItems = $headerItem.nextAll();

    // Đặt biến trạng thái ban đầu cho biểu tượng
    var isIconRotated = false;

    // Đặt sự kiện click cho phần tử <li> có id "main-navigation"
    $headerItem.click(function () {
        // Sử dụng slideToggle() để sổ ra và thu gọn tất cả các mục liền sau
        $menuItems.slideToggle();

        // Kiểm tra trạng thái của biểu tượng và xoay nó
        isIconRotated = !isIconRotated;
        var $caretIcon = $headerItem.find(".caret-icon");
        $caretIcon.toggleClass("rotate-icon", isIconRotated);
    });
});

</script>
