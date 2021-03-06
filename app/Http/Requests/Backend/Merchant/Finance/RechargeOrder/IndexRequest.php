<?php

namespace App\Http\Requests\Backend\Merchant\Finance\RechargeOrder;

use App\Http\Requests\BaseFormRequest;
use App\Models\User\FrontendUser;
use App\Models\User\UsersRechargeOrder;

/**
 * Class IndexRequest
 * @package App\Http\Requests\Backend\Merchant\Finance\RechargeOrder
 */
class IndexRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [
                                  UsersRechargeOrder::class,
                                  FrontendUser::class,
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
        $status = [
                   UsersRechargeOrder::STATUS_INIT,
                   UsersRechargeOrder::STATUS_SUCCESS,
                   UsersRechargeOrder::STATUS_EXPIRED,
                   UsersRechargeOrder::STATUS_REFUSE,
                  ];
        return [
                'is_online'          => 'required|integer|in:0,1',
                'mobile'             => 'string|size:11|regex:/^1[345789]\d{9}$/',//(手机号码第一位1第二位345789总共11位数字)
                'guid'               => 'string|size:7',
                'is_tester'          => 'integer|in:0,1',
                'status'             => 'integer|in:' . implode(',', $status),
                'created_at'         => 'array',
                'created_at.*'       => 'required|date',
                'order_no'           => 'string|min:1|max:128',
                'platform_no'        => 'string|min:1|max:128',
                'snap_merchant_no'   => 'string|min:1|max:128',
                'snap_merchant_code' => 'string|min:1|max:128',
                'snap_merchant'      => 'string|min:1|max:64',
                'finance_type_id'    => 'integer|min:1|exists:system_finance_types,id',
                'snap_account'       => 'string|min:1|max:128',
                'pageSize'           => 'integer|between:1,100',     //每页数据条数
               ];
    }

    /**
     * @return mixed[]
     */
    public function filters(): array
    {
        return ['created_at' => 'cast:array'];
    }
}
