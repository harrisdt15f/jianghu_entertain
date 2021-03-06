<?php

namespace App\Http\Requests\Backend\Merchant\User\Commission;

use App\Http\Requests\BaseFormRequest;
use App\Models\User\UsersCommissionConfig;
use App\Models\User\UsersCommissionConfigDetail;

/**
 * 洗码设置-编辑
 */
class EditRequest extends BaseFormRequest
{
    
    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [
                                  UsersCommissionConfig::class,
                                  UsersCommissionConfigDetail::class,
                                 ];

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
                'id'      => 'required|integer|exists:users_commission_configs', //ID
                'bet'     => 'required|numeric|gte:0',                           //打码量
                'percent' => 'required|numeric|gte:0',                           //洗码比例
               ];
    }
}
