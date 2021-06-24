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
        $user = User::findOrFail($id);
        $user->name = $request->name;

        $request->validate([
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);

        if ($request->hasFile('fileInput')) {
            $user->image = $request->fileInput->getClientOriginalName();
            $image = $request->file('fileInput');
            $destinationPathImg = 'img/image_sql/img_users';

            $image->move($destinationPathImg, $image->getClientOriginalName());
        }

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
    public function edit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->name = $request->name;

        $request->validate([
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);

        // lưu profile
        if ($request->hasFile('fileInput')) {
            $user->image = $request->fileInput->getClientOriginalName();
            $image = $request->file('fileInput');
            $destinationPathImg = 'img/image_sql/img_users';

            $image->move($destinationPathImg, $image->getClientOriginalName());
        }

        $status = $user->save();
        if ($status) {
            request()->session()->flash('success', 'Cập nhật tài thông tin tài khoản thành công!');
        } else {
            request()->session()->flash('error', 'Vui lòng thử lại!');
        }
        return redirect('admin/account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function showAccount($id)
    {
        return view('admin.pages.edit-account')->with('id', $id);
    }

    public function showChangPage($email)
    {
        return view('admin.pages.changePass')->with('email', $email);
    }

    public function changePass(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        if(password_verify($request->currentpassword,$user->password)==true){
            if($request->newpassword == $request->comfirmpassword){
                $user->password = Hash::make($request->newpassword);
                $user->save();
                return redirect('admin/account');
            }else{
                session()->flash('danger', 'Không trùng khớp mật khẩu và xác nhận mật khẩu!');
                return redirect()->back();
            }
        }
        else{
            session()->flash('danger', 'Không trùng khớp mật khẩu hiện tại!');
        }

        return redirect()->back();
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', 'Cập nhật thông tin tài khoản thành công!');
        return redirect('admin/accountManage');
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
