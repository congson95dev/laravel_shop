@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Khách Hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Khách Hàng</li>
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
                  <th>Title</th>
                  <th>Họ tên</th>
                  <th>E-mail</th>
                  <th>Ngày Sinh</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr as $rows){
              ?>
                  <tbody>
                  <tr>
                    <td>{{ $rows->guest_title }}</td>
                    <td>{{ $rows->guest_firstname.' '.$rows->guest_lastname }}</td>
                    <td>{{ $rows->guest_email }}</td>
                    <td>{{ date_format(date_create($rows->guest_birth),'d-m-Y') }}</td>
                    {{-- Y là để hiện đủ 4 chữ số của năm --}}
                    <td>
                      <a href="{{ url('update_guest/'.$rows->guest_pk_id) }}" class="fa fa-edit"></a>
                      <a href="{{ url('delete_guest/'.$rows->guest_pk_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa khách hàng này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
                 {{ $arr->links() }}
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