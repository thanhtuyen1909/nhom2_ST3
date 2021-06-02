<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Cart_model;
use App\CartInfo;
use Illuminate\Support\Facades\DB;
use App\User;
use PHPUnit\Framework\Constraint\Count;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    public function AddCart(Request $req, $id,$quantity)
    {
        
        $product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')->where('id', '=', $id)->take(1)->get();
        if ($product != null) {
         
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product[0], $id,$quantity);
            $req->session()->put('Cart', $newCart);
            $cart = Cart_model::where('idUser','=', $req->session()->get('Login'))->get();
            $cart = $cart[0];
    
            if ($cart != null) {
                
                $cart->totalQuantity = (int)$newCart->totalQuantity;
                $cart->totalPrice = $newCart->totalPrice;
                $cart->idUser = $req->session()->get('Login');
                $cart->save();
            } else {
                $cart = new Cart_model();
                $cart->totalQuantity = $newCart->totalQuantity;
                $cart->totalPrice = $newCart->totalPrice;
                $cart->idUser = $req->session()->get('Login');
                $cart->save();
            }
            $cartInfo = CartInfo::where('idCart', '=', $cart->idCart)->get();
          
            $check = false;
            foreach ($cartInfo as $info) {
                if ($info->idProduct == $id) {
                    $check = true;
                }
            }
            
            if ($check == true) {
                foreach ($cartInfo as $info) {
                    if ($info->idProduct == $id) {
                        $temp = CartInfo::find($info->id);
                        $temp->quantity+=$quantity;
                        $temp->save();
                        
                    }
                }
            }else{
                $temp = new CartInfo();
                $temp->idProduct = $id;
                $temp->idCart = $cart->idCart;
                $temp->quantity = $quantity;
                $temp->save();
            }
            foreach ($cartInfo as $info) {
                $info->save();
            }
        }
        return view('.pages/cartInfo');
    }
    public function DeleteItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($newCart->product) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        $cartInfo = CartInfo::where('idProduct','=',$id)->get();
        CartInfo::destroy($cartInfo[0]['id']);
        return view('.pages/cartInfo');
    }
    public function DeleteItemListCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($newCart->product) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        $cartInfo = CartInfo::where('idProduct','=',$id)->get();
        CartInfo::destroy($cartInfo[0]['id']);
        return view('.pages/listCart');
    }
    public function UpdateCart(Request $req, $id, $quantity)
    {
        if ($quantity > 0) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->UpdateCart($id, $quantity);
            if (Count($newCart->product) > 0) {
                $req->session()->put('Cart', $newCart);
            } else {
                $req->session()->forget('Cart');
            } 
            $cartInfo = CartInfo::where('idProduct','=',$id)->get();
            $cartInfo = CartInfo::find($cartInfo[0]['id']);
            $cartInfo->quantity = $quantity;
            $cartInfo->save();
        } else {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if (Count($newCart->product) > 0) {
                $req->session()->put('Cart', $newCart);
            } else {
                $req->session()->forget('Cart');
            }
            $cartInfo = CartInfo::where('idProduct','=',$id)->get();
            CartInfo::destroy($cartInfo[0]['id']);
        }

        return view('.pages/listCart');
    }
}
