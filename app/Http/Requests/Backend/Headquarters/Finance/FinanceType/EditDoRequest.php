<?php

namespace App\Http\Requests\Backend\Headquarters\Finance\FinanceType;

use App\Http\Requests\BaseFormRequest;

/**
 * Class EditDoRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\Finance\FinanceType
 */
class EditDoRequest extends BaseFormRequest
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
        $thisId = $this->get('id');
        return [
                'id'        => 'required|exists:system_finance_types,id',
                'name'      => 'required|unique:system_finance_types,name,' . $thisId,
                'sign'      => 'required|unique:system_finance_types,sign,' . $thisId . '|regex:/\w+/',//(字母+下划线)
                'is_online' => 'required|in:0,1',
                'direction' => 'required|in:0,1',
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'id.required'        => 'ID不存在',
                'id.exists'          => 'ID不存在',
                'name.required'      => '请填写分类名称',
                'name.unique'        => '分类名称已存在',
                'sign.required'      => '请填写分类标记',
                'sign.unique'        => '分类标记已存在',
                'sign.regex'         => '分类标记只能包含数字,字母,下划线',
                'is_online.required' => '请选择是否是线上金流',
                'is_online.in'       => '是否是线上金流不正确',
                'direction.required' => '请选择金流方向',
                'direction.in'       => '金流方向不正确',
               ];
    }
}
