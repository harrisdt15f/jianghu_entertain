<?php

namespace App\Http\Controllers\FrontendApi\Common;

use App\Http\SingleActions\Common\Platform\CurrentSslAction;
use Illuminate\Http\JsonResponse;

/**
 * 平台相关
 * @package App\Http\Controllers\FrontendApi\Common
 */
class PlatformController
{

    /**
     * Personal information.
     * @param CurrentSslAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function currentSsl(CurrentSslAction $action): JsonResponse
    {
        return $action->execute();
    }
}
