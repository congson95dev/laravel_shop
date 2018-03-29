@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Nguyên Liệu Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Nguyên Liệu Sản Phẩm</li>
      </ol>
    </section>
    <a href="{{ url('add_product_material') }}">
      <input type="button"  class="btn btn-block btn-primary" style="width: 200px; margin-left: 20px; margin-top: 20px;" value="Thêm Nguyên Liệu Sản Phẩm">
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
                  <th>Mã Nguyên Liệu Sản Phẩm</th>
                  <th>Tên Nguyên Liệu Sản Phẩm</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
              <?php
                // dd($arr_category);
                foreach($arr_material as $rows){
              ?>
                  <tbody>
                  <tr>
                    <td>{{ $rows->mate_id }}</td>
                    <td>{{ $rows->material_name }}</td>
                    <td>
                      <a href="{{ url('update_product_material/'.$rows->mate_id) }}" class="fa fa-edit"></a>
                      <a href="{{ url('delete_product_material/'.$rows->mate_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa Nguyên Liệu Sản Phẩm này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
                 {{ $arr_material->links() }}
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