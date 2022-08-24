<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
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
                    case 'add':
                        $rules = [
                            "name" => "required",
                            "email" => "required|unique:users|email",
                            "phone" => "required",
                            "password" => "required",
                            "role" => "required"
                        ];
                        break;
                    case 'update':
                        $rules = [
                            "name" => "required",
                            "phone" => "required"
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
            'name.required' => 'Bắt buộc phải nhập tên người dùng',
            'email.required' => 'Bắt buộc phải nhập Email',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Bắt buộc phải nhập Phone',
            'password.required' => 'Bắt buộc phải nhập Password',
            'role.required' => 'Bắt buộc phải phân quyền'
            
        ];
    }
}
