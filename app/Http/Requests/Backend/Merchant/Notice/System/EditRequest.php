<?php

namespace App\Http\Requests\Backend\Merchant\Notice\System;

use App\Http\Requests\BaseFormRequest;
use App\Services\FactoryService;

/**
 * Class EditRequest
 * @package App\Http\Requests\Backend\Merchant\Notice\System
 */
class EditRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return mixed[]
     */
    public function rules(): array
    {
        $const = FactoryService::getInstence()->generateService('constant');
        return [
                'id'         => 'required|exists:notice_systems,id',
                'title'      => 'required',
                'h5_pic'     => 'string',
                'app_pic'    => 'string',
                'pc_pic'     => 'string',
                'start_time' => 'required|date',
                'end_time'   => 'required|date|after:start_time',
                'status'     => 'required|in:' . $const::STATUS_DISABLE . ',' . $const::STATUS_NORMAL,
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'id.required'         => 'ID不存在',
                'id.exists'           => 'ID不存在',
                'title.required'      => '请填写公告标题',
                'start_time.required' => '请选择开始时间',
                'start_time.date'     => '开始时间格式不正确',
                'end_time.required'   => '请选择结束时间',
                'end_time.date'       => '结束时间格式不正确',
                'end_time.after'      => '结束时间必须大于开始时间',
                'status.required'     => '请选择状态',
                'status.in'           => '所选状态不在范围内',
               ];
    }
}