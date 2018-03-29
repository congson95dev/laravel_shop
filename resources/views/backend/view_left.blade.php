<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <?php
              if(Session::has('admin_id'))
              {
                $admin_id=Session::get('admin_id');
                $admin_name=DB::select("select fullname,image from users where pk_user_id='$admin_id'");
                //dd($admin_name);
                foreach ($admin_name as $name) {
              }
            ?> 
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/admin_img/'.$name->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           
          <p>{{ $name->fullname }}</p>
         
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
         <?php } ?>
      </div>
      @php
            $id = Session::get('admin_id');
            $arr_permission = DB::table('users')->where('pk_user_id',$id)->select('permission')->first();
      @endphp
      <!-- search form -->
      <form action="{{ url('search') }}" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search_text" class="form-control" placeholder="Tìm Kiếm">
          <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
          </span>
        </div>
        <select class="form-control" name="search_choose" style="margin-top: 10px; height: 30px;">
            <option></option>
            @if($arr_permission->permission=='1')
            <option value="Đơn Hàng">Đơn Hàng</option>
            <option value="Nhân Sự">Nhân Sự</option>
            @endif
            <option value="Danh Mục">Danh Mục</option>
            <option value="Hãng">Hãng</option>
            <option value="Sản Phẩm">Sản Phẩm</option>
            <option value="Nguyên Liệu">Nguyên Liệu</option>
            <option value="Màu Sắc">Màu Sắc</option>
        </select>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Admin</li>
        <li class="{{ Request::segment(1) == 'admin' ? 'active' : '' }}">
          <a href="{{ url('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
          </a>
        </li>
        @if($arr_permission->permission == '1')
        <li class="{{ Request::segment(1) == 'list_checkout' ? 'active' : '' }}">
          <a href="{{ url('list_checkout') }}">
            <i class="fa fa-fighter-jet"></i> <span>Đơn Hàng</span>
          </a>
        </li>
        @endif
        {{-- @if(Request::segment(1) == 'list_products') --}}
         
        {{-- @endif --}}
         <li class="treeview {{ Request::segment(1) == 'list_products' || Request::segment(1) == 'list_product_material' || Request::segment(1) == 'list_product_color' ? 'menu-open active' : '' }}">
          <a href="{{ url('list_products') }}">
            <i class="fa fa-pie-chart"></i>
            <span>Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ Request::segment(1) == 'list_products' || Request::segment(1) == 'list_product_material' || Request::segment(1) == 'list_product_color' ? 'display: block;' : '' }}">
            <li class="{{ Request::segment(1) == 'list_products' ? 'active' : '' }}">
              <a href="{{ url('list_products') }}"><i class="fa fa-briefcase"></i>Sản Phẩm</a></li>
            <li class="{{ Request::segment(1) == 'list_product_material' ? 'active' : '' }}">
              <a href="{{ url('list_product_material') }}"><i class="fa fa-book"></i>Nguyên Liệu</a></li>
            <li class="{{ Request::segment(1) == 'list_product_color' ? 'active' : '' }}">
              <a href="{{ url('list_product_color') }}"><i class="fa fa-chrome"></i>Màu Sắc</a></li>
          </ul>
        </li>
        @if($arr_permission->permission == '1')
        <li class="{{ Request::segment(1) == 'list_user' ? 'active' : '' }}">
          <a href="{{ url('list_user') }}">
            <i class="fa fa-user"></i> <span>Quản Trị Viên</span>
          </a>
        </li>
        @endif
        @if($arr_permission->permission == '1')
         <li class="{{ Request::segment(1) == 'list_guest' ? 'active' : '' }}">
          <a href="{{ url('list_guest') }}">
            <i class="fa fa-group"></i> <span>Khách Hàng</span>
          </a>
        </li>
        @endif
        <li class="{{ Request::segment(1) == 'list_category' ? 'active' : '' }}">
          <a href="{{ url('list_category') }}">
            <i class="fa fa-folder-o"></i> <span>Danh Mục</span>
          </a>
        </li>
       <li class="{{ Request::segment(1) == 'list_brand' ? 'active' : '' }}">
          <a href="{{ url('list_brand') }}">
            <i class="fa fa-linux"></i> <span>Hãng</span>
          </a>
        </li>
       
         {{-- <li>
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
          </a>
        </li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>