<?php

namespace App\Http\Requests\Backend\Headquarters\Activity\SystemDynActivity;

use App\Http\Requests\BaseFormRequest;
use App\Models\Activity\ActivitiesDynSystem;

/**
 * Class StatusRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\Activity\SystemDynActivity
 */
class StatusRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [ActivitiesDynSystem::class];

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
                'id'     => 'required|exists:activities_dyn_systems,id',
                'status' => 'required|in:0,1',
               ];
    }
}
