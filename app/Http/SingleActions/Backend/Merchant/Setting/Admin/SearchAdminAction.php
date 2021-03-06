<?php

namespace App\Http\SingleActions\Backend\Merchant\Setting\Admin;

use App\Http\SingleActions\MainAction;
use App\Models\Admin\MerchantAdminUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class for search admin action.
 */
class SearchAdminAction extends MainAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param MerchantAdminUser $merchantAdminUser MerchantAdminUser.
     * @param Request           $request           Request.
     * @throws \Exception Exception.
     */
    public function __construct(MerchantAdminUser $merchantAdminUser, Request $request)
    {
        parent::__construct($request);
        $this->model = $merchantAdminUser;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $inputDatas['platform'] = $this->currentPlatformEloq->sign;
        $data                   = $this->model
            ->filter($inputDatas)
            ->get(['id', 'name', 'email', 'status', 'group_id', 'created_at'])
            ->toArray();
        return msgOut($data);
    }
}
