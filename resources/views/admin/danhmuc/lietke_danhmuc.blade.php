@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
  <!--   <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
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
    </div> -->
    <br>
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
            <th style="width: 20px;">
              STT
            </th>
            <th>Tên danh mục</th>
            <th>Đường dẫn</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0; 
          ?>
          @foreach($lietke_danhmuc as $key => $danhmuc)
          <?php
            $i++;
          ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $danhmuc->category_name }}</td>
            <td>{{ $danhmuc->category_slug }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($danhmuc->category_status=='Hiển thị')
               {
                ?>
                <!-- kích hoạt hoặc không kích hoạt nó sẽ dựa vào cái id của danh mục đó -->
                <a href="{{URL::to('/unactive-danhmuc/'.$danhmuc->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }
                 else
                 {
                ?>  
                 <a href="{{URL::to('/active-danhmuc/'.$danhmuc->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-danhmuc/'.$danhmuc->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <br>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-danhmuc/'.$danhmuc->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <span  > </span>
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