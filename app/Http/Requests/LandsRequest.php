<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        //để lấy phương thức hiện tại
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'lands_add':
                        $rules = [
                            "lbds_id" => "required",
                            "name_bds" => "required",
                            "location" => "required",
                            "price" => "required",
                            "area" => "required",
                            // "images" => "required",
                            "description" => "required|max:2000",
                            "contact" => "required",
                        ];
                        break;
                    case 'lands_update':
                        $rules = [
                            "lbds_id" => "required",
                            "name_bds" => "required",
                            "location" => "required",
                            "price" => "required",
                            "area" => "required",
                            "description" => "required|max:2000",
                            "contact" => "required",
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'lbds_id.required' => 'Bạn phải chọn loại bất động sản',
            'name_bds.required' => 'Bạn phải nhập tên bất động sản',
            'location.required' => 'Bạn phải nhập vị trí bất động sản',
            'price.required' => 'Bạn phải nhập giá bất động sản',
            'description.required' => 'Bạn phải nhập mô tả bất động sản',
            'description.max' => 'Mô tả chỉ được nhập tối đa 2000 ký tự',
            'contact.required' => 'Bạn phải nhập thông tin liên hệ',
            // 'images.required'=>'Bắt buộc phải chọn ảnh',
            'area.required'=>'Bắt buộc phải nhập diện tích'
            
        ];
    }
}
