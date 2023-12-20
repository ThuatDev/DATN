@extends('layouts.master')

@section('title', $producer->name)

@section('content')

  <section class="bread-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('header.Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products_page') }}">Sản Phẩm</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $producer->name }}</li>
      </ol>
    </nav>
  </section>

  <div class="site-producer">
    <section class="section-advertise">
      <div class="content-advertise">
        <div id="slide-advertise" class="owl-carousel">
          @foreach($data['advertises'] as $advertise)
            <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');" data-dot="<button>{{ $advertise->title }}</button>"></div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section-filter">
      <div class="section-header">
        <h2 class="section-title">Tìm Kiếm Và Sắp Xếp</h2>
      </div>
      <div class="section-content">
        <form action="{{ route('producer_page', ['id' => $producer->id]) }}" method="GET" accept-charset="utf-8">
          <div class="row">
            <div class="col-md-10">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <input type="text" name="name" placeholder="Tìm kiếm..." value="{{ Request::input('name') }}">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <select name='os'>
                    <option value='' {{ Request::input('os') == null ? 'selected' : '' }}>
                      Hệ Điều Hành
                    </option>
                    <option value='ios' {{ Request::input('os') == 'ios' ? 'selected' : '' }}>IOS</option>
                    <option value='android' {{ Request::input('os') == 'android' ? 'selected' : '' }}>
                      Android
                    </option>
                    <option value='windows' {{ Request::input('os') == 'windows' ? 'selected' : '' }}>
                      Windows Phone
                    </option>
                  </select>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <select name='price'>
                    <option value='' {{ Request::input('price') == null ? 'selected' : '' }}>
                      Giá Sản Phẩm
                    </option>
                    <option value='asc' {{ Request::input('price') == 'asc' ? 'selected' : '' }}>
                      Giá từ thấp tới cao
                    </option>
                    <option value='desc' {{ Request::input('price') == 'desc' ? 'selected' : '' }}>
                      Giá từ cao tới thấp
                    </option>
                  </select>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <select name='type'>
                    <option value='' {{ Request::input('type') == null ? 'selected' : '' }}>
                      Loại Sản Phẩm
                    </option>
                    <option value='promotion' {{ Request::input('type') == 'promotion' ? 'selected' : '' }}>
                      Sản phẩm khuyến mại
                    </option>
                    <option value='vote' {{ Request::input('type') == 'vote' ? 'selected' : '' }}>
                      Sản phẩm đánh giá cao
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-default">Lọc Sản Phẩm</button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <section class="section-products">
      <div class="section-header">
        <div class="section-header-left">
          <h2 class="section-title">{{ $producer->name }}</h2>
        </div>
        <div class="section-header-right">
          <ul>
            @foreach($data['producers'] as $producer)
              <li><a href="{{ route('producer_page', ['id' => $producer->id]) }}" title="{{ $producer->name }}">{{ $producer->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="section-content">
        @if($data['products']->isEmpty())
          <div class="empty-content">
            <div class="icon"><i class="fab fa-searchengin"></i></div>
            <div class="title">Oooops!</div>
            <div class="content">Product Item Not Found</div>
          </div>
        @else
                 <div class="row">
            @foreach($data['products'] as $key => $product)
                <div class="col-lg-15 col-md-3  product-col p-2">
            <a href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}">
                <div class="box-hover">

                <img
                  src="{{ Helper::get_image_product_url($product->image) }}"
                    alt=""
                    class="img-first"

              />  <img
                  src="{{ Helper::get_image_product_url(  $product->productImages->image_name) }}"
                  alt=""
                    class="img-change"
                />

               </div>
                <div class="px-3">
                    <h5 class="product-name-1 text-center">
                        <a class="txt-black" href="{{ route('product_page', ['id' => $product->slug]) }}"
                            title="{{ $product->name }}">{{ $product->name }}</a>
                    </h5>
                    <div class="position-relative">
                        {!! Helper::get_promotion_html($product->product_detail->promotion_price,
                        $product->product_detail->sale_price,) !!}
                        <button
                    data-href="/dien-thoai-iphone-13"
                    data-handle="dien-thoai-iphone-13"
                    class="product-item-btn btn left-to quick-view"
                    title="Tùy chọn"
                    type="button"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="100px"
                      height="100px"
                      viewBox="0 0 512 512"
                    >
                      <defs>
                        <style>
                          .cls-1 {
                            fill: #f19ec3;
                          }
                        </style>
                      </defs>

                      <title />

                      <g data-name="Layer 9" id="Layer_9">
                        <path
                          class="cls-1"
                          d="M152,164,133.43,378l-.43,5s9,30,45,30h78V164Z"
                        />

                        <path
                          d="M388,376.15,369,162.31a8.13,8.13,0,0,0-8.19-7.44h-40a64.57,64.57,0,0,0-129.13,0h-40a8.23,8.23,0,0,0-8.19,7.44l-19,213.83v.75c0,23.82,21.91,43.2,48.8,43.2H339.2c26.89,0,48.8-19.38,48.8-43.2ZM256.28,106.76a48.25,48.25,0,0,1,48.19,48.12H208.09A48.25,48.25,0,0,1,256.28,106.76ZM339.2,403.65H173.35c-17.75,0-32.21-11.81-32.42-26.48l18.29-205.91h32.49V200a8.19,8.19,0,0,0,16.38,0V171.26h96.37V200a8.19,8.19,0,1,0,16.38,0V171.26h32.49l18.29,206C371.41,391.84,356.95,403.65,339.2,403.65Z"
                        />

                        <path
                          d="M290.33,260.87,242,309.19l-19.72-19.72a8.2,8.2,0,1,0-11.6,11.6l25.53,25.53A8.22,8.22,0,0,0,242,329a8.34,8.34,0,0,0,5.8-2.39l54.12-54.12a8.2,8.2,0,0,0,0-11.6A8.32,8.32,0,0,0,290.33,260.87Z"
                        />
                      </g>
                    </svg>
                  </button>
                    </div>
                    <span class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                        style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010">
                        Tặng gói bảo hành Gold trị giá 300K
                    </span>
                </div>
            </a>
        </div>
            @endforeach
          </div>
        @endif
      </div>
      <div class="section-footer text-center">
        {{ $data['products']->appends(Request::query())->links() }}
      </div>
    </section>
  </div>

@endsection

@section('css')
  <style>
    .slide-advertise-inner {
      background-repeat: no-repeat;
      background-size: cover;
      padding-top: 21.25%;
    }
    #slide-advertise.owl-carousel .owl-item.active {
      -webkit-animation-name: zoomIn;
      animation-name: zoomIn;
      -webkit-animation-duration: .6s;
      animation-duration: .6s;
    }
  </style>
@endsection

@section('js')
  <script>
    $(document).ready(function(){

      $("#slide-advertise").owlCarousel({
        items: 2,
        autoplay: true,
        loop: true,
        margin: 10,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive:{
          0:{
            items: 1,
          },
          992:{
            items: 2,
            animateOut: 'zoomInRight',
            animateIn: 'zoomOutLeft',
          }
        },
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
      });
    });
  </script>
@endsection
