<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
                    case 'lands_email':
                        $rules = [
                            "name" => "required",
                            "email" => "required|email",
                            "phone" => "required",
                            "message" => "required",
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
            'name.required' => 'Bắt buộc phải nhập Name',
            'email.required' => 'Bắt buộc phải nhập Email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Bắt buộc phải nhập Phone',
            'message.required' => 'Bắt buộc phải nhập Message'
            
        ];
    }
}
