<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    //Banner
    public function banner()
    {
        $users = new Banner();
        $this->v['list'] = $users->loadListWithPager();
        $this->v['title'] = 'Danh Sách Banner';
        return view("admin/banner.index", $this->v);
    }
    public function banner_add(BannerRequest $request)
    {
        $this->v['title'] = 'Thêm người dùng';
        $news = new News();
        $this->v['list_news'] = $news->loadListWithPager();
        $method_route = 'route_BackEnd_Banner_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            $modelTest = new Banner();
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
        return view('admin/banner.add', $this->v);
    }
    public function banner_detail($id)
    {   $news = new News();
        $this->v['list_news'] = $news->loadListWithPager();
        $this->v['title'] = 'Chi tiết banner';
        $tests = new Banner();
        $objItem = $tests->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/banner.detail', $this->v);
    }
    public function banner_update($id, BannerRequest $request){
        $method_route = "route_BackEnd_Banner_Detail";
        $params=[];
        $params['cols']=$request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        $tests1 = new Banner();
        $objItem = $tests1->loadOne($id);
        $params['cols']['id']=$id;
        $res = $tests1->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route,['id'=>$id]);
        }elseif($res ==1){
            Session::flash('success','Cập nhật bản ghi '.$objItem->id.' thành công !');
            return redirect()->route($method_route,['id'=>$id]);
        }else{
            Session::flash('error','Lỗi cập nhật bản ghi'.$objItem->id);
            return redirect()->route($method_route,['id'=>$id]);
        }
    }
    public function banner_remove($id)
    {
        $method_route = "route_BackEnd_Banner_List";
        $del = new Banner();
        $remove = $del->destroy($id);
        Session::flash('success', 'Xóa bản ghi ' . $id . ' thành công !');
        return redirect()->route($method_route);
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('banner', $fileName, 'public');
    }
}
