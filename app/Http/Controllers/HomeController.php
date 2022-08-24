<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\OrderShipped;
use App\Models\Banner;
use App\Models\CategoryLands;
use App\Models\Lands;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $listbds = new CategoryLands();
        $detail_bds = new Lands();
        $news = new News();
        $banner = new Banner();
        $this->v['listbds'] = $listbds->loadListWithPager();
        $this->v['detail_bds'] = $detail_bds->loadListWithPager();
        $this->v['news'] = $news->loadListWithPager();
        $this->v['banner'] = $banner->loadListWithPager();
        $this->v['title'] = 'Trang Chủ';

        return view('Fontend.index', $this->v);
    }
    public function layout()
    {
        $listbds = new CategoryLands();
        $this->v['listbds'] = $listbds->loadListWithPager();
        return view('templates.layout', $this->v);
    }
    public function lands()
    {
        $listbds = new CategoryLands();
        $detail_bds = new Lands();
        $this->v['listbds'] = $listbds->loadListWithPager();
        //search loai category
        $category = '';
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        };
        if ($category >= 0) {
            $this->v['detail_bds'] = $detail_bds->loadListWithCategory();
        } else {
            $this->v['detail_bds'] = $detail_bds->loadListWithPager();
        }
        $this->v['title'] = 'Bat Dong San';

        return view('Fontend.lands', $this->v);
    }
    public function news()
    {
        $listbds = new CategoryLands();
        $news = new News();
        $this->v['listbds'] = $listbds->loadListWithPager();
        //search loai category
        $category = '';
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        };
        if ($category >= 0) {
            $this->v['news'] = $news->loadListWithCategory();
        } else {
            $this->v['news'] = $news->loadListWithPager();
        }
        $this->v['title'] = 'Tin Tuc';

        return view('Fontend.news', $this->v);
    }
    public function lands_detail($id)
    {
        $listbds = new CategoryLands();
        $this->v['listbds'] = $listbds->loadListWithPager();
        $this->v['title'] = 'Chi tiết BĐS';
        $lands = new Lands();
        $objItem = $lands->loadOne($id);
        $this->v['objItem'] = $objItem;
        $category = $objItem->lbds_id;
        if ($category >= 0) {
            $this->v['detail_bds'] = $lands->loadListWithCategory([], $category);
        } else {
            $this->v['detail_bds'] = $lands->loadListWithPager();
        }
        return view('Fontend/details.lands', $this->v);
    }
    public function news_detail($id)
    {
        $listbds = new CategoryLands();
        $this->v['listbds'] = $listbds->loadListWithPager();
        $this->v['title'] = 'Chi tiết Tin Tức';
        $news = new News();
        $objItem = $news->loadOne($id);
        $this->v['objItem'] = $objItem;
        $category = $objItem->lbds_id;
        if ($category >= 0) {
            $this->v['news'] = $news->loadListWithCategory([], $category);
        } else {
            $this->v['news'] = $news->loadListWithPager();
        }
        return view('Fontend/details.news', $this->v);
    }
    public function lands_email(EmailRequest $request, $id)
    {
        $lands_email = new Lands();
        $objItem = $lands_email->loadOne($id);
        $this->v['objItem']['id'] = $id;
        $this->v['objItem'] = $objItem;
        $method_route = 'route_FontEnd_Lands_Detail';

        if ($request->isMethod('post')) {
            $contact = [];
            $contact['cols'] = $request->post();
            unset($contact['cols']['_token']);
            $this->v['contact'] = $contact['cols'];
            if ($contact == null) {
                return redirect()->route($method_route, ['id' => $id]);
            } elseif ($contact > 0) {
                Mail::to("hoangdhph16774@fpt.edu.vn")->send(new OrderShipped([], $this->v));
                // Mail::to("ayanjoyag@gmail.com")->send(new OrderShipped([], $this->v));
                Session::flash('success', 'Gửi yêu cầu thành công');
                return redirect()->route($method_route, ['id' => $id]);
            } else {
                Session::flash('error', 'Lỗi gửi yêu cầu');
                return redirect()->route($method_route, ['id' => $id]);
            }
        }
    }
}
