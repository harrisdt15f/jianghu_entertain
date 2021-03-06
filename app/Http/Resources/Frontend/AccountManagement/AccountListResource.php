<?php

namespace App\Http\Resources\Frontend\AccountManagement;

use App\Http\Resources\BaseResource;
use App\Models\Finance\SystemPlatformBank;
use Illuminate\Http\Request;

/**
 * Class SystemSlidesResource
 * @package App\Http\Resources\GamesLobby
 */
class AccountListResource extends BaseResource
{

    /**
     * @var integer $id ID.
     */
    private $id;

    /**
     * @var string $code Bank code.
     */
    private $code;

    /**
     * @var integer $type 账户类型.
     */
    private $type;

    /**
     * @var SystemPlatformBank $bank 银行卡信息.
     */
    private $bank;

    /**
     * @var string $owner_name Owner_name.
     */
    private $owner_name;

    /**
     * @var string $card_number_hidden Card number.
     */
    private $card_number_hidden;

    /**
     * Transform the resource into an array.
     *
     * @param  Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        unset($request);
        return [
                'id'                 => $this->id,
                'code'               => $this->code,         // 银行编码
                'type'               => $this->type,         // 账户类型
                'bank'               => $this->bank->bank->name ?? null, // 银行名称
                'owner_name'         => $this->owner_name,   // 名称
                'card_number_hidden' => $this->card_number_hidden, // 卡号
               ];
    }
}
