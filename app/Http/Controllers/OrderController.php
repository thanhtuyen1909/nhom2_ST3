<?php

namespace App\Http\Controllers;
use App\DonHang;
use Illuminate\Support\Facades\DB;
use App\User;
use App\DonHangInfo;
use App\ChiTietDonHang;
use App\Product;
use App\ProductsPhotos;
use App\Status;

class OrderController extends Controller {
    public function show() {
        $data['DonHang'] = DB::table('DonHang')->get();
        $dataArray1 = [];
        foreach($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['maDH'] = $donhang->id; 
            $dataArray['status'] = Status::where('status_id', $donhang->status)->first()->status_title;
            $dataArray['totalPrice'] = $donhang->totalPrice; 
            $dataArray['created_at'] = $donhang->created_at;
            $dataArray1[] = $dataArray;
        }
        
        return view('admin.pages.listDonHang', compact('dataArray1'));
    }

    public function showDetail($id) {
        $data['CTDH'] = ChiTietDonHang::all();
        $data['DonHang'] = DonHang::all();
        $dataArrayCTDH1 = [];
        foreach($data['CTDH'] as $or) {
            if($or->idDonHang == $id) {
                $dataArrayCTDH['nameSP'] = $or->linkProduct->name;
                $dataArrayCTDH['price'] = $or->thanhtien;
                $dataArrayCTDH['amount'] = $or->soluong;
                $dataArrayCTDH['photo'] = ProductsPhotos::where([['product_id', $or->linkProduct->id], ['photo_feature', 1]])->first()->filename;
                $dataArrayCTDH1[] = $dataArrayCTDH;
            }
        }

        foreach($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['gmail'] = User::find($donhang->idUser)->first()->email;
            $dataArray['userimg'] = User::find($donhang->idUser)->first()->image;
            $dataArray['maDH'] = $donhang->id; 
            $dataArray['status'] = Status::find($donhang->status)->first()->status_title;
            $dataArray['diachi'] = DonHangInfo::where('idDonHang', $id)->first()->diachi;
            $dataArray['sdt'] =  DonHangInfo::where('idDonHang', $id)->first()->sdt;
            $dataArray['hoten'] =  DonHangInfo::where('idDonHang', $id)->first()->hoten;
            $dataArray['ghichu'] =  DonHangInfo::where('idDonHang', $id)->first()->ghichu;
            $dataArray1[] = $dataArray;
        }
        
        return view('admin.pages.order-detail', compact('dataArray1', 'dataArrayCTDH1'))->with('id', $id);
    }
    function changeStatus($id,$value){

        $data['DonHang'] = DB::table('DonHang')->get();
        $dataArray1 = [];
        foreach($data['DonHang'] as $donhang) {
            $dataArray['username'] = User::find($donhang->idUser)->first()->name;
            $dataArray['maDH'] = $donhang->id; 
            $dataArray['status'] = Status::where('status_id', $donhang->status)->first()->status_title;
            $dataArray['totalPrice'] = $donhang->totalPrice; 
            $dataArray['created_at'] = $donhang->created_at;
            $dataArray1[] = $dataArray;
        }
        $order = DonHang::find($id);
        $order->status = $value;
        $order->save();
        return redirect('admin/listDonHang')->with('dataArray1');
    }
}