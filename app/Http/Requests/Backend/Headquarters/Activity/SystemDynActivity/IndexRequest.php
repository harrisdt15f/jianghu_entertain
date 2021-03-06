<?php

namespace App\Http\Requests\Backend\Headquarters\Activity\SystemDynActivity;

use App\Http\Requests\BaseFormRequest;
use App\Models\Activity\ActivitiesDynSystem;

/**
 * Class IndexRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\Activity\SystemDynActivity
 */
class IndexRequest extends BaseFormRequest
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
                'status'   => 'in:0,1',
                'name'     => 'string',
                'pageSize' => 'integer|between:1,100', //每页数据条数
               ];
    }
}
