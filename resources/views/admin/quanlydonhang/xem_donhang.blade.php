@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    <br>
    <div class="table-responsive">
     <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
       
       <tr>
           
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_phone}}</td>
            <td>{{$shipping->shipping_email}}</td>
            <td>{{$shipping->shipping_note}}</td>
            
          
            
          
          </tr> 
        
       
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
 
    <div class="table-responsive">
      <br>
     <table class="table table-striped b-t b-light">
        <thead>

          <tr>
            <th>STT</th>
            <th>Tên sản phẩm </th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Thành tiền</th>
         <!--    <th>Hình thức thanh toán</th> -->
          
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 0;
          ?>
        @foreach($order_details as $key => $chitiet)
         <?php 
            $i++;
            ?>
          <tr>
            <td><i>{{$i}}</i></td>
            <td>{{$chitiet->product_name}}</td>
            <td>{{$chitiet->product_sales_quantity}}</td>
            <td>{{number_format($chitiet->product_price).' '. 'VNĐ'}}</td>
            <td>{{ number_format($chitiet->product_price * $chitiet->product_sales_quantity).' '. 'VNĐ' }}</td>

           <!--  <td>@if($chitiet->payment_method=='ATM') Chuyển khoản @else ShipCOD @endif</td> -->
          </tr>

        @endforeach

        <tr>
          <td colspan="6">
              Mã giảm giá:  @if($chitiet->product_coupon!='Không')
                  {{$chitiet->product_coupon}}
                @else 
                  Không mã giảm giá
                @endif
     
            </td>
         
        </tr>

        <tr>
          <td colspan="6">
         
              Hình thức thanh toán:  @if($chitiet->payment_method=='ATM') Chuyển khoản (ATM) @else Thanh toán khi giao hàng (COD) @endif
     
            </td>
         
        </tr>
            
        <tr>
          <td colspan="6">
          @php
            echo 'Tổng đơn hàng: '.number_format($chitiet->order_details_total).' '. 'VNĐ'.'<br>';
          @endphp
          
          @php 
            $total_coupon = 0;
          @endphp

          @if($coupon_condition=='Giảm theo phần trăm')
          @php
            $total_after_coupon = ($chitiet->order_details_total * $coupon_number)/100;
          echo 'Chiết khấu: '.number_format($coupon_number).' '. '%'.'<br>';
          echo 'Tổng giảm: '.number_format($total_after_coupon).' '. 'VNĐ'.'<br>';
            $total_coupon = ($chitiet->order_details_total - $total_after_coupon);
          @endphp

          @elseif($coupon_condition=='Không')
          @php
            echo 'Chiết khấu: '.'Không'.'<br>';
            echo 'Tổng giảm: '.'Không'.'<br>';
          $total_coupon = ($chitiet->order_details_total - $coupon_number);
          @endphp

          @else
          @php
            echo 'Chiết khấu: '.number_format($coupon_number).' '. 'VNĐ'.'<br>';
            echo 'Tổng giảm: '.number_format($coupon_number).' '. 'VNĐ'.'<br>';
            $total_coupon = ($chitiet->order_details_total - $coupon_number);
          @endphp
          @endif


          Tổng thanh toán: {{number_format($total_coupon).' '. 'VNĐ'}}
          </td> 
          </tr>

         
           
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection