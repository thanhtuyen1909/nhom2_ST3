<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cart_model;
use App\CartInfo;
use App\Contact;
use App\ChiTietDonHang;
use App\Comment;
use App\DonHang;
use App\DonHangInfo;
use App\Favourite;
use App\FavouriteInfo;
use Illuminate\Support\Facades\DB; 
use App\Protype;
use App\Product;
use App\ProductsPhotos;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function autoSale()
    {
        $product = Product::all();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($product as $item) {
            $time = Carbon::parse($item->created_at);

            if ($now->year == $time->year) {
                if ($now->dayOfYear - $time->dayOfYear + 1 == 4) {
                    $item->sale = 20;
                } else if ($now->dayOfYear - $time->dayOfYear + 1 == 5) {
                    $item->sale = 40;
                } else if ($now->dayOfYear - $time->dayOfYear + 1 == 6) {
                    $item->sale = 60;
                } else if ($now->dayOfYear - $time->dayOfYear + 1 == 7) {
                    $item->sale = 80;
                } else if ($now->dayOfYear - $time->dayOfYear + 1 < 4) {
                    $item->sale = 0;
                } else {
                    $item->amount = 15;
                    $item->created_at = $now->toDateTimeString();
                }
            } else if ($now->year > $time->year) {
                if ($now->dayOfYear + 365 - $time->dayOfYear + 1 == 4) {
                    $item->sale = 20;
                } else if ($now->dayOfYear + 365 - $time->dayOfYear + 1 == 5) {
                    $item->sale = 40;
                } else if ($now->dayOfYear + 365 - $time->dayOfYear + 1 == 6) {
                    $item->sale = 60;
                } else if ($now->dayOfYear + 365 - $time->dayOfYear + 1 == 7) {
                    $item->sale = 80;
                } else if ($now->dayOfYear + 365 - $time->dayOfYear + 1 < 4) {
                    $item->sale = 0;
                } else {
                    $item->amount = 15;
                    $item->created_at = $now->toDateTimeString();
                }
            }
            $item->save();
        }
    }
    public function getData()
    {
        $this->autoSale();
        $saleProduct = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->where('products_photos.photo_feature', '=', 1)
            ->get();
        $product = DB::table('products')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where('products_photos.photo_feature', 1)
            ->get();
        $protype = DB::table('protypes')->get();
        $productLastList1 = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->orderby('products.id', 'desc')
            ->limit(3)
            ->get();
        $productLastList2 = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->orderby('products.id', 'desc')
            ->skip(3)->take(3)->get();

        $product1 = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where('products_photos.photo_feature', '=', 1)->get();

        $data = [];
        $data['product'] = $product;

        $data['product1'] = $product1;

        $data['protype'] = $protype;

        $data['proLast1'] = $productLastList1;
        $data['proLast2'] = $productLastList2;
        $data['saleProduct'] = $saleProduct;

        return $data;
    }
    public function index(Request $req)
    {
        $data = $this->getData();

        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        if (count($favourite)) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();
            $check = [];
            $favouriteProduct = [];
            foreach ($favouriteInfo as $info) {
                $temp_product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')->where('id', '=', $info->idProduct)->take(1)->get();
                $id = $info['idProduct'];
                array_push($favouriteProduct, $temp_product[0]);
                $check[$id] = $info['idProduct'];
            }
            $data['favourite'] = $favouriteProduct;
            $data['check'] = $check;
        }

        return view('pages.home', ['data' => $data]);
    }
}
