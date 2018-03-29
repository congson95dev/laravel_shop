@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi Tiết Hóa Đơn
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Chi Tiết Hóa Đơn</li>
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
                  <th>Tên Sản Phẩm</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Nguyên Liệu</th>
                  <th>Màu Sắc</th>
                  <th>Số Lượng</th>
                  <th>Tổng Giá</th>
                  <th>Tùy Chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr_checkout_detail as $rows){
                  // dd($rows->guest_firstname);
              ?>
    
                  <tbody>
                  <tr>
                    <td>{{ $rows->product_name }}</td>
                    <td><img src="{{ asset('assets/img/product/'.$rows->product_img) }}" height="100" width="100"></td>
                    <td>{{ $rows->att_material }}</td>
                    <td>{{ $rows->att_color }}</td>
                    <td>{{ $rows->product_number }}</td>
                    <td>{{ number_format($rows->product_totalprice) }} VNĐ</td>
                 
                    <td>
                      <a href="{{ url('delete_checkout_detail/'.$rows->checkout_detail_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa Chi Tiết Hóa Đơn này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
              {{ $arr_checkout_detail->links() }}
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