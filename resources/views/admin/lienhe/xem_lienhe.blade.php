@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thông tin liên hệ
    </div>
   <!--  <div class="row w3-res-tb">
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
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>

            <th>Tác vụ</th>

            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($lay_lienhe as $key => $lienhe)
          <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $lienhe->contact_name }}</td>
            <td>{{ $lienhe->contact_phone }}</td>
            <td>{{ $lienhe->contact_email }}</td>
            <td>{{ $lienhe->contact_content }}</td>
            <td>{{ $lienhe->created_at }}</td>
            <td>
              <a onclick="return confirm('Bạn có chắc là muốn xóa liên hệ này không?')" href="{{URL::to('/delete-lienhe/'.$lienhe->contact_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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