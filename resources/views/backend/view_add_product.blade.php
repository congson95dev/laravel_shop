 @extends('backend.view_layout')
 @section('controller')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="margin-left: 100px;">
        Thêm Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Thêm Sản Phẩm</li>
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
            <form role="form" method="post" action="{{ url('add_product') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Tên Sản Phẩm</label>
                  <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="product_name">
                </div>
                 <label>Danh Mục</label>
                  <select class="form-control" name="category_name">
                    @if(isset($arr_cat))
                    @foreach($arr_cat as $rows_cat)
                        <option>{{ $rows_cat->category_name }}</option>
                    @endforeach
                    @else
                      <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                    @endif
                  </select>
               
                <div class="form-group">
                  <label>Miêu tả</label>
                  <textarea class="form-control" placeholder="Nhập miêu tả sản phẩm" name="product_description"></textarea>
                  <script>
                      CKEDITOR.replace('product_description');
                      // ^ để ko bị insert thẻ <p> vào db
                  </script>
                </div>
                <div class="form-group">
                  <label>Nội dung</label>
                  <textarea class="form-control" placeholder="Nhập nội dung sản phẩm" name="product_content"></textarea>
                  <script>
                      CKEDITOR.replace('product_content');
                  </script>
                </div>
                <div class="form-group">
                  <label>Ảnh đại diện</label>
                  <input type="file" name="product_image" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label>Giá</label>
                  <input type="number" class="form-control" placeholder="Nhập giá sản phẩm" name="product_price">
                </div>

                <script type="text/javascript">
                // var data = [{ id: 1, text: 'One' }, { id: 2, text: 'Two' }, { id: 3, text: 'Three' }];
                // data sử dụng thay option , id thay value của option
                  $(document).ready(function() {
                      $('.select2').select2({
                         // data: data,
                        allowClear:true,                    // để tạo dấu x cuối dòng select
                        placeholder: 'Chọn 1 màu'
                        // tags: true                          // để đánh text vào mà vẫn hiển thị 
                        // tokenSeparators: [',', ' ']
                        // dropdownCssClass : 'no-search'
                        // minimumResultsForSearch: -1
                      });
                  });
                </script>
              <label>Màu Sắc</label>
                <select class="select2" id="select2" array name="att_color[]" multiple="multiple" style="width: 100%">
                  <option value=""></option>
                  @foreach($arr_color as $rows_color)
                  <option value="{{ $rows_color->color_name }}">{{ $rows_color->color_name }}</option>
                  @endforeach
                </select>
                <br><br>

                <script type="text/javascript">
                // var data = [{ id: 1, text: 'One' }, { id: 2, text: 'Two' }, { id: 3, text: 'Three' }];
                // data sử dụng thay option , id thay value của option
                  $(document).ready(function() {
                      $('.material_select2').select2({
                         // data: data,
                        allowClear:true,                    // để tạo dấu x cuối dòng select
                        placeholder: 'Chọn 1 nguyên liệu'
                        // tags: true                          // để đánh text vào mà vẫn hiển thị 
                        // tokenSeparators: [',', ' ']
                        // dropdownCssClass : 'no-search'
                        // minimumResultsForSearch: -1
                      });
                  });
                </script>
              <label>Nguyên Liệu</label>
                <select class="material_select2" id="material_select2" array name="att_material[]" multiple="multiple" style="width: 100%">
                  <option value=""></option>
                  @foreach($arr_material as $rows_material)
                  <option value="{{ $rows_material->material_name }}">{{ $rows_material->material_name }}</option>
                  @endforeach
                </select>
                <br><br>

                <div class="form-group">
                  <label>Số Lượng</label>
                  <input type="number" class="form-control" placeholder="Nhập số lượng sản phẩm" name="product_stock" min="0">
                </div>
                <div class="form-group">
                  <label>Phong Cách</label>
                  <input type="text" class="form-control" placeholder="Nhập phong cách sản phẩm" name="product_style">
                </div>
                <div class="form-group">
                  <label>Mùa</label>
                  <input type="text" class="form-control" placeholder="Nhập mùa sản phẩm" name="product_season">
                </div>
                <div class="form-group">
                  <label>Kích Cỡ</label>
                  <input type="text" class="form-control" placeholder="Nhập kích cỡ sản phẩm" name="product_usage">
                </div>
                <div class="form-group">
                  <label>Thể Thao</label>
                  <input type="number" class="form-control" placeholder="Nhập mã thể thao" name="product_sport">
                </div>
                 <label>Hãng</label>
                 <select class="form-control" name="product_brand">
                    @foreach($arr_brand as $rows_brand)
                        <option>{{ $rows_brand->brand_name }}</option>
                    @endforeach
                  </select>
                   <div class="form-group">
                  <label>Là mặt hàng settop?</label>
                  <select class="form-control" name="product_top_huge">
                        <option>Không</option>
                        <option>Có</option>
                  </select>
                  <label>Là mặt hàng đặc sắc?</label>
                  <select class="form-control" name="product_featured">
                        <option>Không</option>
                        <option>Có</option>
                  </select>
                  <label>Là mặt hàng sắp ra mắt?</label>
                  <select class="form-control" name="product_comming">
                        <option>Không</option>
                        <option>Có</option>
                  </select>
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