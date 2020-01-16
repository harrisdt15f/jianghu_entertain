<?php

namespace App\Http\Requests\Backend\Merchant\Notice\Carousel;

use App\Http\Requests\BaseFormRequest;
use App\Models\Notice\NoticeCarousel;
use App\Services\FactoryService;

/**
 * Class AddDoRequest
 * @package App\Http\Requests\Backend\Merchant\Notice\Carousel
 */
class AddDoRequest extends BaseFormRequest
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
     * @return mixed[]
     */
    public function rules(): array
    {
        $const = FactoryService::getInstence()->generateService('constant');
        return [
                'title'      => 'required',
                'pic'        => 'required',
                'type'       => 'required|in:' . NoticeCarousel::TYPE_INSIDE . ',' . NoticeCarousel::TYPE_OUTER,
                'link'       => 'required_if:type,' . NoticeCarousel::TYPE_INSIDE,
                'start_time' => 'required|date',
                'end_time'   => 'required|date|after:start_time',
                'status'     => 'required|in:' . $const::STATUS_DISABLE . ',' . $const::STATUS_NORMAL,
                'device'     => 'required|in:' . $const::DEVICE_PC . ',' . $const::DEVICE_H5 . ',' . $const::DEVICE_APP,
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'title.required'      => '请填写公告标题',
                'pic.required'        => '请上传轮播图片',
                'type.required'       => '请选择轮播类型',
                'type.in'             => '所选轮播类型不在范围内',
                'link.required_if'    => '请填写跳转地址',
                'start_time.required' => '请选择开始时间',
                'start_time.date'     => '开始时间格式不正确',
                'end_time.required'   => '请选择结束时间',
                'end_time.date'       => '结束时间格式不正确',
                'end_time.after'      => '结束时间必须大于开始时间',
                'status.required'     => '请选择状态',
                'status.in'           => '所选状态不在范围内',
                'device.required'     => '请选择设备',
                'device.in'           => '所选设备不在范围内',
               ];
    }
}
