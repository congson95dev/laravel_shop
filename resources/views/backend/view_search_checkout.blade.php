@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tìm Kiếm Hóa Đơn
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Tìm Kiếm Hóa Đơn</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              @if($count!='0')
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
                  <th>Trạng Thái</th>
                  <th>Tùy Chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr_search as $rows){
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
                    <td>
                      <select class="form-control" name="sex">
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
              {{ $arr_search->links() }}
              @else
              <div class="span12" style="text-align: center;color:gray;font-size: 25px;">
                Có 0 kết quả được tìm kiếm với từ khóa '{{ $search_text }}' , <a href="{{ url('admin') }}"><span style="font-size: 30px">click</span></a> để quay trở về trang chủ
              </div>
              @endif
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

<script>
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
</script>
  
@endsection