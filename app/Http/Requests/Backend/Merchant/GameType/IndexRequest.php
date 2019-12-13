<?php

namespace App\Http\Requests\Backend\Merchant\GameType;

use App\Http\Requests\BaseFormRequest;

/**
 * Class IndexRequest
 * @package App\Http\Requests\Backend\Merchant\GameType
 */
class IndexRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize() :bool
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
        return [
            'device' => 'required|in:1,2,3',
            'status' => 'in:0,1',
            'name' => 'string',
        ];
    }

    /**
     * @return array
     */
    public function messages():array
    {
        return [
            'device.required' => '请选择设备',
            'device.in' => '所选设备不再范围内',
            'status.in' => '所传状态不在范围内',
            'name.string' => '名称不符合规则',
        ];
    }
}