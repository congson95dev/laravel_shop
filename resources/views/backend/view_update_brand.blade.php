 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="margin-left: 100px;">
        Chỉnh Sửa Hãng
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Chỉnh Sửa Hãng</li>
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
            <form role="form" method="post" action="{{ url('update_brand/'.$arr_brand->brand_id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Tên Hãng</label>
                  <input type="text" class="form-control" placeholder="Nhập tên hãng" name="brand_name" 
                  value="{{ isset($arr_brand->brand_name)?$arr_brand->brand_name:'' }}">
                </div>

                <div class="form-group">
                  <label>Ảnh Hãng</label>
                  <img src="{{ asset('assets/img/brand/'.$arr_brand->brand_img) }}" alt="">
                  <input type="file" name="brand_img" id="exampleInputFile">
                </div>

                <div class="form-group">
                  <label>Đường Dẫn Hãng</label>
                  <input type="text" class="form-control" placeholder="Nhập đường dẫn hãng" name="brand_link"  
                  value="{{ isset($arr_brand->brand_link)?$arr_brand->brand_link:'' }}">
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