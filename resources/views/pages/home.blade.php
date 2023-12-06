@extends('layouts.master')

@section('title', 'Trang Chủ')
 <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />

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

  <body>
    <div class="container-fluid containerv1 ">
      <div
        class="title_module_main row mx-0 heading-bar d-flex justify-content-between align-items-center py-0"
      >
        <div
          class="d-flex align-items-center flex-wrap flashsale__header col-12 justify-content-between"
        >
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
            <span class="flashsale__countdown-label mr-sm-2 mr-auto" style=""
              >Kết thúc sau</span
            >
            <div
              class="flashsale__countdown"
              data-countdown-type="hours"
              data-countdown=""
            >
              <div class="ega-badge-ctd d-flex">
                <!-- Use Bootstrap bg-dark and text-white classes for dark background with white text -->
                <div
                  class="bg-dark text-white rounded text-center h6"
                  style="height: 40px; width: 40px"
                >
                  <div class="ega-badge-ctd__item ega-badge-ctd__h">09</div>
                  <span>Giờ</span>
                </div>
                <div class="ega-badge-ctd__colon p-2 h5">:</div>
                <div
                  class="bg-dark text-white rounded text-center h6"
                  style="height: 40px; width: 40px"
                >
                  <!-- Use Bootstrap p-2 class for padding -->
                  <div class="ega-badge-ctd__item ega-badge-ctd__m">35</div>
                  <span>Phút</span>
                </div>
                <div class="ega-badge-ctd__colon p-2 h5">:</div>
                <div
                  class="bg-dark text-white rounded text-center h6"
                  style="height: 40px; width: 40px"
                >
                  <!-- Use Bootstrap p-2 class for padding -->
                  <div class="ega-badge-ctd__item ega-badge-ctd__s">27</div>
                  <span>Giây</span>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
     <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
     <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
     <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
     <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
 <div class="col-12 col-lg-2 flashsale__item">
      <div class="item_product_main">
        <form action="">
          <div class="product-thumbnail">
            <a
              href="https://ega-techstore.mysapo.net/apple-watch-series-7-vien-nhom-cellular"
              class="image_thumb"
            >
              <img
                src="https://bizweb.dktcdn.net/100/441/086/themes/896335/assets/frame_1.png?1700018532869"
                alt=""
                class="product-frame"
              />
              <img
                class="product-thumbnail__img product-thumbnail__img--primary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/apple-watch-s7-gps-45mm-xanh-la-thumb-660x600.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />

              <img
                class="product-thumbnail__img product-thumbnail__img--secondary"
                width="480"
                height="480"
                style="--image-scale: 0.75"
                src="//bizweb.dktcdn.net/thumb/medium/100/441/086/products/810903614-jpeg.jpg?v=1639821419160"
                alt="Apple Watch Series 7 Viền nhôm Cellular"
              />
            </a>
            <div class="product-action  ">
              <div
                class="group_action d-flex justify-content-center align-items-center"
                data-url="/apple-watch-series-7-vien-nhom-cellular"
              >
                <a
                  title="Xem nhanh"
                  href="/apple-watch-series-7-vien-nhom-cellular"
                  data-handle="apple-watch-series-7-vien-nhom-cellular"
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
                href="/apple-watch-series-7-vien-nhom-cellular"
                title="Apple Watch Series 7 Viền nhôm Cellular"
                >Apple Watch Series 7 Viền nhôm Cellular</a
              >
            </h3>
            <div class="product-item-cta position-relative">
              <div class="price-box">
                <span class="price">20.490.000₫</span>
              </div>
              <input
                class="hidden"
                type="hidden"
                name="variantId"
                value="56626566"
              />

              <button
                data-href="/apple-watch-series-7-vien-nhom-cellular"
                data-handle="apple-watch-series-7-vien-nhom-cellular"
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
    <!-- Các sản phẩm khác -->
    <!-- ... -->

  </div>
</div>

      </div>
    </div>
    {{-- end  --}}



  </div>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
      <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="">Điện thoại nổi bật</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-lg-30 block product-col">
            <div class="">
              <a class="banner" href=""
                ><img
                  src="https://bizweb.dktcdn.net/thumb/grande/100/441/086/themes/896335/assets/section_hot.jpg?1700018532869"
                  class="card-img-top"
                  width="472"
                  height="345"
                  alt="OPPO Find X3 Pro 5G"
              /></a>
            </div>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-0">
                <h5 class="product-name-1 text-center text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
          <div class="col-6 col-md-3 col-lg-15 product-col p-2">
            <form
              action="/cart/add"
              method="post"
              enctype="multipart/form-data"
              class=""
              data-tags='[["baohanh_Tặng gói bảo hành Gold trị giá 300K","dienthoaiapple","Hồng","lienquan_iphone","lienquaniphone","soluong_500","tragop","tragop_Trả góp 0%","Trắng","video_4s8kqslvkmU","Xanh dương","Đen","Đỏ"]]'
            >
              <div class="box-hover">
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/401676858-jpeg.jpg?v=1639734159007"
                  alt=""
                />
                <img
                  src="https://bizweb.dktcdn.net/thumb/medium/100/441/086/products/571947601-jpeg.jpg?v=1639734159007"
                  alt=""
                  class="img-change"
                />
              </div>
              <div class="px-3">
                <h5 class="product-name-1 text-center">
                  <a class="txt-black" href="">OPPO Find X3 Pro 5G</a>
                </h5>
                <div class="position-relative">
                  <div class="price-boxx">
                    <span class="price-1">24.490.000₫</span>
                    <span class="compare-price">24.990.000₫</span>
                    {{-- <div class="label_product d-inline-block">
                      <div class="label_wrapper">-3%</div>
                    </div> --}}
                  </div>
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

                <span
                  class="product-promo-tag product-promo-tag--3 product-promo-tag--text-2 px-2"
                  style="color: #8f8f8f; background: #e0dbdb4f; border: #ff1010"
                >
                  Tặng gói bảo hành Gold trị giá 300K
                </span>
              </div>
            </form>
          </div>
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
