<?php

namespace App\Http\Requests\Backend\Headquarters\Finance\FinanceChannel;

use App\Http\Requests\BaseFormRequest;

/**
 * Class StatusDoRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\FinanceChannel
 */
class StatusDoRequest extends BaseFormRequest
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
        return [
                'id'     => 'required|exists:system_finance_channels,id',
                'status' => 'required|in:0,1',
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'id.required'     => 'ID不存在',
                'id.exists'       => 'ID不存在',
                'status.required' => '请选择状态',
                'status.in'       => '所选状态不存在',
               ];
    }
}
