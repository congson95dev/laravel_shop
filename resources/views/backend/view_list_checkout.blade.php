@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Hóa Đơn
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Hóa Đơn</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Mã Hóa Đơn</th>
                  <th>Tên Khách Mua Hàng</th>
                  <th>Email</th>
                  <th>Nơi Đặt Hàng</th>
                  <th>Điện Thoại</th>
                  <th>Số Lượng</th>
                  <th>Tổng Giá</th>
                  <th>Thời gian</th>
                  <th style="width: 170px;">Trạng Thái</th>
                  <th style="width: 90px;">Tùy Chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr_checkout as $rows){
                  // dd($rows->guest_firstname);
              ?>
    
                  <tbody>
                  <tr>
                    <td>{{ $rows->checkout_id }}</td>
                    <td>{{ $rows->guest_firstname.' '.$rows->guest_lastname }}</td>
                    <td>{{ $rows->guest_email }}</td>
                    <td>{{ $rows->checkout_place }}</td>
                    <td>{{ $rows->checkout_mobile_number }}</td>
                    @php 
                      $count_arr = DB::table('shop_checkout_detail')->where('checkout_fk_id',$rows->checkout_id)->get();
                      // dd($count_arr);
                      $count = 0;
                      foreach($count_arr as $count_rows)
                      {
                        $count += $count_rows->product_number;
                      }
                    @endphp
                    <td width="70px">{{ $count }}</td>
                    <td>{{ number_format($rows->checkout_totalprice) }} VNĐ</td>
                    <td>{{ $rows->checkout_time }}</td>
                    <td>
                      <select class="form-control" data-id="{{ $rows->checkout_id }}" name="checkout_status" {{-- onchange="return confirm('Bạn chắc chắn muốn thay đổi trạng thái?')" --}} id="checkout_status" href="javascript:void(0)">
                        <option {{ ($rows->checkout_status==0)?'selected':'' }} value="Chưa Thanh Toán">Chưa Thanh Toán</option>
                        <option  {{ ($rows->checkout_status==1)?'selected':'' }} value="Đã Thanh Toán">Đã Thanh Toán</option>
                      </select>
                    </td>
                    <td>
                      <a href="{{ url('list_checkout_detail/'.$rows->checkout_id) }}" class="fa fa-eye"></a>
                      <a href="{{ url('delete_checkout/'.$rows->checkout_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa Hóa Đơn này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
              {{ $arr_checkout->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

     
    
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

{{-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  // nếu để đoạn script này sẽ không chạy được script bên dưới
</script> --}}
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#checkout_status').change(function(e){
       checkout_status = $(this).val();
       checkout_status= (checkout_status=='Đã Thanh Toán')?'1':'0';
       console.log(checkout_status);
       checkout_id = $(this).attr('data-id');
       $.ajax({
          url:'{{ url("checkout_status_change") }}',
          method:'GET',
          cache: false,
          data:{
            checkout_status,
            checkout_id
          }
       });
    });
  });
</script>
@endsection