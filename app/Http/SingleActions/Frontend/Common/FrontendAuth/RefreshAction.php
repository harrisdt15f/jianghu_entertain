<?php

namespace App\Http\SingleActions\Frontend\Common\FrontendAuth;

use App\Http\SingleActions\MainAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

/**
 * Class RefreshAction
 * @package App\Http\SingleActions\Common\FrontendAuth
 */
class RefreshAction extends MainAction
{
    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(): JsonResponse
    {
        $token          = $this->auth->refresh();
        $expireInMinute = $this->auth->factory()->getTTL();
        $expireAt       = Carbon::now()->addMinutes($expireInMinute)->format('Y-m-d H:i:s');
        $data           = [
                           'access_token' => $token,
                           'token_type'   => 'Bearer',
                           'expires_at'   => $expireAt,
                          ];
        return msgOut($data);
    }
}
