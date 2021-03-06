<?php

namespace App\Http\Requests\Backend\Merchant\Game;

use App\Http\Requests\BaseFormRequest;

/**
 * Class UploadRequest
 * @package App\Http\Requests\Backend\Merchant\Game
 */
class UploadRequest extends BaseFormRequest
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
        return [
                'id'   => 'required|integer|min:1|exists:game_platforms,id',
                'icon' => 'required|string|min:1|max:256',
               ];
    }
}
