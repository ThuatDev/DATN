@extends('layouts.master')

@section('title', 'Trang Chủ')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
/* Add this CSS to your existing styles or in a separate stylesheet */

/* Add this CSS to your existing styles or in a separate stylesheet */
 .ega-badge-ctd {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
/* giam gia  */
.expired-text {
    font-size: 18px; /* Kích thước chữ */
    font-weight: bold; /* Chữ in đậm */
    color: #fff; /* Màu chữ */
    background-color: #d9534f; /* Màu nền */
    padding: 10px; /* Khoảng cách giữa chữ và khung nền */
    border-radius: 5px; /* Bo tròn góc của khung nền */
}

.ega-badge-ctd__group {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #343a40; /* Change the background color to your preference */
    color: #ffffff; /* Change the text color to your preference */
    padding: 5px;
    border-radius: 5px;
    flex: 1; /* Use flex property to distribute space equally among child items */
}
.w-p{
    width: 34px;
}
.ega-badge-ctd__item {
    font-size: 16px;
}

.fs-6 {
    font-size: 12px !important;
}

.ega-badge-ctd__colon {
    padding: 0 5px;
}
/* Optional: Add any additional styling you may need for the countdown elements */

</style>
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
<section>
      <div class="container-fluid my-5">
        <h2 class="text-center">DANH MỤC NỔI BẬT</h2>
      <div class="row justify-content-center">
  <div class="col-lg-2 col-md-2 col-sm-6 col-xl-2 p-3">
    <a href="" title="Iphone" class="link-category">
      <div class="item-category">
        <img src="https://bizweb.dktcdn.net/100/480/632/themes/900313/assets/cate_1.png?1700210116789" class="owl-lazy" alt="">
        <span class="text-center d-lg-block">iPhone</span>
      </div>
    </a>
  </div>

  <div class="col-lg-2 col-md-2 col-sm-6 col-xl-2 p-3">
    <a href="" title="Iphone" class="link-category">
      <div class="item-category">
        <img src="https://bizweb.dktcdn.net/100/480/632/themes/900313/assets/cate_4.png?1700210116789" class="owl-lazy" alt="">
        <span class="text-center d-lg-block">Watch</span>
      </div>
    </a>
  </div>

  <div class="col-lg-2 col-md-2 col-sm-6 col-xl-2 p-3">
    <a href="" title="Iphone" class="link-category">
      <div class="item-category">
        <img src="https://cdn.tgdd.vn//content/Loa-90x110.png" class="owl-lazy" alt="">
        <span class="text-center d-lg-block">Âm thanh</span>
      </div>
    </a>
  </div>

  <div class="col-lg-2 col-md-2 col-sm-6 col-xl-2 p-3">
    <a href="" title="Iphone" class="link-category">
      <div class="item-category">
        <img src="https://cdn.tgdd.vn//content/PC-90x110.png" class="owl-lazy" alt="">
        <span class="text-center d-lg-block">Phụ kiện</span>
      </div>
    </a>
  </div>
</div>

      </div>
    </section>
  <body>
    <div class="container-fluid containerv1 ">
      <div
        class="title_module_main row mx-0 heading-bar d-flex justify-content-between align-items-center py-0"
      >
       <div class="d-flex align-items-center flex-wrap flashsale__header col-12 justify-content-between">
    <div style="display: flex; align-items: center; gap: 10px">
         <h2 class="heading-bar__title flashsale__title m-0">
              <a class="link" href="khuyen-mai" title="GIẢM SỐC 50%"
                >GIẢM SỐC 50%</a
              >
              <span class="ega-dot"><span class="ega-ping"></span></span>
            </h2>
          <img
              style="max-width: 30px; max-height: 20px"
              alt="GIẢM SỐC 50%"
              src="//bizweb.dktcdn.net/100/441/086/themes/896335/assets/flashsale-hot.png?1700018532869"
            />
    </div>
<div class="flashsale__countdown-wrapper">
    <span class="flashsale__countdown-label mr-sm-2 mr-auto kt">Kết thúc sau</span>
    <div class="flashsale__countdown" data-countdown-type="hours" data-countdown="" data-product-id="{{ $data['favorite_products'][0]['id'] }}">
        <div class="ega-badge-ctd">
            <div class="ega-badge-ctd__group w-p">
                <div class="ega-badge-ctd__item fs-5 ega-badge-ctd__h">00</div>
                <span class="fs-6">Giờ</span>
            </div>
            <div class="ega-badge-ctd__colon p-2">:</div>
            <div class="ega-badge-ctd__group w-p">
                <div class="ega-badge-ctd__item fs-5 ega-badge-ctd__m">00</div>
                <span class="fs-6">Phút</span>
            </div>
            <div class="ega-badge-ctd__colon p-2">:</div>
            <div class="ega-badge-ctd__group w-p">
                <div class="ega-badge-ctd__item fs-5 ega-badge-ctd__s">00</div>
                <span class="fs-6">Giây</span>
            </div>
        </div>
    </div>
</div>

</div>

<script>

 // Set the total seconds for the specific product
 // Set the total seconds for the specific product
var productTimer = {{ $data['favorite_products'][0]['total_seconds'] }};
// var remaining_time = {{ $data['favorite_products'][0]['remaining_time'] }};
// console.log(remaining_time);
function updateProductCountdown() {
    var hours = Math.floor(productTimer / 3600);
    var minutes = Math.floor((productTimer % 3600) / 60);
    var seconds = productTimer % 60;

    // Update the HTML elements for the specific product
    $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__h").text(padZero(hours));
    $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__m").text(padZero(minutes));
    $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__s").text(padZero(seconds));

    // Decrease totalSeconds for the specific product
    productTimer--;

    // Stop the countdown if totalSeconds reaches zero for the specific product
    if (productTimer < 0) {
        clearInterval(productInterval);
       $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}']").html("<div class='expired-text'>Hết hạn</div>");
        // ẩn đi   <span class="flashsale__countdown-label mr-sm-2 mr-auto kt">Kết thúc sau</span>
        $(".kt").hide();
    }
}

