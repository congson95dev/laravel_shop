 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @foreach($arr as $rows)
    
    
    <section class="content-header">
      <h1 style="margin-left: 100px;">
        Chỉnh sửa thông tin khách hàng : <b><i>{{ $rows->guest_firstname.' '.$rows->guest_lastname }}</i></b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Chỉnh sửa thông tin khách hàng</li>
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
            <form role="form" method="post" action="{{ url('update_guest/'.$rows->guest_pk_id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Title</label>
                  <select class="form-control" name="guest_title">
                      <option value="Mr." {{ $rows->guest_title == 'Mr.'?'selected':'' }} >Mr.</option>
                      <option value="Mrs" {{ $rows->guest_title == 'Mrs'?'selected':'' }} >Mrs</option>
                      <option value="Miss" {{ $rows->guest_title == 'Miss'?'selected':'' }} >Miss</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Họ</label>
                  <input type="text" class="form-control" placeholder="Nhập họ tên" name="guest_firstname"
                         value="{{ isset($rows->guest_firstname)?$rows->guest_firstname:"" }}">
                </div>
                <div class="form-group">
                  <label>Tên</label>
                  <input type="text" class="form-control" placeholder="Nhập họ tên" name="guest_lastname"
                         value="{{ isset($rows->guest_lastname)?$rows->guest_lastname:"" }}">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="Nhập email" name="guest_email"
                         value="{{ isset($rows->guest_email)?$rows->guest_email:"" }}">
                </div>
                <label class="control-label">Ngày sinh</label>
                <div class="controls">
                   <select class="span1" name="days" >
                    {{-- <option>-</option> --}}
                      <?php 
                        $day = substr(date_format(date_create($rows->guest_birth),'d-m-Y'),0,2);
                        for($d=1;$d<=31;$d++)
                          {
                        ?>
                            <option value="{{ $d }}" {{ $d==$day?'selected':'' }}> {{ $d }} &nbsp;&nbsp;</option>;
                        <?php } ?> 
                      
                  </select>
                  <select class="span1" name="months">
                    {{-- <option>-</option> --}}
                      <?php 
                        $month = substr(date_format(date_create($rows->guest_birth),'d-m-Y'),3,2);
                        for($m=1;$m<=12;$m++)
                          {
                      ?>
                            <option value="{{ $m }}" {{ $m==$month?'selected':'' }}> {{ $m }} &nbsp;&nbsp;</option>;
                      <?php } ?> 
                  </select>
                  <select class="span1" name="years">
                    {{-- <option>-</option> --}}
                      <?php 
                        $year = substr(date_format(date_create($rows->guest_birth),'d-m-Y'),6,4);
                        for($y=1800;$y<=2017;$y++)
                          {
                      ?>
                            <option value="{{ $y }}" {{ $y==$year?'selected':'' }}> {{ $y }} &nbsp;&nbsp;</option>;
                      <?php } ?> 
                  </select>
                </div>
                 <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Password" name="guest_password" disabled="disabled"
                          value="{{ isset($rows->guest_password)?$rows->guest_password:"" }}">
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
    @endforeach
    <!-- /.content -->
  </div>

@endsection