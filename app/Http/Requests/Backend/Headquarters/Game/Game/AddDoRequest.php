<?php

namespace App\Http\Requests\Backend\Headquarters\Game\Game;

use App\Http\Requests\BaseFormRequest;
use App\Models\Game\Game;

/**
 * Class AddDoRequest
 *
 * @package App\Http\Requests\Backend\Headquarters\Game
 */
class AddDoRequest extends BaseFormRequest
{

    /**
     * 需要依赖模型中的字段备注信息
     * @var array<int,string>
     */
    protected $dependentModels = [Game::class];

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
                'type_id'      => 'required|exists:game_types,id',
                'vendor_id'    => 'required|exists:game_vendors,id',
                'name'         => 'required|max:64|unique:games,name',
                'sign'         => 'required|max:64|unique:games,sign|regex:/\w+/',//(字母+下划线)
                'request_mode' => 'required|integer|in:1,2',
                'status'       => 'required|in:0,1',
               ];
    }
}
