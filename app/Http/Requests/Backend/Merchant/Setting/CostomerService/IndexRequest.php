<?php

namespace App\Http\Requests\Backend\Merchant\Setting\CostomerService;

use App\Http\Requests\BaseFormRequest;

/**
 * 客服设置-列表
 */
class IndexRequest extends BaseFormRequest
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
        return ['type' => 'required|integer|in:1,2'];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'type.required' => '缺少客服类型',
                'type.integer'  => '客服类型必须是数字',
                'type.in'       => '客服类型数据非法',
               ];
    }
}
