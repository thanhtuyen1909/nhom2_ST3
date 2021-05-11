<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Protype;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $product = Product::where('id','<',30)->take(25)->get();
        $protype = Protype::where('type_id','<',10)->take(5)->get();
        $productLastList1 = Product::where('id','<',30)->orderby('id', 'desc')->limit(3)->get();
        $productLastList2 = Product::where('id','<',30)->orderby('id', 'desc')->skip(3)->take(3)->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;

        $data['proLast1'] = $productLastList1;
        $data['proLast2'] = $productLastList2;
        return view('pages.' . $name, ['data'=>$data]);
    }

    /**
     * Show the list product and protype at pages.home
     */

    public function showProduct(){
        $product = Product::where('id','<',30)->take(25)->get();
        $protype = Protype::where('type_id','<',10)->take(5)->get();
        $productLastList1 = Product::where('id','<',30)->orderby('id', 'desc')->limit(3)->get();
        $productLastList2 = Product::where('id','<',30)->orderby('id', 'desc')->skip(3)->take(3)->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;

        $data['proLast1'] = $productLastList1;
        $data['proLast2'] = $productLastList2;
        return view('.pages/home',['data'=>$data]);
    }

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
        //
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
