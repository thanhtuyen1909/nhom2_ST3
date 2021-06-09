<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductsPhoto;
use App\Protype;
use App\Role;
use App\User;

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
        $listAcc = DB::table('users')->join('roles', 'users.role_id', 'roles.role_id')->get();
        $listRole = Role::all();
        $data = [];
        $data['product'] = $product;
        $data['protype'] = $protype;
        $data['listAcc'] = $listAcc;
        $data['listRole'] = $listRole;
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
}
