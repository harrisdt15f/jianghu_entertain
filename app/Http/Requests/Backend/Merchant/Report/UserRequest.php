<?php

namespace App\Http\Requests\Backend\Merchant\Report;

use App\Http\Requests\BaseFormRequest;
use App\Models\Report\ReportDayUser;

/**
 * 个人报表-列表
 */
class UserRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [ReportDayUser::class];

    /**
     * @var array 自定义字段 【此字段在数据库中没有的字段字典】
     */
    protected $extraDefinition = ['project_day' => '起止时间'];

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
                'mobile'       => 'string|size:11|regex:/^1[345789]\d{9}$/', //(手机号码第一位1第二位345789总共11位数字)
                'guid'         => 'string|size:8',                           //会员UID
                'report_day'   => 'array|size:2',                            //日期
                'report_day.*' => 'date|date_format:Y-m-d',                  //日期
                'pageSize'     => 'integer|between:1,100',                   //每页数据条数
               ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return mixed[]
     */
    public function filters(): array
    {
        return ['report_day' => 'cast:array'];
    }
}
