@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tìm Kiếm Màu Sắc Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Tìm Kiếm Màu Sắc Sản Phẩm</li>
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
                  <th>Mã Màu Sắc Sản Phẩm</th>
                  <th>Tên Màu Sắc Sản Phẩm</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
              <?php
                // dd($arr_category);
                foreach($arr_search as $rows){
              ?>
                  <tbody>
                  <tr>
                    <td>{{ $rows->color_id }}</td>
                    <td>{{ $rows->color_name }}</td>
                    <td>
                      <a href="{{ url('update_product_color/'.$rows->color_id) }}" class="fa fa-edit"></a>
                      <a href="{{ url('delete_product_color/'.$rows->color_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa Màu Sắc Sản Phẩm này chứ T_T ?')"></a>
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