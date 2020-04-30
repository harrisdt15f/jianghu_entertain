<?php

namespace App\Http\Requests\Backend\Headquarters\DeveloperUsage\Schedule;

use App\Http\Requests\BaseFormRequest;
use App\Models\DeveloperUsage\TaskScheduling\CronJob;

/**
 * Class EditRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\DeveloperUsage\Schedule
 */
class EditRequest extends BaseFormRequest
{
    
    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [CronJob::class];
    
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
                'id'       => 'required|exists:cron_jobs', //任务ID
                'command'  => 'string|max:32',             //任务名称
                'param'    => 'array',                     //传递的参数
                'schedule' => 'string|max:32',             //执行时间cron表达式
                'status'   => 'integer|in:0,1',            //开启状态 0关闭 1开启
                'remarks'  => 'string|max:64',             //定时任务用意描述备注
               ];
    }

    /**
     * @return mixed[]
     */
    public function filters(): array
    {
        return ['param' => 'cast:array'];
    }
}
