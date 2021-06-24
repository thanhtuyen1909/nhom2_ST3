<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductsPhoto;
use App\Protype;
use App\Role;
use App\Comment;
use App\DonHang;
use App\DonHangInfo;
use App\User;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\PDF;
use Facade\FlareClient\View;
use PhpParser\Node\Expr\Cast\String_;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        $request->session()->forget('userAdmin');
        return redirect()->route('loginAdmin');
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

    public function getDaTaAdmin()
    {
        $this->autoSale();
        $product = DB::table('products')->join('protypes', 'products.type_id', '=', 'protypes.type_id')->get();
        $protype = DB::table('protypes')->orderBy('type_id', 'asc')->get();
        $listAcc = DB::table('users')->join('roles', 'users.role_id', 'roles.role_id')->get();
        $listRole = Role::all();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;
        $data['listAcc'] = $listAcc;
        $data['listRole'] = $listRole;
        $data['comment'] = Comment::orderBy('created_at', 'desc')->get();

        $data['name'] = "";

        return $data;
    }

    public function login(Request $request)
    {
        $data = $this->getDaTaAdmin();
        $data['DonHang'] = DonHang::all();
        $dataArray1 = [];
        foreach($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['maDH'] = $donhang->id;  
            $dataArray['status'] = Status::where('status_id', $donhang->status)->first()->status_title;
            $dataArray['totalPrice'] = $donhang->totalPrice; 
            $dataArray['created_at'] = $donhang->created_at;
            $dataArray1[] = $dataArray;
        }
        $users = User::all();
        // dd(password_verify($request->password, $users[2]->password));
        foreach ($users as $user) {
            if ($user->email == $request->email && password_verify($request->password, $user->password) 
            && ($user->linkRole->role_id == 1 || $user->linkRole->role_id == 3)) {
                $request->session()->put('userAdmin', $user);
                return view('admin.pages.home', ["user" => $user, "data" => $data, "dataArray1" => $dataArray1]);
            }
        }
        session()->flash('danger', 'Vui lòng kiểm tra lại thông tin!');
        return redirect()->back();
    }

    public function getLogin()
    {
        return view('admin.pages.login');
    }

    public function indexAdmin($name, Request $request)
    {
        $user = User::where('id', $request->session()->get('userAdmin')->id)->first();
        $data = $this->getDaTaAdmin();
        $data['DonHang'] = DB::table('DonHang')->get();
        $dataArray1 = [];
        foreach ($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['maDH'] = $donhang->id;
            $dataArray['status'] = Status::where('status_id', $donhang->status)->first()->status_title;
            $dataArray['totalPrice'] = $donhang->totalPrice;
            $dataArray['created_at'] = $donhang->created_at;
            $dataArray1[] = $dataArray;
        }
        if ($name == "reply-comment" || $name == "deleteComment") {
            return;
        }
        return view('admin.pages.' . $name, compact('dataArray1', 'user'), ['data' => $data]);
    }

    public function showAdmin()
    {
        $data = $this->getDaTaAdmin();
        $data['DonHang'] = DB::table('DonHang')->get();
        $dataArray1 = [];
        foreach ($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['maDH'] = $donhang->id;
            $dataArray['status'] = Status::find($donhang->status)->first()->status_title;
            $dataArray['totalPrice'] = $donhang->totalPrice;
            $dataArray['created_at'] = $donhang->created_at;
            $dataArray1[] = $dataArray;
        }
        return view('admin.pages.home', compact('dataArray1'), ['data' => $data]);
    }

    public function showListContact()
    {
        $data = $this->getDaTaAdmin();
        $data['listContact'] = Contact::all();
        return view('admin.pages.listContact', ['data' => $data]);
    }

    public function updateListContact($id)
    {
        $data = $this->getDaTaAdmin();

        $contact = Contact::find($id);
        if ($contact->seen == 0) {
            $contact->seen = 1;
        } else {
            $contact->seen = 0;
        }
        $contact->save();

        $data['listContact'] = Contact::all();

        return view('admin.pages.listContact1', ['data' => $data]);
    }

    public function reply_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_content = $request->comment_content;
        $comment_user_id =  27;
        $comment = new Comment();
        $comment->idUser = $comment_user_id;
        $comment->idSP = $product_id;
        $comment->comment = $comment_content;
        $comment->parent_id = $request->comment_id;
        $comment->save();
        $data = $this->getDaTaAdmin();
        $user = DB::table('users')->get();
        return view('admin.pages.listComment', ['data' => $data])->with(compact('user'));
    }

    public function destroy_comment(Request $request)
    {
        $comments = Comment::where('parent_id', $request->comment_id)->get();
        if (count($comments) > 0) {
            foreach ($comments as $comment) {
                Comment::destroy($comment->id);
            }
        } else {
            Comment::destroy($request->comment_id);
        }
        $data = $this->getDaTaAdmin();
        $user = DB::table('users')->get();
        return view('admin.pages.listComment', ['data' => $data])->with(compact('user'));
    }
    function download($id){
        $donHang = DonHang::find($id);
        $detail = ChiTietDonHang::where('idDonHang',$id)->get();
        $info = DonHangInfo::where('idDonHang',$id)->get();
        $data =[];
        $data['info'] = $info;
        $data['DH'] = $donHang;
        $data['detail'] = $detail;
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        $time = $time->toDateString();
        $time = explode("-", $time);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.layoutHD', ['data' => $data,'id'=>$id,'time'=>$time])->setOptions(['defaultFont' => 'times-roman']);
        return $pdf->download("id.pdf");
    }
    
    function view($id){
        $donHang = DonHang::find($id);
        $detail = ChiTietDonHang::where('idDonHang',$id)->get();
        $info = DonHangInfo::where('idDonHang',$id)->get();
        $data =[];
        $data['info'] = $info;
        $data['DH'] = $donHang;
        $data['detail'] = $detail;
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        $time = $time->toDateString();
        $time = explode("-", $time);
        return view('admin.layoutHD', ['data' => $data,'id'=>$id,'time'=>$time]);
    }
}