// Update the countdown for the specific product
var productInterval = setInterval(function () {
    updateProductCountdown();
}, 1000);

function padZero(number) {
    return number < 10 ? "0" + number : number;
}

// v2
// var productTimer = {{ $data['favorite_products'][0]['total_seconds'] }};

// var remaining_time = {{ $data['favorite_products'][0]['remaining_time'] }};
// function updateProductCountdown() {
//     var hours = Math.floor(productTimer / 3600);
//     var minutes = Math.floor((productTimer % 3600) / 60);
//     var seconds = productTimer % 60;

//     // Update the HTML elements for the specific product
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__h").text(padZero(hours));
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__m").text(padZero(minutes));
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__s").text(padZero(seconds));

//     // Decrease totalSeconds for the specific product
//     productTimer--;

//     // Check if the countdown has ended

//     if (remaining_time ="Đã kết thúc") {
//         clearInterval(productInterval);
//         $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd").hide();
//         $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}']").append("<div>Đã kết thúc</div>");
//     }
// }

// // Update the countdown for the specific product
// var productInterval = setInterval(function () {
//     updateProductCountdown();
// }, 1000);

// function padZero(number) {
//     return number < 10 ? "0" + number : number;
// }
// var productTimer = {{ $data['favorite_products'][0]['total_seconds'] }};

// function updateProductCountdown() {
//     var hours = Math.floor(productTimer / 3600);
//     var minutes = Math.floor((productTimer % 3600) / 60);
//     var seconds = productTimer % 60;

//     // Update the HTML elements for the specific product
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__h").text(padZero(hours));
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__m").text(padZero(minutes));
//     $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}'] .ega-badge-ctd__s").text(padZero(seconds));

//     // Decrease totalSeconds for the specific product
//     productTimer--;

//     // Stop the countdown if totalSeconds reaches zero for the specific product
//     if (productTimer < 0) {
//         clearInterval(productInterval);
//         $(".flashsale__countdown[data-product-id='{{ $data['favorite_products'][0]['id'] }}']").html("Đã kết thúc");
//     }
// }

// // Update the countdown for the specific product
// var productInterval = setInterval(function () {
//     updateProductCountdown();
// }, 1000);

