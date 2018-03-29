 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="margin-left: 100px;">
        Thêm Danh Mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Thêm danh mục</li>
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
            <form role="form" method="post" action="{{ url('add_category') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Tên Danh Mục</label>
                  <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="category_name">
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