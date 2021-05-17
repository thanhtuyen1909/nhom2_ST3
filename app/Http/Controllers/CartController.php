<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    public function AddCart(Request $req, $id)
    {
        $product = Product::where('id', '=', $id)->take(1)->get();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product[0], $id);
            $req->session()->put('Cart', $newCart);
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
        } else {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if (Count($newCart->product) > 0) {
                $req->session()->put('Cart', $newCart);
            } else {
                $req->session()->forget('Cart');
            }
        }

        return view('.pages/listCart');
    }
}
