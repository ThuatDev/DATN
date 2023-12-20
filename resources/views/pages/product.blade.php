
@extends('layouts.master')

@section('title', $data['product']->name)

@section('content')
{{-- imprort fontawesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-dZjiQhi9BvP+41Io5v2sKz1e3+QQb2zPHZo5lqVvQ1ZI4t/4bOtc1hVC9tf7fFJo" crossorigin="anonymous">

<style>
    .capacity-option.active {
    border: 1px solid #dd0115; /* Ví dụ: đường viền xanh */
    background-color: #fcfcfc; /* Ví dụ: nền xanh nhạt */
    color: #dd0115; /* Ví dụ: chữ màu xanh */
    
}
   .hidden-color {
        display: none;
    }

    .visible-color {
        display: block; /* hoặc bất kỳ giá trị display nào phù hợp với thiết kế của bạn */
    }


#more-infomation .modal-header button.close {
    padding: 10px;
    position: absolute;
    top: 11px !important;
    right: 32px !important;
}
.capacity-option {
    cursor: pointer;
        padding: 10px;
    font-size: 14px;
    border-radius: 6px;
    height: 30px !important;
    min-width: auto !important;
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    border-radius: 4px;
}

</style>



    <section class="section-product">
      <div class="section-header">
        <h2 class="section-title">{{ $data['product']->name }}</h2>
        <div class="section-sub-title">
          <div class="sku-code">Mã sản phẩm: <i>{{ $data['product']->sku_code }}</i></div>
          <div class="start-vote">{!! Helper::get_start_vote($data['product']->rate) !!}</div>
          <div class="rate-link" onclick="scrollToxx();"><span>Đánh giá sản phẩm</span></div>
        </div>
      </div>
      <div class="section-content">
        <div class="section-infomation">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="image-product">
                    @foreach($data['product_details'] as $key => $product)
                      @if($key == 0)
                      <div class="image-gallery-{{ $key }}">
                      @else
                      <div class="image-gallery-{{ $key }}" style="display: none;">
                      @endif

                      @if($product->product_images->isNotEmpty())
                        <ul id="imageGallery-{{ $key }}">
                          @foreach($product->product_images as $image)
                            <li data-thumb="{{ Helper::get_image_product_url($image->image_name) }}" data-src="{{ Helper::get_image_product_url($image->image_name) }}">
                              <img src="{{ Helper::get_image_product_url($image->image_name) }}" />
                            </li>
                          @endforeach
                        </ul>
                      @else
                        <div><img src="{{ Helper::get_image_product_url('not-image.jpg') }}"></div>
                      @endif
                      </div>
                    @endforeach
                  </div>
                </div>

                <div class="col-md-6 col-sm-6">
                  <div class="price-product">
                  @foreach($data['product_details'] as $key => $product)
    @if($key)
        <div class="product-{{ $key }}" style="display: none;">
    @else
        <div class="product-{{ $key }}">
    @endif
        @if(isset($product->discountedPrice))

            <div class="sale-price">{{ number_format($product->discountedPrice, 0, ',', '.') }} <span>VNĐ</span></div>
        @else
            {{-- If no discounted price, check for promotion --}}
            @if($product->promotion_price != null && $product->promotion_start_date <= now() && $product->promotion_end_date >= now())
                {{-- Display flash sale price if promotion is active --}}
                <div class="sale-price">{{ number_format($product->promotion_price, 0, ',', '.') }} <span>VNĐ</span></div>
                <div class="promotion-price">
                    <div class="old-price">Giá cũ: <del>{{ number_format($product->sale_price, 0, ',', '.') }}</del> <span>VNĐ</span></div>
                    <div class="save-price">Giảm: <span>{{ number_format($product->sale_price - $product->promotion_price, 0, ',', '.') }}</span> <span>VNĐ</span></div>
                </div>
            @else
                {{-- Display regular price if no promotion --}}
                <div class="sale-price">{{ number_format($product->sale_price, 0, ',', '.') }} <span>VNĐ</span></div>
            @endif
        @endif
        @if($product->quantity > 0)
            <div class="status">Tình trạng: <span style="color: #1a2;">Còn hàng</span></div>
        @else
            <div class="status">Tình trạng: <span style="color: #f30;">Hết hàng</span></div>
        @endif
    </div>
@endforeach

                  </div>
                  <div class="color-product">
                     <div class="title">Màu sắc:</div>
                   <div class="select-color color-container">
    <div class="row">
      @foreach($data['product_details'] as $key => $product)
  <div class="col-lg-3 col-3 col-md-4 col-sm-4 col-xs-12 width_lgcol parent-x">
 <div class="color-inner {{ $key == 0 ? 'active' : '' }}" data-key="{{ $key }}" product-id="{{ $product->id }}" data-capacity="{{ $product->capacity }}"  can-buy="{{ $product->quantity > 0 ? '1' : '0'}}" data-qty="{{ $product->quantity }}">
      <div class="select-inner">
        <div class="image-color"><img src="{{ Helper::get_image_product_url($product->product_images[0]->image_name ?? 'not-image.jpg') }}"></div>
        <div class="image-name">{{ $product->color }}</div>
      </div>
      <div class="image-check"><img src="http://127.0.0.1:8888/images/select-pro.png"></div>
    </div>
  </div>
@endforeach

    </div>
</div>
                    </div>
                        {{-- hiển thị ra dung lương trường capacity của bảng product_details  --}}

                           <div class="title">Dung lượng:</div>
        <div class="row capacity-container">

    @php $displayedCapacity = null; @endphp

    @foreach($data['product_details'] as $key => $product)
            @if($product->capacity && $product->capacity != $displayedCapacity)
            <div class="capacity col-4 col-md-4 border-dark border-primary">
              <div class="capacity-option" data-key="{{ $key }}">{{ $product->capacity }}</div>
            </div>
                 @endif
            @php $displayedCapacity = $product->capacity; @endphp

    @endforeach
</div>


                  @if($data['product']->promotions->isNotEmpty())
                    <div class="promotions">
                      <div class="title">Khuyến mãi đặc biệt</div>
                      <ul class="content">
                        @foreach($data['product']->promotions as $promotion)
                          <li>{{ $promotion->content }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif





                  <div class="form-payment">
                    <form action="{{ route('show_checkout') }}" method="POST" accept-charset="utf-8" cl style="display: flex;
                    flex-direction: column;" >
                      @csrf
                      <input type="hidden" id="product-id" name="product_id" value="{{ $data['product_details'][0]->id }}">

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 sm-flex">
                        <span class="quanity">Số Lượng:</span>
                        <div class="form-center">
                          <button type="button" onclick="minusInput();" class="btn-minus btn-cts">–</button>
                          <input type="text" class="qty input-text" id="qty" name="quantity" size="4" value="{{ $data['product_details'][0]->quantity <= 0 ? 0 : 1 }}" min="0" max="{{ $data['product_details'][0]->quantity }}" disabled>
                          <button type="button" onclick="plusInput();" class="btn-plus btn-cts">+</button>
                        </div>
                      </div>
                      <div class="row pd-left">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="z-index: 9999;">
                          <button type="submit" class="btn btn-lg btn-gray"> Mua ngay</button>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pdd-left">
                          <button style="width: 175px;" type="button" data-role="addtocart" class="btn btn-add-to-cart btn-lg btn-gray btn-cart btn_buy add_to_cart" data-url="{{ route('add_cart') }}"><span class="txt-main"><i class="fa fa-cart-arrow-down padding-right-10"></i> Thêm Giỏ hàng</span></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-md-3">
              <div class="online_support">
                <h2 class="title">CHÚNG TÔI LUÔN SẴN SÀNG<br>ĐỂ GIÚP ĐỠ BẠN</h2>
                 <img src="{{ asset('images/support_online.jpg') }}">
                <h3 class="sub_title">Để được hỗ trợ tốt nhất. Hãy gọi</h3>
                <div class="phone">
                  <a href="tel:18006750" title="1800 6750">1800 6750</a>
                </div>
                <div class="or"><span>HOẶC</span></div>
                <h3 class="title">Chat hỗ trợ trực tuyến</h3>
                <h3 class="sub_title">Chúng tôi luôn trực tuyến 24/7.</h3>
              </div>
            </div>

          </div>
        </div>
        <div class="section-description">
          <div class="row">
            <div class="col-lg-7 col-md-8">
              <div class="tab-description">
                <div class="tab-header">
                  <ul class="nav nav-tabs nav-tab-custom">
                    <li class="active"><a data-toggle="tab" href="#description">Mô Tả</a></li>
                    <li><a data-toggle="tab" href="#vote">Nhận Xét Và Đánh Giá</a></li>
                  </ul>
                </div>
                 <div class="tab-content">
                  <div id="description" class="tab-pane fade in active">
                    <div class="content-description">
                      @if($data['product']->product_introduction)
                        {!! $data['product']->product_introduction !!}
                      @else
                        <p class="text-center"><strong>Đang cập nhật ...</strong></p>
                      @endif
                    </div>
                    <div class="loadmore"
                     style="display: none; bgcolor: #fff; text-align: center; 0;
                     "><a>Đọc thêm <i class="fas fa-angle-down"></i></a></div>
                    <div class="hidemore" style="display: none;"><a>Thu gọn <i class="fas fa-angle-up"></i></a></div>
                  </div>
                  {{-- vote  --}}
                  {{-- <div id="vote" class="tab-pane fade">
                    <div class="content-vote">
                      @if(Auth::check())
                      <div class="section-rating">
                        <div class="rating-title">Đánh giá sản phẩm</div>
                        <div class="rating-content">
                          <div class="rating-product"></div>
                          <div class="rating-form">
                            <form action="{{ route('add_vote') }}" method="POST" accept-charset="utf-8">
                              @csrf
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="product_id" value="{{ $data['product']->id }}">
                              <textarea name="content" placeholder="Nội dung..." rows="3"></textarea>
                              <button type="submit" class="btn btn-default">Gửi đánh giá</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      @endif
                      <div class="show-rate">
                        <div class="show-rate-header">
                          Đánh giá từ người dùng
                        </div>
                        <div class="show-rate-content">
                          <div class="total-rate">
                            <div class="total-rate-left">{{ $data['product']->rate }}</div>
                            <div class="total-rate-right">
                              <div class="start">{!! Helper::get_start_vote($data['product']->rate) !!}</div>
                              <div class="total-user">{{ $data['product_votes']->count() }} <i class="fas fa-users"></i></div>
                            </div>
                          </div>
                          @if($data['product_votes']->isNotEmpty())
                            <div class="vote-inner">
                              @foreach($data['product_votes'] as $vote)
                                <div class="vote-content">
                                  <div class="vote-content-left"><img src="{{ Helper::get_image_avatar_url($vote->user->avatar_image) }}"></div>
                                  <div class="vote-content-right">
                                    <div class="name">
                                      {{ $vote->user->name }}
                                    </div>
                                    <div class="vote-start">
                                      <div class="star">{!! Helper::get_start_vote($vote->rate) !!}</div>
                                      <div class="date">{{ date_format($vote->created_at, 'd/m/Y') }}</div>
                                    </div>
                                    <div class="content">{{ $vote->content }}</div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          @else
                            <p class="text-center"><strong>Chưa có lượt đánh giá nào từ người dùng. Hãy cho chúng tôi biết ý kiến của bạn.</strong></p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div> --}}

                        <div id="vote" class="tab-pane fade">
                    <div class="content-vote">
                   @if(Auth::check())
    <div class="section-rating">
        <div class="rating-title">Đánh giá sản phẩm</div>
        <div class="rating-content">
            <div class="rating-product"></div>
         <div class="rating-form">
    @if(Auth::check())
        @if(Auth::user()->hasPurchased($data['product']->id))
            <form action="{{ route('add_vote') }}" method="POST" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="product_id" value="{{ $data['product']->id }}">
                <textarea name="content" placeholder="Nội dung..." rows="3"></textarea>
                <button type="submit" class="btn btn-default">Gửi đánh giá</button>
            </form>
        @else
            <p>Bạn phải mua sản phẩm này trước khi đánh giá.</p>
        @endif
    @endif
</div>

        </div>
    </div>
@endif

                      <div class="show-rate">
                        <div class="show-rate-header">
                          Đánh giá từ người dùng
                        </div>
                        <div class="show-rate-content">
                          <div class="total-rate">
                            <div class="total-rate-left">{{ $data['product']->rate }}</div>
                            <div class="total-rate-right">
                              <div class="start">{!! Helper::get_start_vote($data['product']->rate) !!}</div>
                              <div class="total-user">{{ $data['product_votes']->count() }} <i class="fas fa-users"></i></div>
                            </div>
                          </div>
                          @if($data['product_votes']->isNotEmpty())
                            <div class="vote-inner">
                              @foreach($data['product_votes'] as $vote)
                                <div class="vote-content">
                                  <div class="vote-content-left"><img src="{{ Helper::get_image_avatar_url($vote->user->avatar_image) }}"></div>
                                  <div class="vote-content-right">
                                    <div class="name">
                                      {{ $vote->user->name }}
                                    </div>
                                    <div class="vote-start">
                                      <div class="star">{!! Helper::get_start_vote($vote->rate) !!}</div>
                                      <div class="date">{{ date_format($vote->created_at, 'd/m/Y') }}</div>
                                    </div>
                                    <div class="content">{{ $vote->content }}</div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          @else
                            <p class="text-center"><strong>Chưa có lượt đánh giá nào từ người dùng. Hãy cho chúng tôi biết ý kiến của bạn.</strong></p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-4">
              <div class="infomation-detail">
                <div class="infomation-header">
                  <h2 class="title">Thông Số Kỹ Thuật</h2>
                </div>
                <!-- chi tiet  -->

                <div class="table-responsive" style="max-height: 292px ">
  <table class="table table-striped">
    @if($data['product']->product_introduction)
      {!! $data['product']->information_details !!}
    @else
      <p class="text-center"><strong>Đang cập nhật ...</strong></p>
    @endif
  </table>
</div>

    <style>
        #more-infomation .modal-header button.close {
    padding: 10px;
    position: absolute;
    top: 0;
    right: 0;
}
.table-striped >img {
    width: 100%;
    height: auto;
    object-fit: contain;
}


#more-infomation .modal-title {
    margin-right: 30px; /* Để giữ khoảng cách giữa title và nút đóng */
}


    </style>
                <div class="more-infomation">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#more-infomation">
                    Xem cấu hình chi tiết
                  </button>
                </div>
              </div>
              <div class="suggest-product">
                <div class="suggest-header">
                  <h2>Sản Phẩm Cùng Loại</h2>
                </div>
                @if($data['suggest_products']->isNotEmpty())
                  <div class="suggest-content">
                    @foreach($data['suggest_products'] as $product)
                      <a href="{{ route('product_page', ['id' => $product->id]) }}" title="{{ $product->name }}">
                        <div class="product-content">
                          <div class="image">
                            <img src="{{ Helper::get_image_product_url($product->image) }}">
                          </div>
                          <div class="content">
                            <h3 class="title">{{ $product->name }}</h3>
                            <div class="start-vote">
                              {!! Helper::get_start_vote($product->rate) !!}
                            </div>
                            <div class="price">
                              {!! Helper::get_real_price($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                            </div>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
<div id="more-infomation" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <h4 class="modal-title">Thông Số Kĩ Thuật Chi Tiết</h4>
      </div>
      <div class="modal-body">
        <div class="content">
          @if($data['product']->product_introduction)
            {!! $data['product']->information_details !!}
          @else
            <p class="text-center"><strong>Đang cập nhật ...</strong></p>
          @endif
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection

@section('css')
  <link type="text/css" rel="stylesheet" href="{{ asset('common/lightGallery/dist/css/lightgallery.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('common/lightslider/dist/css/lightslider.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('js')
  <script src="{{ asset('common/Rate/rater.js') }}"></script>
  <script src="{{ asset('common/lightGallery/dist/js/lightgallery.js') }}"></script>
  <script src="{{ asset('common/lightslider/dist/js/lightslider.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
  <script>
  $(document).ready(function() {
    $(document).on('click', '.capacity-option', function () {
        var capacity = $(this).text().trim();
        $('.capacity-option').removeClass('active');
        $(this).addClass('active');

        $('.color-inner').parent().addClass('d-none');
        $('.color-inner[data-capacity="' + capacity + '"]').parent().removeClass('d-none');
    });

    // Xử lý khi chọn màu sắc
    $(document).on('click', '.color-inner', function () {
        var productId = $(this).data('product-id');
        $('#product-id').val(productId); // Cập nhật ID sản phẩm vào form
    });

    // Xử lý khi thêm vào giỏ hàng
    $('.btn-add-to-cart').on('click', function () {
        var productId = $('#product-id').val(); // Lấy ID sản phẩm từ form
        var quantity = $('#qty').val(); // Lấy số lượng

        // Kiểm tra dữ liệu trước khi gửi
        if (productId && quantity && quantity > 0) {
            var form = $('#add-to-cart-form');
            form.submit(); // Gửi form đến server
        } else {
            // Hiển thị thông báo lỗi nếu thông tin không đầy đủ
            // alert('Vui lòng chọn đầy đủ thông tin sản phẩm.');
        }
    });

    // Khởi tạo trang với dung lượng đầu tiên
    $('.capacity-option:first').trigger('click');

    // Debugging - kiểm tra console để xem có lỗi gì xuất hiện không
    $(document).on('click', '.color-inner', function () {
        console.log('Màu sắc được chọn:', $(this).find('.image-name').text().trim());
        console.log('ID sản phẩm:', $(this).data('product-id'));
    });

    $('.btn-add-to-cart').on('click', function () {
        console.log('Đã click vào nút Thêm vào giỏ hàng');
        // Thêm các log khác nếu cần thiết để theo dõi quá trình thực thi
    });

    // active

      $(".section-rating .rating-form form").submit( function(eventObj) {
        $("<input />").attr("type", "hidden")
          .attr("name", "rate")
          .attr("value", $(".rating-product").rate("getValue"))
          .appendTo(".section-rating .rating-form form");
        return true;
      });
      @if(session('vote_alert'))
        scrollToxx();
        Swal.fire(
          '{{ session('vote_alert')['title'] }}',
          '{{ session('vote_alert')['content'] }}',
          '{{ session('vote_alert')['type'] }}'
        );
      @endif
      @if(session('alert'))
        Swal.fire(
          '{{ session('alert')['title'] }}',
          '{{ session('alert')['content'] }}',
          '{{ session('alert')['type'] }}'
        );
      @endif
    });
  </script>
@endsection
