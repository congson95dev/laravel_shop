@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Admin</li>
      </ol>
    </section>
    <a href="{{ url('add_admin') }}">
      <input type="button"  class="btn btn-block btn-primary" style="width: 150px; margin-left: 20px; margin-top: 20px;" value="Thêm Người Dùng">
    </a>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>Họ tên</th>
                  <th>E-mail</th>
                  <th>Ảnh đại diện</th>
                  <th>Giới tính</th>
                  <th>Địa chỉ</th>
                  <th>Số Điện Thoại</th>
                  <th>Chức Vụ</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr as $rows){
              ?>
                  <tbody>
                  <tr>
                    
                    <td>{{ $rows->fullname }}</td>
                    <td>{{ $rows->email }}</td>
                    <td><img src="{{ asset('backend/dist/img/admin_img/'.$rows->image) }}"></td>
                    <td>{{ $rows->sex }}</td>
                    <td>{{ $rows->address }}</td>
                    <td>{{ $rows->mobile_number }}</td>
                    <td>{{ isset($rows->permission)&&$rows->permission=='1'?'Quản Trị Viên':'Cộng Tác Viên' }}</td>
                    <td>
                      <a href="{{ url('admin_profile/'.$rows->pk_user_id) }}" class="fa fa-edit"></a>
                      <a href="{{ url('delete_admin/'.$rows->pk_user_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa admin này chứ T_T ?')"></a>
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