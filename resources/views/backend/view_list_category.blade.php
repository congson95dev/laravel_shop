@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Danh Mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Danh Mục</li>
      </ol>
    </section>
    <a href="{{ url('add_category') }}">
      <input type="button"  class="btn btn-block btn-primary" style="width: 150px; margin-left: 20px; margin-top: 20px;" value="Thêm Danh Mục">
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
                  <th>Mã Danh Mục</th>
                  <th>Tên Danh Mục</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
              <?php
                // dd($arr_category);
                foreach($arr_category as $rows){
              ?>
                  <tbody>
                  <tr>
                    <td><a href="{{ url('view_product_category/'.$rows->cate_id) }}">{{ $rows->cate_id }}</a></td>
                    <td><a href="{{ url('view_product_category/'.$rows->cate_id) }}">{{ $rows->category_name }}</a></td>
                    <td>
                      <a href="{{ url('view_product_category/'.$rows->cate_id) }}" class="fa fa-eye"></a>
                      <a href="{{ url('update_category/'.$rows->cate_id) }}" class="fa fa-edit" style="margin-left: 30px;"></a>
                      <a href="{{ url('delete_category/'.$rows->cate_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
                 {{ $arr_category->links() }}
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