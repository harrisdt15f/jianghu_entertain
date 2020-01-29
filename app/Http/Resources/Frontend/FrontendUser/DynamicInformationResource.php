<?php

namespace App\Http\Resources\Frontend\FrontendUser;

use App\Models\User\FrontendUsersAccount;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * Class HomePersonalInformationResource
 * @package App\Http\Resources
 */
class DynamicInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        $balance = $this->account->balance;
        $rank    = FrontendUsersAccount::where('balance', '>', $balance)->count();
        $result  = [
                    'score'          => 1440,
                    'grade'          => 'VIP8',
                    'experience'     => 5200,
                    'weekly_gift'    => $this->specificInfo->weekly_gift,
                    'promotion_gift' => $this->specificInfo->promotion_gift,
                    'balance'        => $this->account->balance,
                    'rich_rank'      => $rank + 1,
                   ];
        return $result;
    }
}
