<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Protype;
use Illuminate\Contracts\Session\Session;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $product = Product::where('id', '<', 30)->take(25)->get();
        $protype = Protype::where('type_id', '<', 10)->take(5)->get();
        $productLastList1 = Product::where('id', '<', 30)->orderby('id', 'desc')->limit(3)->get();
        $productLastList2 = Product::where('id', '<', 30)->orderby('id', 'desc')->skip(3)->take(3)->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;

        $data['proLast1'] = $productLastList1;
        $data['proLast2'] = $productLastList2;
        
        return view('pages.' . $name, ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin($name)
    {
        return view('admin.pages.' . $name);
    }

    /**
     * Show the list product and protype at pages.home
     */

    public function showProduct()
    {
        $product = Product::where('id', '<', 30)->take(25)->get();
        $protype = Protype::where('type_id', '<', 10)->take(5)->get();
        $productLastList1 = Product::where('id', '<', 30)->orderby('id', 'desc')->limit(3)->get();
        $productLastList2 = Product::where('id', '<', 30)->orderby('id', 'desc')->skip(3)->take(3)->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;

        $data['proLast1'] = $productLastList1;
        $data['proLast2'] = $productLastList2;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->select('*')->first();
        $protype = Protype::where('type_id', '<', 10)->take(5)->get();
        $productRelate = Product::where('type_id', '=', $product->type_id)->take(5)->get();
        $protypeProduct = Protype::where('type_id', '=', $product->type_id)->select('*')->first();

        $data['productRelate'] = $productRelate;
        $data['protype'] = $protype;


        return view('pages.shop-details', compact('product', 'protypeProduct'), ['data' => $data]);
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
}
