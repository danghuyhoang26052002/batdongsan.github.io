<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Lands extends Model
{
    use HasFactory;
    protected $table = "details_bds";
    protected $fillable = ['id', 'lbds_id', 'name_bds', 'location', 'price','area','number_bedroom','number_bathroom', 'description', 'contact','images'];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->paginate(10);
        return $list;
    }
    // Lọc BĐS theo loại bđs
    public function loadListWithCategory($param = [],$cate=[])
    {   if(isset($_GET['category'])){
        $category = $_GET['category'];
        }else{
        $category = $cate;
        }
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->where('lbds_id','=',$category);
        $list = $query->paginate(10);
        return $list;
    }
    //phương thức thêm mới 
    public function saveNew($params)
    {
        $data = array_merge($params['cols']); // array_merge để nối 2 hay nhiều mảng lại thành 1 mảng
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    //phương thức lấy 1 mảng dữ liệu
    public function loadOne($id, $param = [])
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }
    //phương thức update
    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }
        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            if (in_array($colName, $this->fillable)) {
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }
    //phương thức xóa
    public static function destroy($id){
        $delete = DB::table('details_bds')->where('id', '=', $id)->delete();
        return $delete;
    }
}
