<div class="support-cart mini-cart cart-sidebar">
    <a class="btn-support-cart" href="{{ route('show_cart') }}">
<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" viewBox="0 0 512.016 512.016" xml:space="preserve">
<circle cx="377.128" cy="450.56" r="61.456"/>
<circle style="fill:#999999;" cx="377.128" cy="450.56" r="29.856"/>
<polygon points="145.544,151.36 105.184,31.92 0.68,31.92 0.68,0 128.096,0 175.784,141.136 "/>
<circle cx="191.752" cy="450.56" r="61.456"/>
<polygon style="fill:#FFFFFF;" points="147.824,353.584 78.992,132.552 499.992,132.552 421.208,353.584 "/>
<path style="fill:#E21B1B;" d="M488.648,140.56L415.576,345.6H153.712L89.864,140.56L488.648,140.56 M511.336,124.56H68.128  l73.808,237.04h284.92L511.336,124.56z"/>
<circle style="fill:#999999;" cx="191.752" cy="450.56" r="29.856"/>
<rect x="406.144" y="212.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -60.2297 374.6635)" width="32" height="95.871"/>
<path style="fill:#FFFFFF;" d="M329.608,245.6c-53.016,0-96-42.984-96-96s42.984-96,96-96s96,42.984,96,96  C425.552,202.592,382.6,245.544,329.608,245.6z"/>
<path style="fill:#E21B1B;" d="M329.608,65.6c46.392,0,84,37.608,84,84s-37.608,84-84,84s-84-37.608-84-84  C245.664,103.232,283.24,65.656,329.608,65.6 M329.608,41.6c-59.648,0-108,48.352-108,108s48.352,108,108,108s108-48.352,108-108  S389.256,41.6,329.608,41.6L329.608,41.6z"/>
</svg>
      <div class="animated infinite zoomIn kenit-alo-circle"></div>
      <div class="animated infinite pulse kenit-alo-circle-fill"></div>
      <span class="cnt crl-bg count_item_pr">{{ $cart->totalQty }}</span>
    </a>
    <div class="top-cart-content">
      <ul id="cart-sidebar" class="mini-products-list count_li">
        @if($cart->totalQty)
          <ul class="list-item-cart">
            @foreach($cart->items as $key => $item)
              <li class="item productid-{{$key}}">
                <a class="product-image" href="{{ route('product_page', ['id' => $item['item']->product->id]) }}" title="{{ $item['item']->product->name . ' - ' . $item['item']->color }}">
                  <img alt="{{ $item['item']->product->name . ' - ' . $item['item']->color }}" src="{{ Helper::get_image_product_url($item['item']->product->image) }}" width="80">
                </a>
                <div class="detail-item">
                  <div class="product-details">
                    <a href="javascript:;" data-id="{{ $key }}" title="Xóa" class="remove-item-cart fa fa-remove" data-url="{{ route('remove_cart') }}" onclick="removeItem($(this));">
                      <i class="fas fa-times"></i>
                    </a>
                    <p class="product-name">
                      <a href="{{ route('product_page', ['id' => $item['item']->product->id]) }}" title="{{ $item['item']->product->name . ' - ' . $item['item']->color }}">{{ $item['item']->product->name . ' - ' . $item['item']->color }}
                      </a>
                    </p>
                  </div>
                  <div class="product-details-bottom">
                    <span class="price pricechange">{{ number_format($item['price'],0,',','.') }}₫</span>
                    <div class="quantity-select">
                      <input class="variantID" type="hidden" name="variantId" value="{{ $key }}">
                      <button onclick="minus({{ $key }});" class="reduced items-count btn-minus" type="button">–</button>
                      <input type="text" disabled="" maxlength="3" min="1" max="{{ $item['item']->quantity }}" onchange="if(this.value == 0)this.value = 1;" class="input-text number-sidebar qty{{ $key }}" id="qty{{ $key }}" name="Lines" size="4" value="{{ $item['qty'] }}" data-url="{{ route('update_minicart') }}">
                      <button onclick="plus({{ $key }});" class="increase items-count btn-plus" type="button">+</button>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
          <div>
            <div class="top-subtotal">Tổng cộng: <span class="price">{{ number_format($cart->totalPrice,0,',','.') }}₫</span></div>
          </div>
          <div>
            <div class="actions clearfix">
              <a href="javascript:;" onclick="showCheckout($(this));" class="btn btn-gray btn-checkout" title="Thanh toán" data-url="{{ route('show_checkout') }}">
                <span>Thanh toán</span>
              </a>
              <a href="{{ route('show_cart') }}" class="view-cart btn btn-white margin-left-5" title="Giỏ hàng">
                <span>Giỏ hàng</span>
              </a>
            </div>
          </div>
        @else
          <div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>
        @endif
      </ul>
    </div>
  </div>
  <div id="menu-overlay"></div>
