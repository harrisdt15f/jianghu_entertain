<?php

namespace App\Http\Requests\Frontend\Common;

use App\Http\Requests\BaseFormRequest;
use App\Models\User\FrontendUser;
use App\Rules\Frontend\SecurityCodeCheckRule;

/**
 * Class PasswordChangeRequest
 * @package App\Http\Requests\Frontend\Common
 */
class PasswordChangeRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [FrontendUser::class];

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
                'fund_password' => [
                                    'required',
                                    'regex:/^[0-9A-Za-z]{8,16}$/',//(英文字母||数字 8到16位)
                                    new SecurityCodeCheckRule($this),
                                   ],
                'password'      => [
                                    'required',
                                    'confirmed',
                                    'regex:/^[0-9A-Za-z]{8,16}$/',//(英文字母||数字 8到16位)
                                   ],
               ];
    }
}
