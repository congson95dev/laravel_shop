 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="margin-left: 100px;">
        Thêm Admin 
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Thêm admin</li>
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
            <form role="form" method="post" action="{{ url('add_admin') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Tên Tài Khoản</label>
                  <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="username">
                </div>
                 <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="Nhập email" name="email">
                </div>
                <div class="form-group">
                  <label>Họ và Tên</label>
                  <input type="text" class="form-control" placeholder="Nhập họ tên" name="fullname">
                </div>
               <label>Giới tính</label>
                  <select class="form-control" name="sex">
                    <option>Nam</option>
                    <option>Nữ</option>
                  </select>
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" placeholder="Nhập Địa Chỉ" name="address">
                </div>
                <div class="form-group">
                  <label>Số Điện Thoại</label>
                  <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="mobile_number">
                </div>
                <div class="form-group">
                  <label>Ảnh đại diện</label>
                  <input type="file" name="image" id="exampleInputFile">
                </div>
                <div class="form-group">
                <label>Chức Vụ</label>
                <select class="form-control" name="permission" >
                    <option value="Là Quản Trị Viên">Là Quản Trị Viên</option>
                    <option value="Là Cộng Tác Viên">Là Cộng Tác Viên</option>
                </select>  
                </div>
             
               <!--    <label>Select</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select> -->
                
               
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