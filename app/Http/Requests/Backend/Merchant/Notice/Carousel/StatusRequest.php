<?php

namespace App\Http\Requests\Backend\Merchant\Notice\Carousel;

use App\Http\Requests\BaseFormRequest;
use App\Services\FactoryService;

/**
 * Class StatusRequest
 * @package App\Http\Requests\Backend\Merchant\Notice\Carousel
 */
class StatusRequest extends BaseFormRequest
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
                'id'     => 'required|integer|exists:notice_carousels',
                'status' => 'required|integer|in:' . $const::STATUS_DISABLE . ',' . $const::STATUS_NORMAL,
               ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
                'id.required'     => 'ID不存在',
                'id.exists'       => 'ID不存在',
                'status.required' => '请选择状态',
                'status.in'       => '所选状态不在范围内',
               ];
    }
}
