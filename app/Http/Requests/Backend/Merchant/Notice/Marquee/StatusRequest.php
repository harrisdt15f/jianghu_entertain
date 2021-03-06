<?php

namespace App\Http\Requests\Backend\Merchant\Notice\Marquee;

use App\Http\Requests\BaseFormRequest;
use App\Lib\Constant\JHHYCnst;
use App\Models\Notice\NoticeMarquee;

/**
 * Class StatusRequest
 * @package App\Http\Requests\Backend\Merchant\Notice\Marquee
 */
class StatusRequest extends BaseFormRequest
{

    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [NoticeMarquee::class];
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
                'id'     => 'required|integer|exists:notice_marquees',
                'status' => 'required|integer|in:' . JHHYCnst::STATUS_DISABLE . ',' . JHHYCnst::STATUS_OPEN,
               ];
    }
}
