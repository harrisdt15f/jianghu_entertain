<?php

namespace App\Http\Requests\Backend\Merchant\User\UsersTag;

use App\Http\Requests\BaseFormRequest;
use App\Models\User\UsersTag;

/**
 * 用户标签-编辑
 */
class EditRequest extends BaseFormRequest
{
    
    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [UsersTag::class];
    
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
                'id'          => 'required|exists:users_tags', //ID
                'title'       => 'required|string|max:10',     //标签名称
                'no_withdraw' => 'required|integer|in:0,1',    //是否禁止提现 0否 1是
                'no_login'    => 'required|integer|in:0,1',    //是否禁止登陆 0否 1是
                'no_play'     => 'required|integer|in:0,1',    //是否禁止游戏 0否 1是
                'no_promote'  => 'required|integer|in:0,1',    //是否禁止推广 0否 1是
               ];
    }

    // /**
    //  * @return mixed[]
    //  */
    // public function messages(): array
    // {
    //     return [

    //     ];
    // }
}