// function padZero(number) {
//     return number < 10 ? "0" + number : number;
// }
</script>

        <div class="flashsale__news col-12 col-lg-6" style="min-width: 0px">
          <span class="flashsale__news-title"> BẢN TIN KHUYẾN MÃI </span>
          <div
            class="flashsale__news-list slick-initialized slick-slider"
            style="min-width: 0px"
          >
            <div
              aria-live="polite"
              class="slick-list draggable"
              style="padding: 0px 50px"
            >
              <div
                class="slick-track"
                style="
                  opacity: 1;
                  width: 15000px;
                  transform: translate3d(-780px, 0px, 0px);
                  transition: transform 5000ms linear 0s;
                "
                role="listbox"
              >
                <a
                  href="/"
                  title="Giảm 8% cho đơn hàng từ 499K"
                  class="slick-slide slick-cloned"
                  data-slick-index="-2"
                  aria-hidden="true"
                  tabindex="-1"
                  >Giảm 8% cho đơn hàng từ 499K</a
                ><a
                  href="/"
                  title="Giảm 10% cho đơn hàng từ 800K"
                  class="slick-slide slick-cloned slick-center"
                  data-slick-index="-1"
                  aria-hidden="true"
                  tabindex="-1"
                  >Giảm 10% cho đơn hàng từ 800K</a
                ><a
                  href="/"
                  title="Giảm 30K cho đơn hàng từ 399K"
                  class="slick-slide"
                  data-slick-index="0"
                  aria-hidden="true"
                  tabindex="-1"
                  role="option"
                  aria-describedby="slick-slide20"
                  >Giảm 30K cho đơn hàng từ 399K</a
                ><a
                  href="/"
                  title="Giảm 8% cho đơn hàng từ 499K"
                  class="slick-slide"
                  data-slick-index="1"
                  aria-hidden="true"
                  tabindex="-1"
                  role="option"
                  aria-describedby="slick-slide21"
                  >Giảm 8% cho đơn hàng từ 499K</a
                ><a
                  href="/"
                  title="Giảm 10% cho đơn hàng từ 800K"
                  class="slick-slide slick-current slick-active slick-center"
                  data-slick-index="2"
                  aria-hidden="false"
                  tabindex="-1"
                  role="option"
                  aria-describedby="slick-slide22"
                  >Giảm 10% cho đơn hàng từ 800K</a
                ><a
                  href="/"
                  title="Giảm 30K cho đơn hàng từ 399K"
                  class="slick-slide slick-cloned"
                  data-slick-index="3"
                  aria-hidden="true"
                  tabindex="-1"
                  >Giảm 30K cho đơn hàng từ 399K</a
                ><a
                  href="/"
                  title="Giảm 8% cho đơn hàng từ 499K"
                  class="slick-slide slick-cloned"
                  data-slick-index="4"
                  aria-hidden="true"
                  tabindex="-1"
                  >Giảm 8% cho đơn hàng từ 499K</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end header  -->
      <div class="container-fluid">
  <div class="row mx-0 flashsale__container">
    <!-- Sản phẩm 1 -->
    {{-- 'product_phukien' => $product_phukien,'favorite_products' => $favorite_products, 'posts' => $posts, 'advertises' => $advertises, 'producers' => $producers]); --}}
{{-- favorite_products --}}
@foreach ($data['favorite_products'] as $product)

       <div class="flashsale__item px-2">

      <div class="item_product_main  px-2">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"

                style="--image-scale: 0.75"
                src="{{ Helper::get_image_product_url($product->image) }}"
                title="{{ $product->name }}"
                alt="{{ $product->name }}"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"

                style="--image-scale: 0.75"
                src="{{ Helper::get_image_product_url($product->productImages->image_name) }}"
                alt="{{ $product->name }}"
                title="{{ $product->name }}"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="{{ route('product_page', ['id' => $product->slug]) }}"
              >
                <a
                  title="Xem nhanh"
                  href="{{ route('product_page', ['id' => $product->slug]) }}"
                  data-handle="{{ $product->slug }}"
                  class="xem_nhanh btn-circle btn-views btn_view btn right-to quick-view"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  title="So sánh"
                  data-id="24123431"
                  class="btn-circle btn-views btn js-compare-product-add"
                >
                  <i class="fas fa-random"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="product-info">
            <h3 class="product-name">
              <a
                href="{{ route('product_page', ['id' => $product->slug]) }}"
                title="{{ $product->name }}"
                >{{ $product->name }}</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">{{ number_format($product->flash_sale_price) }}₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="{{ route('product_page', ['id' => $product->slug]) }}"
                data-handle="{{ $product->slug }}"
              class="product-item-btnx btn left-to quick-view px-4"
                title="Tùy chọn"
                type="button"
              >
               <!-- icon cart -->
              <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 512 512">

