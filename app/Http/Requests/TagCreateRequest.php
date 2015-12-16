<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagCreateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *判断用户是否已认证
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     ×创建匹配规则
     * @return array
     */
    public function rules()
    {
        return [
            'tag' => 'required|unique:tags,tag',
            'title' => 'required',
            'subtitle' => 'required',
            'layout' => 'required',
        ];
    }
}
