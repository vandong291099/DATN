@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                     
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
   
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              STT
            </th>
            <th>Tên sản phẩm</th>
            <th>Đường dẫn</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>

            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($lietke_sanpham as $key => $product)
          <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_slug }}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->brand_name }}</td>
            <td><img src="public/uploads/product/{{ $product->product_image }}" height="100" width="100"></td>
            <td>{{ number_format($product->product_price) }}</td>
            <td>{{ $product->product_hightlight }}</td>

            <td><span class="text-ellipsis">
              <?php
               if($product->product_status=='Hiển thị')
               {
                ?>
                <a href="{{URL::to('/unactive-product/'.$product->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$product->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-sanpham/'.$product->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-sanpham/'.$product->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br>
    <span> {{$lietke_sanpham->links()}}</span>
    <!-- <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer> -->
  </div>
</div>
@endsection