<defs>

<style>.cls-1{fill:#f19ec3;}</style>

</defs>

<title/>

<g data-name="Layer 9" id="Layer_9">

<path class="cls-1" d="M152,164,133.43,378l-.43,5s9,30,45,30h78V164Z"/>

<path d="M388,376.15,369,162.31a8.13,8.13,0,0,0-8.19-7.44h-40a64.57,64.57,0,0,0-129.13,0h-40a8.23,8.23,0,0,0-8.19,7.44l-19,213.83v.75c0,23.82,21.91,43.2,48.8,43.2H339.2c26.89,0,48.8-19.38,48.8-43.2ZM256.28,106.76a48.25,48.25,0,0,1,48.19,48.12H208.09A48.25,48.25,0,0,1,256.28,106.76ZM339.2,403.65H173.35c-17.75,0-32.21-11.81-32.42-26.48l18.29-205.91h32.49V200a8.19,8.19,0,0,0,16.38,0V171.26h96.37V200a8.19,8.19,0,1,0,16.38,0V171.26h32.49l18.29,206C371.41,391.84,356.95,403.65,339.2,403.65Z"/>

<path d="M290.33,260.87,242,309.19l-19.72-19.72a8.2,8.2,0,1,0-11.6,11.6l25.53,25.53A8.22,8.22,0,0,0,242,329a8.34,8.34,0,0,0,5.8-2.39l54.12-54.12a8.2,8.2,0,0,0,0-11.6A8.32,8.32,0,0,0,290.33,260.87Z"/>

</g>

</svg>
              </button>
            </div>
          </div>
        </form>
        <div class="flashsale__bottom" style="">
														<div class="flashsale__progressbar style2">
																						<div class="flashsale__label"><img src="//bizweb.dktcdn.net/100/441/086/themes/896335/assets/fire-icon.svg?1700018532869"> Sắp cháy hàng</div>

																<div class="flashsale___percent" style="width: 95%;"></div>
							</div>
						</div>
      </div>
    </div>
    {{-- v3  --}}

@endforeach
    </div>
    </div>
    </div>
    {{-- end  --}}



  </div>

  <script>


$(document).ready(function() {
    // Lặp qua từng sản phẩm
    console.log("ok");
    $(".flashsale__item").each(function() {
        // Random giá trị từ 1 đến 2 để xác định trạng thái
        var randomStatus = getRandomInt(1, 2);

        if (randomStatus === 1) {
            // Trạng thái "Sắp cháy hàng"
            $(this).find(".flashsale__label img").attr("src", "//bizweb.dktcdn.net/100/441/086/themes/896335/assets/fire-icon.svg?1700018532869");
            $(this).find(".flashsale__label").html('<img src="//bizweb.dktcdn.net/100/441/086/themes/896335/assets/fire-icon.svg?1700018532869"> Sắp cháy hàng');
            // thêm img này vào nwuax
            // <img src="//bizweb.dktcdn.net/100/441/086/themes/896335/assets/fire-icon.svg?1700018532869">
            // $(this).find(".flashsale__label").text("Sắp cháy hàng")=

            // nếu là sắp

            // Random giá trị từ 1 đến 200 cho số sản phẩm đã bán
            var randomSoldQuantity = getRandomInt(1, 200);
            // $(this).find(".flashsale___percent").text("Đã bán " + randomSoldQuantity + " sản phẩm");

            // Random giá trị từ 80 đến 100 cho độ dài thanh progress bar
            var randomPercent = getRandomInt(80, 100);
            $(this).find(".flashsale___percent").css("width", randomPercent + "%");
        } else {
            // Trạng thái "Đã bán được"
            $(this).find(".flashsale__label img").attr("src", "//bizweb.dktcdn.net/100/441/086/themes/896335/assets/sold-icon.svg?1700018532869");
            // $(this).find(".flashsale__label").text("Đã bán " + randomSoldQuantity + " sản phẩm");

            // Random giá trị từ 1 đến 500 cho số sản phẩm đã bán
            var randomSoldQuantity = getRandomInt(1, 500);
            $(this).find(".flashsale__label").text("Đã bán " + randomSoldQuantity + " sản phẩm");

            // $(this).find(".flashsale___percent").text("Đã bán " + randomSoldQuantity + " sản phẩm");

            // Random giá trị từ 50 đến 80 cho độ dài thanh progress bar
            var randomPercent = getRandomInt(50, 80);
            $(this).find(".flashsale___percent").css("width", randomPercent + "%");
        }
    });
});

// Hàm lấy số nguyên ngẫu nhiên trong khoảng từ min đến max
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}



  </script>
   <section>
      <div class="container">
      <div class="row">
        <div class="col-12">
            <h3 class="pt-4">ĐIỆN THOẠI NỔI BẬT</h3>
        </div>
      </div>

    <div class="row" style="padding: 13px">
    <div class="col-lg-30 block product-col d-none d-lg-block">
        <div class="">
            <a class="banner" href="">
                <img src="https://bizweb.dktcdn.net/thumb/grande/100/441/086/themes/896335/assets/section_hot.jpg?1700018532869"
                    class="card-img-top" width="472" height="345" alt="OPPO Find X3 Pro 5G" />
            </a>
        </div>
    </div>


    @foreach($data['product_phone'] as $key => $product)
        <div class="col-lg-15  product-col p-2">
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
    <div class="text-center col-12 mt-3">
      <a href="" class="btn btn-main-1" title="Xem tat ca">Xem Tất Cả</a>
    </div>


      </div>

    </section>

    {{-- layout dodongf ho --}}
    <section>
      <div class="container">
      <div class="row">
    <div class="col-12">
      <div>
        <h3 class="pt-4">ĐỒNG HỒ THÔNG MINH</h3>
        <div>
          {{-- <div class="row disable-row">
            <div class="col-lg-2 block col-md-2 col-sm-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai"><span>Ốp Lưng</span></a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai">Điện thoại</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai">Máy tính bảng</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai">Tai nghe</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai">Smart Watch</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 d-lg-block">
              <a class="menu-item__link text-center" href="" title="Tong hop khuyen mai">Sạc dự phòng</a>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
      </div>

    <div class="row pt-3 " style="padding: 13px">
      <div>
        <div class="col-lg-3 d-none col-12 pl-0 block  d-none d-lg-block">
            <div class="">
                <a class="banner" href="">
                    <img src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/section_product_tag_1_banner.jpg?1700018532869"
                        class="card-img-top" width="390" height="345" alt="OPPO Find X3 Pro 5G" />
                </a>
            </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="row ">
    @foreach($data['product_watch'] as $key => $product)

        <div class="col-6 col-md-3  product-col p-2">
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
        </div>
      </div>




  </div>


    <div class="text-center col-12 mt-3">
      <a href="" class="btn btn-main-1" title="Xem tat ca">Xem Tất Cả</a>
    </div>


      </div>

    </section>

    {{-- layout phuj kien --}}
<div class="container my-5">
    <a href="" class="" title="Xem tat ca">
        <img src="//bizweb.dktcdn.net/100/441/086/themes/896335/assets/section_hot_banner.png?1700018532869" alt="" style="width: 100%">

    </a>
</div>
    <section>
      <div class="container">
      <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h3 class="pt-4">PHỤ KIỆN ĐIỆN THOẠI</h3>
        <ul class="tabs tabs-title list-unstyled m-0 mt-2 tabs-group d-flex align-items-center">
          <li class="ega-small tab-link px-3 py-2 link" data-tab="product_top_1-tab-1">
            Cáp sạc
          </li>

        <li class="ega-small tab-link px-3 py-2 link ml-2 current" data-tab="product_top_1-tab-2">
                Củ sạc
              </li>

        <li class="ega-small tab-link px-3 py-2 link ml-2" data-tab="product_top_1-tab-3">
      Miếng dán màn hình</li>

</ul>
      </div>
    </div>
      </div>

    <div class="row pt-3 " style="padding: 13px">
      <div>


          <div class="row ">
    @foreach($data['product_phukien'] as $key => $product)

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

      </div>




  </div>


    <div class="text-center col-12 mt-3">
      <a href="" class="btn btn-main-1" title="Xem tat ca">Xem Tất Cả</a>
    </div>


      </div>

    </section>
@endsection

@section('css')

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
