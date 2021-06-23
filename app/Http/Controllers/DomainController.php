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
use Illuminate\Http\Request;
use App\Protype;
use App\Product;
use App\ProductsPhotos;
use App\Status;
use App\User;
use Carbon\Carbon;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use SebastianBergmann\Environment\Console;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->forget('Cart');
        $request->session()->forget('Login');
        $request->session()->forget('Favourite');
        $request->session()->forget('url.intended');
        Auth::logout();

        return redirect('/home');
    }

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
                    $item->update_at = $now->toDateTimeString();
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

    public function getLogin()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    public function Check(Request $req)
    {
        if (Auth::check() == true) {
            if (Session('Login') == null) {
                $req->session()->put('Login', Auth::user()->id);
            }
            if (Session('Login') != null) {
                //Tao session favourite
                $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();

                if (count($favourite) > 0) {
                    $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();
                    $req->session()->put('Favourite', count($favouriteInfo));
                } else {
                    $favourite = new Favourite();
                    $favourite->idUser = $req->session()->get('Login');
                    $favourite->save();
                }
                //Tao session cart
                $cart = Cart_model::where('idUser', '=', $req->session()->get('Login'))->get();

                if (count($cart) > 0) {
                    $cartInfo = CartInfo::where('idCart', '=', $cart[0]->idCart)->get();

                    $product = [];
                    $totalQuantity = 0;
                    $totalPrice = 0;
                    foreach ($cartInfo as $info) {
                        $temp_product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')->where('products.id', '=', $info->idProduct)->take(1)->get()[0];

                        $subProduct = ['quantity' => $info->quantity, 'price' => $info->quantity * $temp_product->price * (100 - $temp_product->sale) / 100, 'productInfo' => $temp_product];
                        $totalQuantity += $subProduct['quantity'];
                        $totalPrice += $subProduct['price'];
                        $product[$info->idProduct] = $subProduct;
                    }
                    $oldCart = ['product' => $product, 'totalQuantity' => $totalQuantity, 'totalPrice' => $totalPrice];
                    $oldCart = (object)$oldCart;
                    $req->session()->put('Cart', $oldCart);
                } else {
                    $cart = new Cart_model();
                    $cart->totalQuantity = 0;
                    $cart->totalPrice = 0;
                    $cart->idUser = $req->session()->get('Login');
                    $cart->save();
                }
            }
        }
    }

    public function index(Request $request, $name)
    {
        $this->Check($request);
        $favourite = Favourite::where('idUser', '=', $request->session()->get('Login'))->get();
        $check = [];
        $favouriteProduct = [];
        if (count($favourite) > 0) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();

            foreach ($favouriteInfo as $info) {
                $temp_product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')->where('id', '=', $info->idProduct)->take(1)->get();
                $id = $info['idProduct'];
                array_push($favouriteProduct, $temp_product[0]);
                $check[$id] = $info['idProduct'];
            }
        }
        $data = $this->getData();
        $data['check'] = $check;
        $data['favourite'] = $favouriteProduct;

        if ($name == "favourite" || $name == "shoping-cart" || $name == "listOrder") {
            if ($request->session()->get('Login') != null) {
                return view('pages.' . $name, ['data' => $data]);
            } else return $this->getLogin();
        } else if ($name == "loadComment" || $name == "postComment") {
            return;
        } else {
            return view('pages.' . $name, ['data' => $data]);
        }
    }

    public function Favourite(Request $req, $id)
    {
        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        if (count($favourite) > 0) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]['id'])->get();
            $check = true;
            foreach ($favouriteInfo as $info) {
                if ($info->idProduct == $id) {
                    $check = false;
                }
            }
            if ($check == true) {
                $temp_info = new FavouriteInfo();
                $temp_info->idProduct = $id;
                $temp_info->idFavourite = $favourite[0]['id'];
                $temp_info->save();
            }
            return $check;
        }
    }

    public function DeleteFavourite(Request $req, $id)
    {
        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]['id'])->get();
        foreach ($favouriteInfo as $info) {
            if ($info->idProduct == $id) {
                FavouriteInfo::destroy($info['id']);
            }
        }
        $check = [];
        $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]['id'])->get();
        $favouriteProduct = [];
        foreach ($favouriteInfo as $info) {
            $temp_product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')->where('id', '=', $info->idProduct)->take(1)->get();

            array_push($favouriteProduct, $temp_product[0]);
            $check[$info->idProduct] = $info->idProduct;
        }
        $data = [];
        $data['favourite'] = $favouriteProduct;
        $data['check'] = $check;
        return view('.pages/listFavourite', ['data' => $data]);
    }

    // shop-grid
    public function showShopGrid(Request $req)
    {
        $data = $this->getData();

        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        if (count($favourite)) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();
            $check = [];
            $favouriteProduct = [];
            foreach ($favouriteInfo as $info) {
                $temp_product = DB::table('products')
                    ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
                    ->where([['id', '=', $info->idProduct], ['products_photos.photo_feature', 1]])->take(1)->get();
                $id = $info['idProduct'];
                array_push($favouriteProduct, $temp_product[0]);
                $check[$id] = $info['idProduct'];
            }
            $data['favourite'] = $favouriteProduct;
            $data['check'] = $check;
        }

        return view('.pages/shop-grid', ['data' => $data]);
    }

    // order-details
    public function showOrderDetail($idDH, Request $req)
    {
        $data = $this->getData();
        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        if (count($favourite) > 0) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();
            $check = [];
            $favouriteProduct = [];
            foreach ($favouriteInfo as $info) {
                $temp_product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')
                    ->where('id', '=', $info->idProduct)->take(1)->get();
                $id = $info['idProduct'];
                array_push($favouriteProduct, $temp_product[0]);
                $check[$id] = $info['idProduct'];
            }

            $data['favourite'] = $favouriteProduct;
            $data['check'] = $check;
        }

        $listOrderDetail = DB::table('chitietdonhang')->where('idDonHang', '=', $idDH)->get();
        $listOderDetailName = [];
        $photo_product = [];

        for ($i = 0; $i < count($listOrderDetail); $i++) {
            $listOderDetailName[$i] = ChiTietDonHang::find($listOrderDetail[$i]->id)->linkProduct->name;
            $photo_product[$i] = DB::table('products_photos')->where([
                ['product_id', '=', $listOrderDetail[$i]->idSP],
                ['photo_feature', '=', 1],
            ])->select('filename')->get();
        }

        $data = $this->getData();

        $trangThaiDH = Status::where('status_id', DonHang::find($idDH)->status)->get();

        $thongTinNH = DonHangInfo::where('idDonHang', $idDH)->get();

        return view('pages.order-details', compact('thongTinNH', 'listOrderDetail', 'listOderDetailName', 'photo_product', 'trangThaiDH'), ['data' => $data]);
    }

    /**
     * Show the list product and protype at pages.home
     */

    public function showProduct(Request $req)
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

    /**
     * Add cart
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createContact(Request $request)
    {
        $contact = new Contact();
        $contact->hoten = $request->contact_name;
        $contact->sdt = $request->contact_sdt;
        $contact->email = $request->contact_email;
        $contact->tieude = $request->contact_title;
        $contact->noidung = $request->contact_content;
        $contact->save();

        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDonHang(Request $request)
    {
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $request->validate([
            'hoTen' => 'required',
            'diaChi' => 'required',
            'soDT' => 'required',
        ]);
        // lưu đơn hàng
        $donHang = new DonHang();
        $donHangInfo = new DonHangInfo();

        $cart = $request->session()->get("Cart");

        $date = str_replace(':', '', str_replace(' ', '', str_replace('/', '', date("d/m/Y H:i:s"))));

        $donHang->id = "DH" . $date;
        $donHang->totalQuantity = $cart->totalQuantity;
        $donHang->totalPrice = $cart->totalPrice;
        $donHang->status = 1;
        $donHang->idUser = $request->session()->get('Login');
        $donHang->save();

        foreach ($cart->product as $item) {
            $chiTietDH = new ChiTietDonHang();
            $chiTietDH->idDonHang = "DH" . $date;
            $chiTietDH->idSP = $item['productInfo']->id;
            $chiTietDH->soluong = $item['quantity'];
            $chiTietDH->thanhtien = $item['price'];
            $chiTietDH->save();
            $product = Product::find($chiTietDH->idSP);
            $product->amount -= $chiTietDH->soluong * $product->weight;
            $product->save();
        }

        $donHangInfo->hoten = $request->hoTen;
        $donHangInfo->diachi = $request->diaChi;
        $donHangInfo->sdt = $request->soDT;
        $donHangInfo->ghichu = $request->ghiChu;
        $donHangInfo->idDonHang = "DH" . $date;
        $donHangInfo->save();


        $data = $this->getData();

        $request->session()->forget('Cart');
        $listCart = Cart_model::where('idUser', '=', $request->session()->get('Login'))->get();
        $cartInfos = CartInfo::where('idCart', '=', $listCart[0]['idCart'])->get();
        foreach ($cartInfos as $cartInfo) {
            CartInfo::destroy($cartInfo->id);
        }

        $data['listOrder'] = DB::table('donhang')->join('status', 'status', '=', 'status.status_id')
            ->where('idUser', $request->session()->get('Login'))->get();

        return view('pages.listOrder', ['data' => $data]);
    }

    /**
     * Show chi tiết sản phẩm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idProduct, Request $req)
    {
        $data = $this->getData();
        $favourite = Favourite::where('idUser', '=', $req->session()->get('Login'))->get();
        if (count($favourite) > 0) {
            $favouriteInfo = FavouriteInfo::where('idFavourite', '=', $favourite[0]->id)->get();
            $check = [];
            $favouriteProduct = [];
            foreach ($favouriteInfo as $info) {
                $temp_product = DB::table('products')
                    ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
                    ->where('id', '=', $info->idProduct)->take(1)->get();
                $id = $info['idProduct'];
                array_push($favouriteProduct, $temp_product[0]);
                $check[$id] = $info['idProduct'];
            }

            $data['favourite'] = $favouriteProduct;
            $data['check'] = $check;
        }

        $product = DB::table('products')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where('id', '=', $idProduct)->select('*')->get();

        $productRelate = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where('products_photos.photo_feature', '=', 1)
            ->where('type_id', '=', $product[0]->type_id)->get();

        $data['product'] = $product;
        $data['productRelate'] = $productRelate;
        $userIMG = 'user.png';

        if (Auth::check() == true) {
            $userIMG = User::where('id', auth()->user()->id)->get()[0]->image;
        }
        return view('pages.shop-details', compact('userIMG'), ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show các product tìm được theo key.
     */
    public function getSearch(Request $req)
    {
        $key = $req->key;
        $product = DB::table('products')->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where([
                ['products_photos.photo_feature', '=', 1],
                ['name', 'like', '%' . $key . '%'],
            ])
            ->orWhere('price', '=', $key)
            ->get()->toArray();

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
        $data['product1'] = $product;

        return view('pages.search', ['data' => $data]);
    }

    public function showDonHang(Request $req)
    {
        $data = $this->getData();
        $data['listOrder'] = DB::table('donhang')->join('status', 'status', '=', 'status.status_id')
            ->where('idUser', $req->session()->get('Login'))->get();

        return view('pages.listOrder', ['data' => $data]);
    }

    /**
     *  Show loại sản phẩm
     */

    public function showProtype($id)
    {
        $data = $this->getDaTa();
        $product = DB::table('products')
            ->join('products_photos', 'products.id', '=', 'products_photos.product_id')
            ->where('products_photos.photo_feature', '=', 1)
            ->where('type_id', '=', $id)
            ->select('*')
            ->get();
        $protype = Protype::where('type_id', '=', $id)->get();
        $data['product'] = $product;
        return view('pages.classifiProduct', compact('protype'), ['data' => $data]);
    }

    // load comment with product id\

    public function loadComment(Request $request)
    {
        $userIMG = 'user.png';
        if (auth()->user() != null) {
            $userIMG = User::where('id', auth()->user()->id)->get()[0]->image;
        }
        $product_id = $request->product_id;
        $comments = Comment::where('idSP', $product_id)->get();
        $ouput = '';
        foreach ($comments as $key => $comm) {
            $time = date("H:i:s", strtotime($comm->created_at));
            $date = date("d/m/Y", strtotime($comm->created_at));

            $ouput1 = '';
            foreach ($comments as $commentChild) {
                if ($commentChild->parent_id == $comm->id) {
                    $time1 = date("H:i:s", strtotime($commentChild->created_at));
                    $date1 = date("d/m/Y", strtotime($commentChild->created_at));
                    if($commentChild->linkUser->role_id != 2) {
                        $ouput1 .= '
                
                    <div class="row list-comment">
                    <div class="col-lg-2"><img class="rounded-circle" src="' . url('/img/image_sql/img_users/' . $commentChild->linkUser->image . '') . '" width="80"></div>
                    <div class="col-lg-10 content-comment">
                        <div class="info-comment row">
                            <div class="col-lg-6">
                                 <p style="color: red; font-weight: bold">' . $commentChild->linkUser->name . '</p>
                            </div>
    
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="far fa-clock"></i>' . $time1 . '</li>
                                    <li><i class="far fa-calendar"></i>' . $date1 . '</li>
                                </ul>
                            </div>
                        </div>
                        <p id="product-comment">' . $commentChild->comment . '</p>
                    </div>
                </div>
                    ';

                    } else {
                        $ouput1 .= '
                
                    <div class="row list-comment">
                    <div class="col-lg-2"><img class="rounded-circle" src="' . url('/img/image_sql/img_users/' . $commentChild->linkUser->image . '') . '" width="80"></div>
                    <div class="col-lg-10 content-comment">
                        <div class="info-comment row">
                            <div class="col-lg-6">
                                 <p>' . $commentChild->linkUser->name . '</p>
                            </div>
    
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="far fa-clock"></i>' . $time1 . '</li>
                                    <li><i class="far fa-calendar"></i>' . $date1 . '</li>
                                </ul>
                            </div>
                        </div>
                        <p id="product-comment">' . $commentChild->comment . '</p>
                    </div>
                </div>
                    ';
                    }
                }
            }

            if ($comm->parent_id == 0) {
                $ouput .= '
            
            <div class="row list-comment">
                <div class="col-lg-2"><img class="rounded-circle" src="' . url('/img/image_sql/img_users/' . $comm->linkUser->image . '') . '" width="80"></div>
                <div class="col-lg-10 content-comment">
                    <div class="info-comment row">
                        <div class="col-lg-5">
                             <p>' . $comm->linkUser->name . '</p>
                        </div>

                        <div class="col-lg-7">
                            <ul>
                                <li><i class="far fa-clock"></i>' . $time . '</li>
                                <li><i class="far fa-calendar"></i>' . $date . '</li>
                            </ul>
                        </div>
                    </div>
                    <p id="product-comment">' . $comm->comment . '</p>
                    <a href="#/" id="reply" onclick="showReply(' . $comm->id . ');"><i class="fas fa-reply"></i>Trả lời</a>
                    <form action="#">
                        <div class="bg-light p-2 replies-' . $comm->id . '" style="display:none">
                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle" src="' . url('/img/image_sql/img_users/' . $userIMG . '') . '" width="40" id="imgUser">
                                <textarea type="text" class="form-control ml-1 shadow-none textarea comment-content-reply-' . $comm->id . '" placeholder="Nhập bình luận..."></textarea>
                            </div>
                            <div class="mt-2 text-right">
                                <button class="btn btn-success btn-sm shadow-none" onclick="getReply(' . $comm->id . ', ' . $comm->idSP.');" type="button">Gửi bình luận</button>
                            </div>
                        </div>
                    </form>
                    ' .
                    $ouput1
                    . '
                </div>
            </div>

            ';
            }
        }
        return $ouput;
    }

    // post comment 
    public function createComment(Request $request)
    {
        return $request->session()->get('Login');
        if (Auth::check() == true) {
            $product_id = $request->product_id;
            $comment_content = $request->comment_content;
            $comment_user_id = $request->session()->get('Login');

            $comment = new Comment();
            $comment->idUser = $comment_user_id;
            $comment->idSP = $product_id;
            $comment->comment = $comment_content;
            $comment->parent_id = 0;
            $comment->save();
            return back();
        }
        return view('auth.login');
    }

    public function createChildComment(Request $request)
    {
        if (Auth::check() == true) {
            $product_id = $request->product_id;
            $comment_content = $request->comment_content;
            $comment_user_id = $request->session()->get('Login');

            $comment = new Comment();
            $comment->idUser = $comment_user_id;
            $comment->idSP = $product_id;
            $comment->comment = $comment_content;
            $comment->parent_id = $request->comment_id;
            $comment->save();
            return back();
        }
        return view('auth.login');
    }
}
