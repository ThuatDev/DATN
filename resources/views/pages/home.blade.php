@extends('layouts.master')

@section('title', 'Trang Chủ')


@section('content')
  <div class="site-home">
    <section class="section-advertise">
      <div class="row">
        <div class="col-md-8">
          <div class="content-advertise">
            <div id="slide-advertise" class="owl-carousel">
              @foreach($data['advertises'] as $advertise)
                <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');" data-dot="<button>{{ $advertise->title }}</button>"></div>
              @endforeach
            </div>
            <div class="custom-dots-slide-advertises"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="new-posts">
            <div class="posts-header">
              <h3 class="posts-title">KHUYẾN MÃI</h3>
            </div>
            <div class="posts-content">
              @foreach($data['posts'] as $post)
                <div class="post-item">
                  <a href="{{ route('post_page', ['id' => $post->id]) }}" title="{{ $post->title }}">
                    <div class="row">
                      <div class="col-md-4 col-sm-3 col-xs-3 col-xs-responsive">
                        <div class="post-item-image" style="background-image: url('{{ Helper::get_image_post_url($post->image) }}'); padding-top: 50%;"></div>
                      </div>
                      <div class="col-md-8 col-sm-9 col-xs-9 col-xs-responsive">
                        <div class="post-item-content">
                          <h4 class="post-content-title">{{ $post->title }}</h4>
                          <p class="post-content-date">{{ date_format($post->created_at, 'h:i A d/m/Y') }}</p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
   <section class="section-favorite-products " style="background-image: url('{{ asset('images/fs-bg.png') }}')">
      <div class="section-header">
       <h2 class="section-title">FLASH SALE 9 - 11H</h2>
      </div>
        <div class="flash-sale" style="text-align: center; padding-top: 20px;">
        <img src="{{ asset('images/flashsale-gif.gif') }}" alt="">
      </div>
      <div class="section-content">
        <div id="slide-favorite" class="owl-carousel">
            {{-- debug data  --}}
          @foreach($data['favorite_products'] as $product)
            <div class="item-product">
                {{-- tạo 1 thẻ a bọc  --}}
              <a href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}">
                <div class="image-product" style="background-image: url('{{ Helper::get_image_product_url($product->image) }}');padding-top: 100%;">
                  {!! Helper::get_promotion_percent($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                </div>
                <div class="content-product">
                  <h3 class="title">{{ $product->name }}</h3>
                  <div class="start-vote">

                    {!! Helper::get_start_vote($product->rate) !!}
                        {{-- thêm số lượng đã bán  --}}
                    <span class="total-sold">Đã bán: {{ $product->product_detail->total_sold }}</span>


                  </div>
                  <div class="price">
                    {!! Helper::get_real_price($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="section-products">
      <div class="section-header">
        <div class="section-header-left">
          <h2 class="section-title">ĐIỆN THOẠI</h2>
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
        <div class="row">
          @foreach($data['products'] as $key => $product)
            @if($key == 0)
              <div class="col-md-2 col-md-40">
                <div class="item-product">
                  <a href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="image-product" style="background-image: url('{{ Helper::get_image_product_url($product->image) }}');padding-top: 100%;">
                          {!! Helper::get_promotion_percent($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                        </div>
                        <div class="content-product">
                          <h3 class="title">{{ $product->name }}</h3>
                          <div class="start-vote">
                            {!! Helper::get_start_vote($product->rate) !!}

                          </div>
                          <div class="price">
                            {!! Helper::get_real_price($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6" style="display: flex;">
                        <div class="product-details">
                          <p><strong><i class="fas fa-tv"></i> Màn Hình: </strong>{{ $product->monitor }}</p>
                          <p><strong><i class="fas fa-camera-retro"></i> Camera Trước: </strong>{{ $product->front_camera }}</p>
                          <p><strong><i class="fas fa-camera-retro"></i> Camera sau: </strong>{{ $product->rear_camera }}</p>
                          <p><strong><i class="fas fa-microchip"></i> CPU: </strong>{{ $product->CPU }}</p>
                          <p><strong><i class="fas fa-microchip"></i>GPU: </strong>{{ $product->GPU }}</p>
                          <p><strong><i class="fas fa-hdd"></i> RAM: </strong>{{ $product->RAM }}GB</p>
                          <p><strong><i class="fas fa-hdd"></i> Bộ Nhớ Trong: </strong>{{ $product->ROM }}GB</p>
                          @if(Str::is('*Android*', $product->OS_version))
                            <p><strong><i class="fab fa-android"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @elseif(Str::is('*IOS*', $product->OS_version))
                            <p><strong><i class="fab fa-apple"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @elseif(Str::is('*Windows*', $product->OS_version))
                            <p><strong><i class="fab fa-windows"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @endif
                          <p><strong><i class="fas fa-battery-full"></i> Dung Lượng PIN: </strong>{{ $product->pin }}</p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            @else
              <div class="col-md-2 col-md-20">
                <div class="item-product">
                  <a href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="image-product" style="background-image: url('{{ Helper::get_image_product_url($product->image) }}');padding-top: 100%;">
                          {!! Helper::get_promotion_percent($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                        </div>
                        <div class="content-product">
                          <h3 class="title">{{ $product->name }}</h3>
                          <div class="">
                            {!! Helper::get_start_vote($product->rate) !!}
                                <span class="">Đã bán: 25k</span>
                          </div>
                          <div class="price">
                            {!! Helper::get_real_price($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 animate">
                        <div class="product-details">
                          <p><strong><i class="fas fa-tv"></i> Màn Hình: </strong>{{ $product->monitor }}</p>
                          <p><strong><i class="fas fa-camera-retro"></i> Camera Trước: </strong>{{ $product->front_camera }}</p>
                          <p><strong><i class="fas fa-camera-retro"></i> Camera sau: </strong>{{ $product->rear_camera }}</p>
                          <p><strong><i class="fas fa-microchip"></i> CPU: </strong>{{ $product->CPU }}</p>
                          <p><strong><i class="fas fa-microchip"></i>GPU: </strong>{{ $product->GPU }}</p>
                          <p><strong><i class="fas fa-hdd"></i> RAM: </strong>{{ $product->RAM }}GB</p>
                          <p><strong><i class="fas fa-hdd"></i> Bộ Nhớ Trong: </strong>{{ $product->ROM }}GB</p>
                          @if(Str::is('*Android*', $product->OS_version))
                            <p><strong><i class="fab fa-android"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @elseif(Str::is('*IOS*', $product->OS_version))
                            <p><strong><i class="fab fa-apple"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @elseif(Str::is('*Windows*', $product->OS_version))
                            <p><strong><i class="fab fa-windows"></i> HĐH: </strong>{{ $product->OS_version }}</p>
                          @endif
                          <p><strong><i class="fas fa-battery-full"></i> Dung Lượng PIN: </strong>{{ $product->pin }}</p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      <div class="container pt-5">
  <div class="row middle-row " style="margin: 50px 0;">
    <div class="col-lg-4 bt-border">
      <div class="icon-cart-ship icon-policy icon-style">
        <i class="fas fa-truck"></i>
      </div>
      <div class="policy-title">
        <span>Giao Hàng Toàn Quốc</span>
      </div>
      <div class="policy-content">
        <span>Ship COD toàn quốc. Nhận hàng trong vòng 2-3 ngày</span>
      </div>
    </div>
    <div class="col-lg-4 return-free bt-border">
      <div class="icon-cart-ship icon-policy icon-style">
        <i class="fas fa-undo"></i>
      </div>
      <div class="policy-title">
        <span>Hoàn Trả Miễn Phí</span>
      </div>
      <div class="policy-content">
        <span>Xem hàng trước khi nhận. Hoàn trả miễn phí nếu không hài lòng</span>
      </div>
    </div>
    <div class="col-lg-4 bt-border">
      <div class="icon-cart-ship icon-policy icon-style">
        <i class="fas fa-home"></i>
      </div>
      <div class ="policy-title">
        <span>Bảo hành 1 năm</span>
      </div>
      <div class="policy-content">
        <span>Bảo hành 1 năm. Lỗi 1 đổi 1 tất cả các sản phẩm của Apple</span>
      </div>
    </div>
  </div>
</div>
    </div>
    </section>

  </div>
@endsection

@section('css')
  <style>

  </style>
@endsection

@section('js')
  <script>
    $(document).ready(function(){
      $("#slide-advertise").owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true,
        loop: true,
        nav: true,
        dots: true,
        dotsData: true,
        responsive:{
          0:{
            nav:false,
            dots: false
          },
          641:{
            nav:true,
            dots: true
          }
        },
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dotsContainer: '.custom-dots-slide-advertises'
      });

      $("#slide-favorite").owlCarousel({
        items: 5,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive:{
          0:{
              items:1,
              nav:false
          },
          480:{
              items:2,
              nav:false
          },
          769:{
              items:3,
              nav:true
          },
          992:{
              items:4,
              nav:true,
          },
          1200:{
              items:5,
              nav:true
          }
        },
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
      });

      @if(session('alert'))
        Swal.fire(
          '{{ session('alert')['title'] }}',
          '{{ session('alert')['content'] }}',
          '{{ session('alert')['type'] }}'
        )
      @endif
    });
  </script>
@endsection
