@extends('admin.layouts.master')

@section('title', 'Quản Lý Sản Phẩm')

@section('embed-css')
<link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('custom-css')
<style>
  #product-table td,
  #product-table th {
    vertical-align: middle !important;
  }
  #product-table span.status-label {
    display: block;
    width: 85px;
    text-align: center;
    padding: 2px 0px;
  }
  #search-input span.input-group-addon {
    padding: 0;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 34px;
    border: none;
    background: none;
  }
  #search-input span.input-group-addon i {
    font-size: 18px;
    line-height: 34px;
    width: 34px;
    color: #f30;
  }


.content-wrapper {
    min-height: calc(100vh - 101px);
    background-color: #ffffff !important;

  #search-input input {
    position: static;
    width: 100%;
    font-size: 15px;
    line-height: 22px;
    padding: 5px 5px 5px 34px;
    float: none;
    height: unset;
    border-color: #fbfbfb;
    box-shadow: none;
    background-color: #e8f0fe;
    border-radius: 5px;
  }
  .modal-xlx {
    max-width: 100% !important;
}

/* Kích thước nội dung modal */
.modal-xl .modal-content {
    width: 100%;
}

/* Nếu bạn muốn thay đổi chiều cao của modal, bạn cũng có thể thêm quy tắc này */
.modal-xl .modal-body {
    max-height: 80vh; /* Điều chỉnh theo nhu cầu */
    overflow-y: auto;
}
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Quản Lý Sản Phẩm</li>
</ol>
@endsection

@section('content')

  <!-- Main row -->
  <h2>Add New Product</h2>

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-6">
              <div id="search-input" class="input-group">
                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="search...">
              </div>
            </div>
            <div class="col-md-7 col-sm-6 col-xs-6">
              <div class="btn-group pull-right">
                <button class="btn btn-info btn-flat" id="addFlashSaleBtn" data-toggle="modal" data-target="#flashSaleModal" style="margin-right: 5px;">
        <i class="fa fa-plus"></i><span class="hidden-xs"> Add Flash Sale</span>
    </button>
                <a href="{{ route('admin.product.index') }}" class="btn btn-flat btn-primary" title="Refresh" style="margin-right: 5px;">
                  <i class="fa fa-refresh"></i><span class="hidden-xs"> Refresh</span>
                </a>
                <a href="{{ route('admin.product.new') }}" class="btn btn-success btn-flat" title="New Product">
                  <i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs"> New Product</span>
                </a>
                </div>

                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProductModal">
    Add Product
</button> --}}
{{-- modal flasale  --}}
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="flashSaleModal" tabindex="-1" role="dialog" aria-labelledby="flashSaleModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 70% !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="flashSaleModalLabel">Add Flash Sale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="flashSaleForm" action="{{ route('admin.product.save_flash_sale') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <table class="table table-bordered flash-sale-table" style="width: 100%;" id="flashSaleTable">
                            <thead>
                                <tr>
                                    <th>IMG</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                            <input type="hidden" name="id[]" value="{{ $product->id }}">
                                        <td>
                                            @if ($product->image)
                                                <div style="background-image: url('{{ Helper::get_image_product_url($product->image) }}'); padding-top: 100%; background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            {{ $product->product_details[0]->sale_price ? number_format($product->product_details[0]->sale_price, 0, ',', '.') . 'đ' : '' }}
                                        </td>
                                        <td>
                                            @if ($product->product_details[0]->quantity > 0)
                                                <span class="">{{ $product->product_details[0]->quantity }}</span>
                                            @else
                                                <span class="">Hết Hàng</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($product->discount)
                                                <input type="number" name="discount[]" min="0" max="100" value="{{ $product->discount }}"
                                                    placeholder="{{ $product->discount }} %"
                                                >

                                            @else
                                                <input type="number" name="discount[]" min="0" max="100" value="0"
                                                  placeholder="{{ $product->discount }} %"
                                                >
                                            @endif

                                        </td>
                                        <td>

                                            @if ($product->start_date)
                                                <input type="datetime-local" name="start_date[]" value="{{ $product->start_date }}">
                                            @else
                                                <input type="datetime-local" name="start_date[]">
                                            @endif

                                        </td>
                                        <td>
                                            @if ($product->end_date)
                                                <input type="datetime-local" name="end_date[]" value="{{ $product->end_date }}">
                                            @else
                                                <input type="datetime-local" name="end_date[]">
                                            @endif

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        var formSubmitted = false;
        var table;

        console.log('Trang đã tải!');

        // Initialize DataTable
        table = $('.flash-sale-table').DataTable({
            lengthMenu: [10, 25, 50, 100], // Chọn số lượng hàng trên mỗi trang
            // ... (cấu hình DataTable)
            initComplete: function () {
                // Kiểm tra xem form đã được submit hay chưa
                if (formSubmitted) {
                    // Nếu đã submit, thiết lập lại số lượng hàng trên mỗi trang theo giá trị mong muốn
                    table.page.len(-1);
                    table.draw();
                }
            },
        });

        // Bắt sự kiện submit form
        $('#flashSaleForm').submit(function (e) {
            console.log('Nút Submit được nhấn!');

            // Thiết lập số lượng hàng trên mỗi trang là không giới hạn
            formSubmitted = true;

            // Gửi form
            return true;
        });

        // Thêm một bộ xử lý sự kiện tùy chỉnh cho nút xóa
        $('.flash-sale-table').on('click.delete', '.btn-danger', function () {
            // Get the clicked row
            var row = $(this).closest('tr');

            // Làm trắng các trường input trong dòng đã xóa
            row.find('input[type="number"]').val('');
            row.find('input[type="datetime-local"]').val('');

            // Prevent the default button behavior
            return false;
        });

    });
