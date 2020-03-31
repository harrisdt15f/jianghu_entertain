<?php

namespace App\Http\Requests\Backend\Headquarters\Setting\Admin;

use App\Http\Requests\BaseFormRequest;
use App\Models\Admin\BackendAdminAccessGroup;

/**
 *  Class for group destroy request.
 */
class GroupDestroyRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [BackendAdminAccessGroup::class];

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
                'id'         => 'required|numeric|exists:backend_admin_access_groups,id',
                'group_name' => 'required|exists:backend_admin_access_groups,group_name',
               ];
    }
}
