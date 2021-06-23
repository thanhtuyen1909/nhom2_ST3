<?php

namespace App\Http\Controllers;

use App\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();
        return view('admin.pages.banner')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = DB::table('position_banner')->get();
        return view('admin.pages.add-banner', compact('positions'));
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
        $destinationPathImg = 'img/banner';
        $request->validate([
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();
        $banner = new BannerModel();
        $check = true;
        if ($request->fileInput == null) {
            session()->flash('success', 'Chưa chọn hình! Thêm banner thất bại');
            return redirect('admin/banner');
        } else {
            if ($request->sub_title != null || $request->title != null || $request->description != null) {
                $banner->sub_title = $request->sub_title;
                $banner->title = $request->title;
                $banner->description = $request->description;
                $banner->position_id = 1;
                if ($request->hasFile('fileInput')) {
                    $banner->filename = $request->fileInput->getClientOriginalName();
                    $image = $request->file('fileInput');
                    $image->move($destinationPathImg, $image->getClientOriginalName());
                } else {
                    $banner->filename = '';
                }
                if ($request->status == "active") {
                    foreach ($banners as $ban) {
                        if ($ban->status == "active" && $ban->position_id == (int)$request->type_banner) {
                            $banner->status = "inactive";
                            $check = false;
                        }
                    }
                    if ($check == true) {
                        $banner->status = $request->status;
                    }
                } else {
                    $banner->status = $request->status;
                }

                session()->flash('success', 'Thêm banner chính thành công!!!');
            } else {
                if ($request->hasFile('fileInput')) {
                    $banner->filename = $request->fileInput->getClientOriginalName();
                    $image = $request->file('fileInput');
                    $image->move($destinationPathImg, $image->getClientOriginalName());
                } else {
                    $banner->filename = '';
                }
                $banner->position_id = $request->type_banner;
                if ($request->status == "active") {
                    foreach ($banners as $ban) {
                        if ($ban->status == "active" && $ban->position_id == (int)$request->type_banner) {
                            $banner->status = "inactive";
                            $check = false;
                        }
                    }
                    if ($check == true) {
                        $banner->status = $request->status;
                    }
                } else {
                    $banner->status = $request->status;
                }
                session()->flash('success', 'Thêm banner phụ thành công!!!');
            }
        }
        $banner->save();
        return redirect('admin/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = BannerModel::findOrFail($id);
        $positions = DB::table('position_banner')->get();
        return view('admin.pages.edit-banner', compact('banner', 'positions'));
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
        $banner = BannerModel::find($id);
        $destinationPathImg = 'img/banner';
        $request->validate([
            'fileInput' => 'mimes:jpeg,jpg,png|max:100000',
        ]);
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();

        $banner->sub_title = $request->sub_title;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->position_id = $request->type_banner;
        $banner->status = $request->status;

        if ($request->hasFile('fileInput')) {
            $banner->filename = $request->fileInput->getClientOriginalName();
            $image = $request->file('fileInput');
            $image->move($destinationPathImg, $image->getClientOriginalName());
            
        }

        if ($request->status == "active") {
            foreach ($banners as $ban) {
                if ($ban->status == "active" && $ban->position_id == (int)$request->type_banner) {
                    if ($ban->id != $id) {
                        $ban = BannerModel::find($ban->id);
                        $ban->status = "inactive";
                        $ban->save();
                    }
                }
            }
        }
        $banner->save();
        if ($request->type_banner != 1) {
            session()->flash('success', 'Sửa banner phụ thành công!!!');
        } else session()->flash('success', 'Sửa banner chính thành công!!!');
        return redirect('admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = BannerModel::findOrFail($id);
        if ($banner->static == "active") {
            request()->session()->flash('error', 'Banner này đang được sử dụng!');
            return redirect()->route('banner.index');
        }
        $banner->delete();
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();
        return view('admin.pages.listBanner', compact('banners')); 
    }

    public function destroy1($id)
    {
        $banner = BannerModel::findOrFail($id);
        if ($banner->static == "active") {
            request()->session()->flash('error', 'Banner này đang được sử dụng!');
            return redirect()->route('banner.index');
        }
        $banner->delete();
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();
        return view('admin.pages.listBanner1', compact('banners')); 
    }

    public function destroy2($id)
    {
        $banner = BannerModel::findOrFail($id);
        if ($banner->static == "active") {
            request()->session()->flash('error', 'Banner này đang được sử dụng!');
            return redirect()->route('banner.index');
        }
        $banner->delete();
        $banners = DB::table('banner')->orderByDesc('banner.id', 'desc')->get();
        return view('admin.pages.listBanner2', compact('banners')); 
    }
}
