<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Protype;
use Illuminate\Http\Request;

class ProtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required',
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);
        $protype = new Protype();
        // lưu protype
        $protype->type_name = $request->name;
        if ($request->hasFile('fileInput')) {
            $protype->type_img = $request->fileInput->getClientOriginalName();
        } else {
            $protype->type_img = '';
        }
        $protype->save();

        $image = $request->file('fileInput');
        $destinationPathImg = 'img/image_sql/categories';

        $image->move($destinationPathImg, $image->getClientOriginalName());

        session()->flash('success', 'Thêm loại sản phẩm thành công!!!');

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
        $protype = Protype::find($id);
        return view('admin.pages.edit-protype', compact('protype'));
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
        $request->validate([
            'name' => 'required',
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);

        $protype = Protype::find($id);
        // lưu protype
        $protype->type_name = $request->name;
        if ($request->hasFile('fileInput')) {
            $protype->type_img = $request->fileInput->getClientOriginalName();
            $image = $request->file('fileInput');
            $destinationPathImg = 'img/image_sql/categories';

            $image->move($destinationPathImg, $image->getClientOriginalName());
        }
        $protype->save();



        session()->flash('success', 'Chỉnh sửa thông tin loại sản phẩm thành công!!!');

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
        // lưu product
        $products = Product::where('type_id', '=', $id)->get();
        if (count($products) <= 0) {
            Protype::destroy($id);
        }
        $protype = DB::table('protypes')->orderBy('type_id', 'desc')->get();
        $data['protype'] = $protype;

        return view('admin.pages.listProtype', ['data' => $data]);
    }
}
