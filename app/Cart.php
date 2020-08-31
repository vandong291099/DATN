<?php
namespace App;

class Cart
{
	public $products = null;
	public $totalPrice = 0;
	public $totalQuanty = 0;

	public function __construct($cart)  // hàm dựng
	{
		if($cart) //n
		{
			$this->products = $cart->products;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuanty = $cart->totalQuanty;

		}
	}

	public function them_gio_hang($product, $id)
	{
		$newProduct	= ['quanty' => 0 , 'product_price' => $product->product_price, 'productInfo' => $product]; // tạo mới ra
		if($this->products)
		{
			if(array_key_exists($id, $this->products)) // nếu đã có id sản phẩm đó trong giỏ hang rồi thì cập nhật số lượng
			{
				$newProduct = $this->products[$id]; // có rồi thì đặt lại sản phẩm ứng với id đó
			}
			
		}

		$newProduct['quanty']++;
		$newProduct['product_price'] = $newProduct['quanty'] * $product->product_price;
		$this->products[$id] = $newProduct;
		$this->totalPrice += $product->product_price;
		$this->totalQuanty ++;
	}

	public function DeleteItemCart($id)
	{
		$this->totalQuanty -= $this->products[$id]['quanty'];
		$this->totalPrice -= $this->products[$id]['product_price'];
		unset($this->products[$id]);
	}

	public function UpdateItemCart($id, $quanty)
	{	
		// $this->validate($request[
		// 	'qtybutton' => 'required|min:3|max:10'
           
  //       ],[
  //       	'qtybutton.required' => 'Cập nhật thất bại',
  //           'qtybutton.min' => 'Số lượng tối thiểu nhỏ nhất là 0',
  //           'qtybutton.max' => 'Số lượng phải tối đa 10 kí tự'

  //       ]);

		$this->totalQuanty -= $this->products[$id]['quanty'];
		$this->totalPrice -= $this->products[$id]['product_price']; // trừ ra số lượng và tổng tiền sp hiện tại

		
		
			$this->products[$id]['quanty'] = $quanty;
		
		// elseif($quanty <= 0)
		// {
		// 	$this->products[$id]['quanty'] = $quanty * (-1);
		// }
		
		if($quanty >= 1)
		{
			$this->products[$id]['product_price'] = $quanty * $this->products[$id]['productInfo']->product_price; // cập nhật số lượng và tổng tiền mới
		
		
			$this->totalQuanty += $this->products[$id]['quanty'];
			$this->totalPrice += $this->products[$id]['product_price'];
		
		}

		elseif($quanty <=0)
		{
			$this->products[$id]['quanty'] = $quanty * (-1);
			$this->products[$id]['product_price'] = $quanty * $this->products[$id]['productInfo']->product_price * (-1); 
			$this->totalQuanty += $this->products[$id]['quanty'];
			$this->totalPrice += $this->products[$id]['product_price'];
		}

			
		
		// cộng thêm tiền và số lượng mới

	}
}
?>
