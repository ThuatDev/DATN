<style>
    .search-bar input.input-search {
    background-color: #fff; /* Màu nền trắng */
    border: 1px solid #ece9e9 !important; /* Viền ngoài */

    padding: 10px 20px; /* Khoảng cách bên trong */
    width: 100%; /* Độ rộng tối đa */
    height: 40px; /* Độ cao phù hợp */
    font-size: 16px; /* Kích thước phông chữ */
    color: #333; /* Màu chữ */
}

.search-bar input.input-search:focus {
    outline: none; /* Loại bỏ đường viền mặc định khi focus */
    border-color: #007bff; /* Thay đổi màu viền khi focus */
}

.search-bar button {
    background: transparent;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.search-bar button i {
    color: #333;
    font-size: 16px;
}
.menu-item {
  /* Add any common styles for menu items here */
}

.avatar-container {
  width: 30px;
  height: 30px;
  margin-right: 5px;
  overflow: hidden;
  border-radius: 50%;
  margin-top: 5px;
}

.avatar-img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Prevent image distortion */
}

.username {
  /* Add any styles for the username here */
}

</style>

<header  class="header" id="header">
  <div style="background-color: #f5f5f5">
  <div class="container ">
    <div class="row display-flex" style="padding: 15px ">
      <div class="col-md-2 margin-auto trigger-menu">

        <button type="button" class="navbar-toggle collapsed visible-xs" id="trigger-mobile">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="logo">
          <a class="logo-wrapper" href="{{ route('home_page') }}" title="{{ config('app.name') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}"></a>
        </div>
      </div>
      <div class="col-md-6 margin-auto">
        <div class="search">
          <form class="search-bar" action="{{ route('search') }}" method="get" accept-charset="utf-8">
            <input class="input-search border-dark" type="search" name="search_key" placeholder="{{ __('header.Search') }}" autocomplete="off">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="box-icon-right col-md-4 display-flex  " style="flex-basis: content;">
        <div class="row">
					<div class="box-phone  display-flex flex-column flex-wrap col-md-6">
						<div class="icon_phone">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_10122_52416)"> <path d="M4.81815 18.5599C5.37836 18.5599 5.8325 18.1058 5.8325 17.5456C5.8325 16.9854 5.37836 16.5313 4.81815 16.5313C4.25794 16.5313 3.8038 16.9854 3.8038 17.5456C3.8038 18.1058 4.25794 18.5599 4.81815 18.5599Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7132 0.562359C12.463 -0.187453 13.6787 -0.187453 14.4285 0.562359L17.5537 3.68753C18.643 4.77688 18.643 6.54306 17.5537 7.63241L16.6571 8.52898L23.471 15.3429L24.3676 14.4463C25.4569 13.357 27.2231 13.357 28.3125 14.4463L31.4376 17.5715C32.1875 18.3213 32.1875 19.537 31.4376 20.2868C28.6711 23.0534 24.3264 23.28 21.3013 20.9666V25.1532C21.3013 26.6938 20.0524 27.9427 18.5118 27.9427H17.6006L17.1862 29.8074C16.8604 31.2736 14.9743 31.6977 14.0522 30.5121L12.0537 27.9427H2.78946C1.24888 27.9427 0 26.6938 0 25.1532V15.5169C0 13.9763 1.24888 12.7275 2.78946 12.7275H12.9658L11.7132 11.4748C8.69982 8.46144 8.69981 3.57576 11.7132 0.562359ZM14.4873 14.249L19.7798 19.5414V25.1532C19.7798 25.8535 19.2121 26.4211 18.5118 26.4211H16.9903C16.6338 26.4211 16.325 26.6688 16.2477 27.0169L15.7009 29.4773C15.6544 29.6868 15.3849 29.7474 15.2532 29.578L13.0263 26.7148C12.8821 26.5295 12.6605 26.4211 12.4258 26.4211H2.78946C2.08919 26.4211 1.52152 25.8535 1.52152 25.1532V15.5169C1.52152 14.8166 2.08919 14.249 2.78946 14.249H14.4873ZM13.3526 1.63824C13.197 1.48262 12.9447 1.48262 12.7891 1.63824C10.3699 4.05744 10.3699 7.97975 12.7891 10.399L21.601 19.2109C24.0202 21.6301 27.9426 21.6301 30.3618 19.2109C30.5174 19.0553 30.5174 18.803 30.3618 18.6474L27.2366 15.5222C26.7414 15.027 25.9386 15.027 25.4435 15.5222L24.009 16.9567C23.7119 17.2538 23.2302 17.2538 22.9331 16.9567L15.0433 9.06692C14.7462 8.76982 14.7462 8.28814 15.0433 7.99104L16.4778 6.55654C16.973 6.06138 16.973 5.25857 16.4778 4.76341L13.3526 1.63824Z" fill="#333333"></path> </g> <defs> <clipPath> <rect width="32" height="32" fill="white"></rect> </clipPath> </defs></svg>
						</div>

						<div class="content_phone">
	<span  style="font-size: 14px">Hỗ trợ 24h</span>
							<a title="1900 6750" href="tel:19006750" style="font-size: 14px ; color:#dd0115 ; font-weight: 600">1900 6750</a>
						</div>
					</div>
          <div class="box-phone row display-flex flex-column flex-wrap col-md-6">
					<a href="/he-thong-cua-hang" title="Số hệ thống" class="hethong-header display-flex flex-column flex-wrap">
						<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 54">
							<path d="M8.526 24.124a.75.75 0 0 0-.75.75v10.734a.75.75 0 0 0 .75.75h17.491a.75.75 0 0 0 .75-.75V24.874a.75.75 0 0 0-.75-.75Zm16.741 10.734H9.276v-9.234h15.991ZM4.793 19.943a5.282 5.282 0 0 0 5.032-2.487 5.392 5.392 0 0 0 9.47.205 5.565 5.565 0 0 0 .755 1.014 5.441 5.441 0 0 0 7.9 0 5.565 5.565 0 0 0 .755-1.014 5.4 5.4 0 0 0 9.47-.206 5.312 5.312 0 0 0 9.638-4.2L45.3 3.985V.75a.75.75 0 0 0-.75-.75H3.447A.75.75 0 0 0 2.7.75v3.242L.187 13.258a5.319 5.319 0 0 0 4.606 6.685Zm9.835-1.069a3.914 3.914 0 0 1-3.864-4.543l1.543-9.495H19.1l-.531 9.8-.029.531a3.917 3.917 0 0 1-3.912 3.707Zm12.233-1.23a3.941 3.941 0 0 1-6.8-2.924l.031-.577.5-9.307h6.8l.5 9.307.031.577a3.905 3.905 0 0 1-1.062 2.924Zm9.493-.148a3.916 3.916 0 0 1-6.892-2.326l-.029-.531-.531-9.8h6.791l1.543 9.495a3.908 3.908 0 0 1-.882 3.166Zm9.469-.679a3.82 3.82 0 0 1-6.916-1.555L37.212 4.836h6.766l2.387 8.814a3.813 3.813 0 0 1-.542 3.167ZM4.2 1.5h39.6v1.836H4.2ZM1.635 13.65l2.387-8.814h6.766l-1.045 6.428-.46 2.826-.19 1.171a3.82 3.82 0 1 1-7.458-1.611Z"></path>
							<path d="M47.25 43.13H45.3V21.609a.75.75 0 1 0-1.5 0V43.13h-2.515V24.874a.75.75 0 0 0-.75-.75h-9.721a.75.75 0 0 0-.75.75V43.13H4.2V21.617a.75.75 0 0 0-1.5 0V43.13H.75a.75.75 0 0 0-.75.75v3.37a.75.75 0 0 0 .75.75h46.5a.75.75 0 0 0 .75-.75v-3.37a.75.75 0 0 0-.75-.75ZM31.564 25.624h8.221V43.13h-8.221ZM46.5 46.5h-45v-1.87h45Z"></path>
						</svg>
						<div class="txt-yt" >Địa Chỉ <br><b style="color: #dd0115">cửa hàng</b></div>
					</a>
          </div>
				</div>
</div>
</div>
    </div>
</div>
<div id="header" class="header">
    <div class="container">


    <div class="row row ">

          <div class="col-md-12 hd-bg-white main-menu-responsive mx-auto" >
        <div class="main-menu ">
          <div class="nav">
            <ul>
              <li class="nav-item {{ Helper::check_active(['home_page']) }}"><a href="{{ route('home_page') }}" title="{{ __('header.Home') }}">
                <span class="fas fa-home"></span>
                {{ __('header.Home') }}</a>
              </li>
              {{-- <li class="nav-item {{ Helper::check_active(['about_page']) }}"><a href="{{ route('about_page') }}" title="{{ __('header.About') }}">
                <span class="fas fa-info"></span>
                {{ __('header.About') }}</a>
              </li> --}}
              <li class="nav-item dropdown {{ Helper::check_active(['products_page', 'producer_page', 'product_page']) }}">
                <a href="{{ route('products_page') }}" title="{{ __('header.Products') }}">
                  <span class="fas fa-mobile-alt"></span>
                  {{ __('header.Products') }} <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                  <ul class="dropdown-menu-item">
                    <li>
                      <h4>{{ __('header.Producer') }}</h4>
                      <ul class="dropdown-menu-subitem">
                        @foreach($producers as $producer)
                          <li class="{{ Helper::check_param_active('producer_page', $producer->id) }}"><a href="{{ route('producer_page', ['id' => $producer->id]) }}" title="{{ $producer->name }}">{{ $producer->name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item {{ Helper::check_active(['posts_page', 'post_page']) }}"><a href="{{ route('posts_page') }}" title="{{ __('header.News') }}">
                <span class="far fa-newspaper"></span>
                {{ __('header.News') }}</a>
              </li>
              <li class="nav-item {{ Helper::check_active(['contact_page']) }}"><a href="{{ route('contact_page') }}" title="{{ __('header.Contact') }}">
                <span class="fas fa-id-card"></span>
                {{ __('header.Contact') }}</a>
              </li>
                <li class="menu-item {{ Helper::check_active(['contact_page'])  }}"><a href="{{ route('register') }}" title="{{ __('header.Register') }}">
                    {{-- class icon so sánh  --}}
                    <span class="fas fa-code-branch"></span>
                    {{ __('header.compare') }}</a>
                  </li>
                     <li class="menu-item {{Helper::check_active(['contact_page']) }}"><a href="{{ route('register') }}" title="{{ __('header.Register') }}">
                    {{-- class icon so sánh  --}}
                    <span class="fas fa-heart"></span>
                    {{ __('header.favourite') }}</a>
                  </li>
            </ul>
          </div>
          <div class="accout-menu">
            @if(Auth::guest())
              <div class="not-logged-menu">
                <ul>
                  <li class="menu-item {{ Helper::check_active(['login']) }}"><a href="{{ route('login') }}" title="{{ __('header.Login') }}">
                    <span class="fas fa-user"></span>
                    {{ __('header.Login') }}</a>
                  </li>

                    <li class="menu-item {{ Helper::check_active(['register']) }}"><a href="{{ route('register') }}" title="{{ __('header.Register') }}">
                    {{-- class icon so sánh  --}}
                    <span class="fas fa-code-branch"></span>
                    {{ __('header.compare') }}</a>
                  </li>
                     <li class="menu-item {{ Helper::check_active(['register']) }}"><a href="{{ route('register') }}" title="{{ __('header.Register') }}">
                    {{-- class icon so sánh  --}}
                    <span class="fas fa-heart"></span>
                    {{ __('header.favourite') }}</a>
                  </li>

  </li>
                     <li class="menu-item {{ Helper::check_active(['register']) }}"><a href="{{ route('register') }}" title="{{ __('header.Register') }}"  style="margin-top: -15px ">
                    {{-- class icon so sánh  --}}
                    <span> @if(Request::route()->getName() != 'show_cart')
    <!-- MiniCart display -->
    @include('layouts.minicart')
    @endif


                  </li>


                </ul>
              </div>
            @else
              <div class="logged-menu">
                <ul>

                  <li class="menu-item dropdown {{ Helper::check_active(['orders_page', 'order_page', 'show_user', 'edit_user']) }}">

  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" title="{{ Auth::user()->name }}">

    <div class="avatar-container" style="margin-left: 5px">
      <img src="{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}" alt="{{ Auth::user()->name }}" class="avatar-img">
    </div>
    {{-- lấy ra tên người dùng  --}}
    <span class="username "
    style="font-size: 14px !important; color: #333 !important;">
      {{ Auth::user()->name }}</span>
  </a>

  <ul class="dropdown-menu">
    @if(Auth::user()->admin)
    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Quản Lý Website</a></li>
    @else
    <li class="{{ Helper::check_active(['orders_page', 'order_page']) }}"><a href="{{ route('orders_page') }}"><i class="fas fa-clipboard-list"></i> Quản Lý Đơn Hàng</a></li>
    <li class="{{ Helper::check_active(['show_user', 'edit_user']) }}"><a href="{{ route('show_user') }}"><i class="fas fa-user-cog"></i> Quản Lý Tài Khoản</a></li>
    @endif
    <li><a id="logout" action="#"><i class="fas fa-power-off"></i> {{ __('header.Logout') }}</a></li>
  </ul>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</li>


                </ul>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</header><!-- /header -->

<div class="backdrop__body-backdrop___1rvky"></div>
<div class="mobile-main-menu">
  <div class="mobile-main-menu-top">
    <div class="mb-menu-top-header">
      <div class="mb-menu-logo">
        <a class="logo-wrapper" href="{{ route('home_page') }}" title="{{ config('app.name') }}">
          <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
        </a>
      </div>
      <button type="button" id="close-trigger-mobile">
        <i class="fas fa-times"></i>
      </button>
    </div>
    @if(Auth::guest())
    <div class="mb-menu-top-body">
      <div class="mb-menu-user">
        <div style="background-image: url('{{ asset('images/no_login.svg') }}');"></div>
      </div>
      <div class="mb-menu-info">
        <div class="info-top">Đăng Nhập</div>
        <div class="info-bottom">Để nhận nhiều ưu đãi hơn</div>
      </div>
    </div>
    <div class="mb-menu-top-footer">
      <div class="mb-menu-action">
        <a href="{{ route('login') }}" class="btn btn-success">
          <i class="fas fa-user"></i> Đăng Nhập
        </a>
      </div>
      <div class="mb-menu-action">
        <a href="{{ route('register') }}" class="btn btn-warning">
          <i class="fas fa-key"></i> Đăng Ký
        </a>
      </div>
    </div>
    @else
    <div class="mb-menu-top-body">
      <div class="mb-menu-user">
        <div style="background-image: url('{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}');"></div>
      </div>
      <div class="mb-menu-info">
        <div class="info-top">{{ Auth::user()->name }}</div>
        <div class="info-bottom">{{ Auth::user()->email }}</div>
      </div>
    </div>
    <div class="mb-menu-top-footer">
      @if(Auth::user()->admin)
      <div class="mb-menu-action">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
      </div>
      <div class="mb-menu-action">
        <a id="mobile-logout" href="javascript:void(0);" class="btn btn-danger">
          <i class="fas fa-power-off"></i> {{ __('header.Logout') }}
        </a>
      </div>
      @else
      <div class="mb-menu-action">
        <a href="{{ route('show_user') }}" class="btn btn-success">
          <span class="fas fa-user-cog"></span> Tài Khoản
        </a>
      </div>
      <div class="mb-menu-action">
        <a id="mobile-logout" href="javascript:void(0);" class="btn btn-danger">
          <i class="fas fa-power-off"></i> {{ __('header.Logout') }}
        </a>
      </div>
      @endif
    </div>
    @endif
  </div>
  <div class="mobile-main-menu-middle">
    <div class="mb-menu-middle-header">
      <h3>DANH MỤC</h3>
    </div>
    <div class="mb-menu-middle-body">
      <ul>
        <li class="mb-nav-item {{ Helper::check_active(['home_page']) }}"><a href="{{ route('home_page') }}" title="{{ __('header.Home') }}">
          <span class="fas fa-home"></span>
          {{ __('header.Home') }}</a>
        </li>
        <li class="mb-nav-item {{ Helper::check_active(['about_page']) }}"><a href="{{ route('about_page') }}" title="{{ __('header.About') }}">
          <span class="fas fa-info"></span>
          {{ __('header.About') }}</a>
        </li>
        <li class="mb-nav-item has-item-child {{ Helper::check_active(['products_page', 'producer_page', 'product_page']) }}">
          <a href="{{ route('products_page') }}" title="{{ __('header.Products') }}">
            <span class="fas fa-mobile-alt"></span>
            {{ __('header.Products') }}
          </a>
          <button id="action-collapse" data-toggle="collapse" data-target="#item-child-collapse"><i class="fas fa-plus"></i></button>
          <div id="item-child-collapse" class="collapse">
            <ul>
              @foreach($producers as $producer)
                <li class="{{ Helper::check_param_active('producer_page', $producer->id) }}"><a href="{{ route('producer_page', ['id' => $producer->id]) }}" title="{{ $producer->name }}">{{ $producer->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </li>
        <li class="mb-nav-item {{ Helper::check_active(['posts_page', 'post_page']) }}"><a href="{{ route('posts_page') }}" title="{{ __('header.News') }}">
          <span class="far fa-newspaper"></span>
          {{ __('header.News') }}</a>
        </li>
        <li class="mb-nav-item {{ Helper::check_active(['contact_page']) }}"><a href="{{ route('contact_page') }}" title="{{ __('header.Contact') }}">
          <span class="fas fa-id-card"></span>
          {{ __('header.Contact') }}</a>
        </li>
        @if(Auth::check() && !Auth::user()->admin)
        <li class="mb-nav-item {{ Helper::check_active(['orders_page', 'order_page']) }}"><a href="{{ route('orders_page') }}"><span class="fas fa-clipboard-list"></span> Đơn Hàng</a></li>
        @endif
      </ul>
    </div>
  </div>
  <div class="mobile-main-menu-bottom">
    <div class="mobile-support">
      <div class="text-support">HỖ TRỢ</div>
      <div class="info-support">
        <i class="fa fa-phone" aria-hidden="true"></i> HOTLINE: <a href="tel: +84 967 999 999" title="(+84) 967 999 999">(+84) 967 999 999</a>
      </div>
      <div class="info-support">
        <i class="fa fa-envelope" aria-hidden="true"></i> EMAIL: <a href="mailto:phonestore@gmail.com" title="phonestore@gmail.com">phonestore@gmail.com</a>
      </div>
    </div>
  </div>
</div>
@if(Request::route()->getName() != 'show_cart')
  <link rel="stylesheet" href="{{ asset('css/minicart.css') }}">
  @endif
  @yield('css')
     <script src="{{ asset('js/custom.js') }}"></script>
    @if(Request::route()->getName() != 'show_cart')
    <script src="{{ asset('js/minicart.js') }}"></script>
    @endif
    @yield('js')