</script>






              </div>
            </div>
          </div>
        </div>
                       <div class="box-body">
          <table id="product-table" class="table table-hover" style="width:100%; min-width: 985px;">
            <thead>
              <tr>
                <th data-width="10px">ID</th>
                <th data-orderable="false" data-width="75px">Hình Ảnh</th>
                <th data-orderable="false" data-width="85px">Mã Sản Phẩm</th>
                <th data-orderable="false">Tên Sản Phẩm</th>
                {{-- <th data-width="90px">Hãng Sản Xuất</th> --}}
                <th data-width="85px">G</th>
                <th data-width="60px">Đánh Giá</th>
                <th data-width="60px" data-type="date-euro">Ngày Tạo</th>
                <th data-width="66px">Trạng Thái</th>
                <th data-orderable="false" data-width="70px">Tác Vụ</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              {{-- debug xem giá trị trả về  --}}
                {{-- {{ dd($product) }} --}}

               <tr>
    <td class="text-center">
        {{ $product->id ?? '' }}
    </td>
    <td>
        @if ($product->image)
            <div style="background-image: url('{{ Helper::get_image_product_url($product->image) }}'); padding-top: 100%; background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
        @endif
    </td>
    <td>
        #<a class="text-left" href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->slug }}">{{ $product->sku_code ?? '' }}</a>
    </td>
    <td>
        @if ($product->name)
            <a class="text-left" href="{{ route('product_page', ['id' => $product->slug]) }}" title="{{ $product->name }}">{{ $product->name }}</a>
        @endif
    </td>
    {{-- <td>{{ $product->producer->name ?? '' }}</td> --}}
<td>{{ $product->product_details[0]->sale_price ? number_format($product->product_details[0]->sale_price, 0, ',', '.') . 'đ' : '' }}</td>
    {{-- <td>{{ $product->OS ?? '' }}</td> --}}
    <td>{{ $product->rate ? $product->rate . '/5 Điểm' : '' }}</td>
    <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') : '' }}</td>
  <td>
        @if ($product->product_details[0]->quantity > 0)

            <span class="label-success status-label">Còn Hàng</span>
        @else
            <?php dd ($product->product_details[0]->quantity) ?>
            <span class="label-danger status-label">Hết Hàng</span>
        @endif
    </td>
    <td>
        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-icon btn-sm btn-primary tip" title="Chỉnh Sửa">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
        <a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn btn-icon btn-sm btn-danger deleteDialog tip" title="Xóa" data-url="{{ route('admin.product.delete') }}">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection

@section('embed-js')
  <!-- DataTables -->
  <script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/date-euro.js"></script>
@endsection

@section('custom-js')
<script>


  $(document).ready(function () {
  // Xử lý sự kiện click cho nút Add Flash Sale
  $('#addFlashSaleBtn').mousedown(function () {
    $('#flashSaleModal').modal('show');
  });

  // Xử lý sự kiện submit form (nếu có)
  $('#flashSaleForm').submit(function (e) {
    // Ngăn chặn sự kiện mặc định của form (tránh refresh trang)
    // e.preventDefault();

    // Xử lý logic khi submit form flash sale
    // Thêm mã xử lý tại đây
    // Ví dụ: Gửi dữ liệu form qua AJAX và xử lý kết quả
  });

  var table = $('#product-table').DataTable({
    "language": {
      "zeroRecords": "Không tìm thấy kết quả phù hợp",
      "info": "Hiển thị trang <b>_PAGE_/_PAGES_</b> của <b>_TOTAL_</b> sản phẩm",
      "infoEmpty": "Hiển thị trang <b>1/1</b> của <b>0</b> sản phẩm",
      "infoFiltered": "(Tìm kiếm từ <b>_MAX_</b> sản phẩm)",
      "emptyTable": "Không có dữ liệu sản phẩm",
    },
    "lengthChange": false,
    "autoWidth": false,
    "order": [],
    "dom": '<"table-responsive"t><<"row"<"col-md-6 col-sm-6"i><"col-md-6 col-sm-6"p>>>',
    "drawCallback": function (settings) {
      attachDeleteEvent(); // Gắn sự kiện xóa sau mỗi lần vẽ lại bảng
    }
  });

  // Gắn sự kiện xóa ban đầu
  attachDeleteEvent();

  $('#search-input input').on('keyup', function () {
    table.search(this.value).draw();
  });
});

// Hàm gắn sự kiện xóa
function attachDeleteEvent() {
  $(".deleteDialog").off('click'); // Hủy bỏ sự kiện xóa cũ để tránh gắn nhiều sự kiện trùng lặp

  $(".deleteDialog").click(function () {
    var product_id = $(this).attr('data-id');
    var url = $(this).attr('data-url');

    Swal.fire({
      type: 'question',
      title: 'Thông báo',
      text: 'Bạn có chắc muốn xóa sản phẩm này?',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        return fetch(url, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          body: JSON.stringify({ 'product_id': product_id }),
        })
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText);
            }
            return response.json();
          })
          .catch(error => {
            Swal.showValidationMessage(error);

            Swal.update({
              type: 'error',
              title: 'Lỗi!',
              text: '',
              showConfirmButton: false,
              cancelButtonText: 'Ok',
            });
          })
      },
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          type: result.value.type,
          title: result.value.title,
          text: result.value.content,
        }).then((result) => {
          if (result.value)
            location.reload(true);
        });
      }
    });
  });
}

</script>
@endsection
