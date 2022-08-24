<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $users = new AdminModel();
        $this->v['list'] = $users->loadListWithPager();
        $this->v['title'] = 'Danh Sách Người dùng';
        return view("admin/user.index", $this->v);
    }
    public function add(UserRequest $request)
    {

        $this->v['title'] = 'Thêm người dùng';
        $method_route = 'route_BackEnd_Users_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }
            $modelTest = new AdminModel();
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
        return view('admin/user.add', $this->v);
    }
    public function detail($id)
    {
        $this->v['title'] = 'Chi tiết người dùng';
        $tests = new AdminModel();
        $objItem = $tests->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/user.detail', $this->v);
    }
    public function update($id, UserRequest $request)
    {
        $method_route = "route_BackEnd_Users_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
        }
        $tests1 = new AdminModel();
        $objItem = $tests1->loadOne($id);
        $params['cols']['id'] = $id;
        if (!is_null($params['cols']['password'])) {
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        }
        $res = $tests1->saveUpdate($params);
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
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('cmnd', $fileName, 'public');
    }
    public function remove($id)
    {
        $method_route = "route_BackEnd_Users_List";
        $del = new AdminModel();
        $remove = $del->destroy($id);
        Session::flash('success', 'Xóa bản ghi ' . $id . ' thành công !');
        return redirect()->route($method_route);
    }
}
