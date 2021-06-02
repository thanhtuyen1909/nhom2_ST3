<?php

namespace App;
class Cart{
    public $product = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    
    public function __construct($cart)
    {
        if($cart){
            $this->product = $cart->product;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }
    
    public function AddCart($product,$id,$quantity){
        $newProduct = ['quantity'=>0,'price'=>$product->price   ,'productInfo' => $product];
        if($this->product){
            if(array_key_exists($id,$this->product))
            {
                $newProduct = $this->product[$id];
            }
        }
        $newProduct['quantity'] +=$quantity;
        $newProduct['price'] += $newProduct['quantity'] * $product->price;
        $this->product[$id] = $newProduct;
        $this->totalPrice += $product->price *$quantity;
        $this->totalQuantity+=$quantity;
    }
    public function DeleteItemCart($id){
        $this->totalQuantity -= $this->product[$id]['quantity'];
        $this->totalPrice -= $this->product[$id]['price'];
        unset($this->product[$id]);
    }
    public function UpdateCart($id,$quantity)
    {
        $this->totalQuantity -= $this->product[$id]['quantity'];
        $this->totalPrice -= $this->product[$id]['price'];
        $this->product[$id]['quantity'] = $quantity;
        $this->product[$id]['price'] = $quantity * $this->product[$id]['productInfo']->price;
        $this->totalQuantity += $quantity;
        $this->totalPrice +=  $this->product[$id]['price'];
     
    }
}
?>