<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                    case 'banner_add':
                        $rules = [
                            "name_banner" => "required",
                            "id_news" => "required",
                            // "images" => "required",
                        ];
                        break;
                    case 'banner_update':
                        $rules = [
                            "name_banner" => "required",
                            "id_news" => "required",
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
            'name_banner.required' => 'Bạn phải nhập tên banner',
            'id_news.required' => 'Bạn phải chọn bài viết',
            
        ];
    }
}

