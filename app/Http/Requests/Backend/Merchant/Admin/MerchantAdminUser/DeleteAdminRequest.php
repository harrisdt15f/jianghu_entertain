<?php

namespace App\Http\Requests\Backend\Merchant\Admin\MerchantAdminUser;

use App\Http\Requests\BaseFormRequest;

/**
 * Class for delete admin request.
 */
class DeleteAdminRequest extends BaseFormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:merchant_admin_users',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => '缺少管理员ID',
            'id.exists' => '管理员不存在',
        ];
    }
}