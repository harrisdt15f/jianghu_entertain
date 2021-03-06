<?php

namespace App\Http\Requests\Backend\Merchant\Activity\Dynamic;

use App\Http\Requests\BaseFormRequest;
use App\Models\Activity\ActivitiesDynSystem;

/**
 * Class IndexRequest
 * @package App\Http\Requests\Backend\Merchant\Activity\Dynamic
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
                'name'     => 'string|min:1|max:16',
                'pageSize' => 'integer|between:1,100',     //每页数据条数
               ];
    }
}
