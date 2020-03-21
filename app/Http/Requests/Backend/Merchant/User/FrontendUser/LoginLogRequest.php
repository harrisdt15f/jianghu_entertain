<?php

namespace App\Http\Requests\Backend\Merchant\User\FrontendUser;

use App\Http\Requests\BaseFormRequest;
use App\Models\User\UsersLoginLog;

/**
 * 用户登陆记录
 */
class LoginLogRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [UsersLoginLog::class];

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
                'mobile'        => ['regex' => 'regex:/^1[345789]\d{9}$/'], //(手机号码第一位1第二位345789总共11位数字)
                'guid'          => 'string|max:16',                         //用户UID
                'create_at'     => 'string',                                //登陆时间
                'last_login_ip' => 'ip',                                    //登陆IP
               ];
    }
}
