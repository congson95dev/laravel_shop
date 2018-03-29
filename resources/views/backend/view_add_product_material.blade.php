 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="margin-left: 100px;">
        Thêm Nguyên Liệu Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Thêm Nguyên Liệu Sản Phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-left: 100px;">
      <div class="row">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="box box-primary">
           <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('add_product_material') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Tên Nguyên Liệu Sản Phẩm</label>
                  <input type="text" class="form-control" placeholder="Nhập tên Nguyên Liệu Sản Phẩm" name="material_name">
                </div>
                
              </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
              </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection