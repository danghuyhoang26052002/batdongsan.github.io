<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorylandsRequest extends FormRequest
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
                    case 'categorylands_add':
                        $rules = [
                            "name_lbds" => "required",
                        ];
                        break;
                    case 'categorylands_update':
                        $rules = [
                            "name_lbds" => "required",
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
            'name_lbds.required' => 'Bắt buộc phải nhập loại bất động sản',
        ];
    }
}
