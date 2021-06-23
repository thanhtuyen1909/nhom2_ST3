<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cart_model;
use App\CartInfo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    //Trang profile của user
    public function userProfile()
    {
        $data = $this->getDaTa();
        $profile = Auth()->user();
        $role = Role::where('role_id', $profile->role_id)->get();
        return view('pages.user.profile')->with('profile', $profile)->with('data', $data)->with('role', $role);
    }

    public function profileUpdate(Request $request, $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->fill($data);
        $user['name'] = $request->name;

        $status = $user->save();
        if ($status) {
            request()->session()->flash('success', 'Cập nhật tài thông tin tài khoản thành công!');
        } else {
            request()->session()->flash('error', 'Vui lòng thử lại!');
        }
        return redirect()->back();
    }

    public function changPasswordStore(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'new_password' => 'required',
            'new_confirm_password' => ['same:new_password'],
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $request->session()->flash('success', 'Password changed');
        } else {
            $request->session()->flash('error', 'Password does not match');
        }
        return redirect()->route('user.profile');
    }

    //Trang đổi password
    public function changePassword()
    {
        $data = $this->getDaTa();
        $profile = Auth()->user();
        return view('pages.user.changePassword')->with('profile', $profile)->with('data', $data);
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

        $this->validate(
            $request,
            [
                'name' => 'required|max:30',
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;
        $user->save();
        session()->flash('success', 'Thêm thành công một tài khoản loại super!');
        return redirect('admin/accountManage');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    function rolechange($id)
    {
        $user = [];
        $user = User::where('role_id', $id)->get();
        return view('admin.pages.listAccount', ['user' => $user]);
    }
}
