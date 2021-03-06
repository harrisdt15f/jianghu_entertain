<?php

namespace App\Http\Resources\Frontend\GamesLobby;

use App\Http\Resources\BaseResource;
use App\Models\User\FrontendUsersSpecificInfo;
use Illuminate\Http\Request;

/**
 * Class HomePersonalInformationResource
 * @package App\Http\Resources
 */
class PersonalInformationResource extends BaseResource
{

    /**
     * @var integer $guid Guid.
     */
    private $guid;

    /**
     * @var FrontendUsersSpecificInfo $specificInfo SpecificInfo.
     */
    private $specificInfo;

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
                'guid'     => $this->guid,
                'avatar'   => $this->specificInfo->avatar_full,
                'nickname' => $this->specificInfo->nickname,
               ];
    }
}
