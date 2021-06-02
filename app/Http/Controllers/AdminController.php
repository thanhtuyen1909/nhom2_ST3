<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductsPhoto;
use App\Protype;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDaTaAdmin()
    {
        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->get();
        $protype = DB::table('protypes')->orderBy('type_id', 'asc')->get();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;
        return $data;
    }

    public function indexAdmin($name)
    {
        $data = $this->getDaTaAdmin();
        return view('admin.pages.' . $name, ['data' => $data]);
    }

    public function showAdmin()
    {
        $data = $this->getDaTaAdmin();
        return view('admin.pages.home', ['data' => $data]);
    }
}
