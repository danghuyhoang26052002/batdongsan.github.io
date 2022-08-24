<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandsRequest;
use App\Http\Requests\CategorylandsRequest;
use App\Models\CategoryLands;
use App\Models\Lands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LandsController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    //Lands - Danh sách BĐS
    public function lands()
    {
        $details_bds = new Lands();
        $this->v['list'] = $details_bds->loadListWithPager();
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = 'Danh Sách BĐS';
        return view('admin/lands.index', $this->v);
    }
    //Lands - Thêm Mới BĐS
    public function lands_add(LandsRequest $request)
    {
        $this->v['title'] = 'Thêm BĐS';
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $method_route = 'route_BackEnd_Lands_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images_bds') && $request->file('images_bds')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('images_bds'));
            }
            $modelTest = new Lands();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return redirect()->route($method_route);
            }
        }
        return view('admin/Lands.add', $this->v);
    }
    //lands - Chi tiết BĐS theo id
    public function lands_detail($id)
    {
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = 'Chi tiết BĐS';
        $lands = new Lands();
        $objItem = $lands->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/lands.detail', $this->v);
    }
    //lands - cập nhật thông tin BĐS 
    public function lands_update($id, LandsRequest $request)
    {
        $method_route = "route_BackEnd_Lands_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('images_bds') && $request->file('images_bds')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images_bds'));
        }
        $lands = new Lands();
        $objItem = $lands->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $lands->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật bản ghi ' . $objItem->id . ' thành công !');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật bản ghi' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    //lands - Xóa BĐS
    public function lands_remove($id)
    {
        $method_route = "route_BackEnd_Lands_List";
        $del = new Lands();
        $remove = $del->destroy($id);
        Session::flash('success', 'Xóa bản ghi ' . $id . ' thành công !');
        return redirect()->route($method_route);
    }
    //Category_Lands - DS Loại BĐS
    public function categorylands()
    {
        $lbds = new CategoryLands();
        $this->v['list'] = $lbds->loadListWithPager();
        $this->v['title'] = 'Danh Sách Loại BĐS';
        return view('admin/category_lands.index', $this->v);
    }
    //Category_Add - Thêm Loại BĐS
    public function categorylands_add(CategorylandsRequest $request)
    {
        $this->v['title'] = 'Thêm Loại BĐS';
        $method_route = 'route_BackEnd_Categorylands_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTest = new CategoryLands();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return redirect()->route($method_route);
            }
        }
        return view('admin/category_lands.add', $this->v);
    }
    //Category_details - Chi tiết Loại BĐS theo id
    public function categorylands_detail($id)
    {
        $this->v['title'] = 'Chi tiết loại BĐS';
        $category = new CategoryLands();
        $objItem = $category->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/category_lands.detail', $this->v);
    }
    //Category_update - Cập nhật thông tin Loại BĐS theo id
    public function categorylands_update($id, CategorylandsRequest $request)
    {
        $method_route = "route_BackEnd_Categorylands_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $category = new CategoryLands();
        $objItem = $category->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $category->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật bản ghi ' . $objItem->id . ' thành công !');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật bản ghi' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    //Category_remove - Xóa Loại BĐS theo id
    public function categorylands_remove($id)
    {
        $method_route = "route_BackEnd_Categorylands_List";
        $del = new CategoryLands();
        $remove = $del->destroy($id);
        Session::flash('success', 'Xóa bản ghi ' . $id . ' thành công !');
        return redirect()->route($method_route);
    }
    // phương thức upload file (image)
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('lands', $fileName, 'public');
    }
}
