<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\ProductsPhotos;

class ProductController extends Controller
{
    public function getDaTa()
    {
        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->get();
        $productPhotos = DB::table('products_photos')->get();
        $protype = DB::table('protypes')->orderBy('type_id', 'desc')->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;
        $data['productPhotos'] = $productPhotos;
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getDaTa();
        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->orderByDesc('products.id', 'desc')->get();
        $photos = DB::table('products_photos')->get();
        return view('admin.pages.products', compact('product', 'photos'), ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $destinationPathImg = 'img/image_sql/products';

        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'information' => 'required',
            'feature' => 'required',
            'sale' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]);
        // lưu product
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->information = $request->information;
        $products->type_id = $request->type_id;
        $products->weight = $request->weight;
        $products->feature = $request->feature;
        $products->sale = $request->sale;
        $products->amount = $request->amount;
        $products->created_at = $request->created_at;
        $products->save();

        if ($request->hasFile('fileInput')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $exe_flgF = true;
            $extension = $request->file('fileInput')->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            // duyệt từng ảnh và thực hiện lưu
            if (!$check) {
                $exe_flgF = false;
            }
            if ($exe_flgF) {
                ProductsPhotos::create([
                    'product_id' => $products->id,
                    'filename' => $request->fileInput->getClientOriginalName(),
                    'photo_feature' => 1,
                ]);
                $image = $request->file('fileInput');

                $image->move($destinationPathImg, $image->getClientOriginalName());
            }
        }
        // kiểm tra có files sẽ xử lý
        if ($request->hasFile('imageFile')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('imageFile');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if (!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
            }
            // nếu không có file nào vi phạm validate thì tiến hành lưu DB
            if ($exe_flg) {
                foreach ($request->imageFile as $photo) {
                    $filename = $photo->getClientOriginalName();
                    ProductsPhotos::create([
                        'product_id' => $products->id,
                        'filename' => $filename,
                        'photo_feature' => 0,
                    ]);

                    $photo->move($destinationPathImg, $filename);
                }
            }
        }

        session()->flash('success', 'Thêm sản phẩm thành công!!!');

        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->getDaTa();
        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->where('products.id', '=', $id)->get();
        $photos = ProductsPhotos::where('product_id', '=', $id)->get();
        $data['product1'] = $product;
        return view('admin.pages.edit-product', compact('photos'), ['data' => $data]);
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
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $destinationPathImg = 'img/image_sql/products';

        // lưu product
        $products = Product::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->information = $request->information;
        $products->type_id = $request->type_id;
        $products->weight = $request->weight;
        $products->feature = $request->feature;
        $products->sale = $request->sale;
        $products->amount = $request->amount;
        $products->created_at = $request->created_at;
        $products->save();

        // duyệt từng ảnh và thực hiện lưu
        $data = $this->getDaTa();
        if ($request->hasFile('fileInput')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $extension = $request->file('fileInput')->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            $exe_flgF = true;

            if (!$check) {
                // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                session()->flash('success', 'Hình ảnh có đuôi mở rộng không đúng!!!');
                $exe_flgF = false;
            }
            if ($exe_flgF) {
                $checkFeature = false;
                foreach ($data['productPhotos'] as $photo) {
                    if ($photo->product_id == $id && $photo->photo_feature == 1) {
                        $productPhotoFeauture = ProductsPhotos::find($photo->id);
                        $productPhotoFeauture->filename = $request->fileInput->getClientOriginalName();
                        $productPhotoFeauture->save();

                        $image = $request->file('fileInput');

                        $image->move($destinationPathImg, $image->getClientOriginalName());

                        $checkFeature = true;
                    }
                }
                if ($checkFeature == false) {
                    ProductsPhotos::create([
                        'product_id' => $id,
                        'filename' => $request->fileInput->getClientOriginalName(),
                        'photo_feature' => 1,
                    ]);
                    $image = $request->file('fileInput');

                    $image->move($destinationPathImg, $image->getClientOriginalName());
                }
            }
        }

        // kiểm tra có files sẽ xử lý
        if ($request->hasFile('imageFile')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('imageFile');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if (!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    session()->flash('success', 'Hình ảnh có đuôi mở rộng không đúng!!!');
                    $exe_flg = false;
                    break;
                }
            }
            // nếu không có file nào vi phạm validate thì tiến hành lưu DB
            if ($exe_flg) {
                $check = false;
                $dataPhoto1 = array();
                foreach ($data['productPhotos'] as $photo) {
                    if ($photo->product_id == $id && $photo->photo_feature == 0) {
                        $dataPhoto1[] = $photo;
                    }
                }
                $dataPhoto2 = $request->imageFile;
                if (count($dataPhoto2) >= count($dataPhoto1)) {
                    foreach ($data['productPhotos'] as $photo) {
                        if ($photo->feature == 0 && $photo->product_id == $id) {
                            ProductsPhotos::destroy($photo->photo_id);
                        }
                    }
                    foreach ($dataPhoto2 as $photo) {
                        $filename = $photo->getClientOriginalName();
                        ProductsPhotos::create([
                            'product_id' => $id,
                            'filename' => $filename,
                            'photo_feature' => 0,
                        ]);
                        $photo->move($destinationPathImg, $filename);
                    }
                } else {
                    foreach ($dataPhoto2 as $photo) {
                        $filename = $photo->getClientOriginalName();
                        for ($i = 0; $i < $dataPhoto2; $i++) {
                            if ($dataPhoto1[$i]->product_id == $id && $dataPhoto1[$i]->photo_feature == 0) {
                                $productPhoto = ProductsPhotos::find($dataPhoto1[$i]->photo_id);
                                $productPhoto->filename = $filename;
                                $productPhoto->save();
                                $photo->move($destinationPathImg, $filename);
                                break;
                            }
                        }
                    }
                }
            }
        }

        session()->flash('success', 'Chỉnh sửa thông tin sản phẩm thành công!!!');

        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->getDaTa();
        foreach ($data['product'] as $product) {
            if (isset($product->id)) {
                Product::destroy($id);
            }
        }
        $productPhoto = ProductsPhotos::where('product_id', '=', $id)->get();
        if (count($productPhoto) > 0) {
            foreach ($productPhoto as $photo) {
                ProductsPhotos::destroy($photo->photo_id);
            }
        }

        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->orderByDesc('products.id', 'desc')->get();
        $photos = DB::table('products_photos')->get();

        return view('admin.pages.listProduct', compact('product', 'photos'));
    }
}
