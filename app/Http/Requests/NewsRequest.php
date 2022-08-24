<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                    case 'news_add':
                        $rules = [
                            "lbds_id" => "required",
                            "title_news" => "required",
                            "content_news" => "required",
                            // "images" => "required",
                        ];
                        break;
                    case 'news_update':
                        $rules = [
                            "lbds_id" => "required",
                            "title_news" => "required",
                            "content_news" => "required",
                            // "images" => "required",
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
            'lbds_id.required' => 'Bắt buộc phải chọn danh mục tin tức',
            'title_news.required' => 'Bắt buộc phải nhập Tiêu đề',
            'content_news.required' => 'Bắt buộc phải nhập nội dung bài viết',          
        ];
    }
}
