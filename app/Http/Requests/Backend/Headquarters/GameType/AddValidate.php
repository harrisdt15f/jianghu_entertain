<?php

namespace App\Http\Requests\Backend\Headquarters\GameType;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddValidate
 * @package App\Http\Requests\Backend\Headquarters\GameType
 */
class AddValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|unique:games_types,name',
                'sign' => ['required','regex:/\w+/','unique:games_types,sign'],
            ];
        }
        return [];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写游戏种类名称',
            'name.unique' => '游戏种类名称已存在',
            'sign.required' => '请填写游戏种类标记',
            'sign.regex' => '游戏种类标记只能包含数字,字母,下划线',
            'sign.unique' => '游戏种类标记已存在',
        ];
    }
}
