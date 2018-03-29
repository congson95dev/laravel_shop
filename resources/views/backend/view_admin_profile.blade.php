 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @foreach($arr as $rows)
    
    
    <section class="content-header">
      <h1 style="margin-left: 100px;">
        Thông tin admin : <b><i>{{ $rows->fullname }}</i></b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Thông tin admin</li>
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
            <form role="form" method="post" action="{{ url('update_admin/'.$rows->pk_user_id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Họ và Tên</label>
                  <input type="text" class="form-control" placeholder="Nhập họ tên" name="fullname"
                         value="{{ isset($rows->fullname)?$rows->fullname:"" }}">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="Nhập email" name="email" disabled="disabled"
                         value="{{ isset($rows->email)?$rows->email:"" }}">
                </div>
               <label>Giới tính</label>
                  <select class="form-control" name="sex">
                    <option {{ isset($rows->sex)&&$rows->sex=="Nam"?"selected='selected'":"" }}>Nam</option>
                    <option {{ isset($rows->sex)&&$rows->sex=="Nữ"?"selected='selected'":"" }}>Nữ</option>
                  </select>
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" placeholder="Nhập Địa Chỉ" name="address"
                         value="{{ isset($rows->address)?$rows->address:"" }}">
                </div>
                <div class="form-group">
                  <label>Số Điện Thoại</label>
                  <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="mobile_number"
                         value="{{ isset($rows->mobile_number)?$rows->mobile_number:"" }}">
                </div>
                <div class="form-group">
                  <label>Ảnh đại diện</label><br>
                  <img src="{{ asset('backend/dist/img/admin_img/'.$rows->image) }}">
                  <input type="file" name="image" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" disabled="disabled"
                          value="{{ isset($rows->password)?$rows->password:"" }}">
                </div>
                <label>Chức Vụ</label>
                <select class="form-control" name="permission" >
                    <option {{ isset($rows->permission)&&$rows->permission=='1'?'selected':'' }} value="Là Quản Trị Viên">Là Quản Trị Viên</option>
                    <option {{ isset($rows->permission)&&$rows->permission=='0'?'selected':'' }} value="Là Cộng Tác Viên">Là Cộng Tác Viên</option>
                </select>  
             
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
    @endforeach
    <!-- /.content -->
  </div>

@endsection