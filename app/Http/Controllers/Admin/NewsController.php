<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\CategoryLands;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    //News - DS tin tức
    public function news()
    {
        $details_bds = new News();
        $this->v['list'] = $details_bds->loadListWithPager();
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = 'Danh Sách Tin Tức';
        return view('admin/news.index', $this->v);
    }
    //News - Thêm mới tin tức
    public function news_add(NewsRequest $request)
    {
        $this->v['title'] = 'Thêm Tin Tức';
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $method_route = 'route_BackEnd_News_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images_news') && $request->file('images_news')->isValid()) { //valid : kiểm  tra phần tử có hợp lệ hay không
                $params['cols']['images'] = $this->uploadFile($request->file('images_news'));
            }
            $modelTest = new News();
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
        return view('admin/News.add', $this->v);
    }
    //News - Chi tiết tin tức theo id
    public function news_detail($id)
    {
        $lbds = new CategoryLands();
        $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = 'Chi tiết Tin Tức';
        $news = new News();
        $objItem = $news->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/news.detail', $this->v);
    }
    //News - Cập nhật thông tin tin tức theo id
    public function news_update($id, NewsRequest $request)
    {
        $method_route = "route_BackEnd_News_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('images_news') && $request->file('images_news')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images_news'));
        }
        $news = new News();
        $objItem = $news->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $news->saveUpdate($params);
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
    //News - Xóa tin tức theo id
    public function news_remove($id)
    {
        $method_route = "route_BackEnd_News_List";
        $del = new News();
        $remove = $del->destroy($id);
        Session::flash('success', 'Xóa bản ghi ' . $id . ' thành công !');
        return redirect()->route($method_route);
    }
    // phương thức upload file (image)
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('news', $fileName, 'public');
    }
}
