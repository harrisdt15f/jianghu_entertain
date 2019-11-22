<?php

namespace App\Http\Requests\Backend\Headquarters\FinanceVendor;

use App\Http\Requests\BaseFormRequest;

/**
 * Class AddDoRequest
 * @package App\Http\Requests\Backend\Headquarters\FinanceVendor
 */
class AddDoRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|unique:system_finance_vendors,name',
                'sign' => ['required', 'unique:system_finance_vendors,sign', 'regex:/\w+/'],
                'whitelist_ips' => 'array',
                'whitelist_ips.*' => 'ip',
            ];
        }
        return [];
    }

    /**
     * @return array
     */
    public function messages():array
    {
        return [
            'name.required' => '请填写厂商名称',
            'name.unique' => '厂商名称已存在',
            'sign.required' => '请填写厂商标记',
            'sign.unique' => '厂商标记已存在',
            'sign.regex' => '厂商标记只能包含数字,字母,下划线',
            'whitelist_ips.array' => 'ip白名单为数组格式',
            'whitelist_ips.*.ip' => 'ip格式不正确',
        ];
    }
    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'whitelist_ips' => 'cast:array',
        ];
    }
}
