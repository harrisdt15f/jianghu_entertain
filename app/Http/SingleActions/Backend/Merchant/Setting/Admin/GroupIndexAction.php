<?php

namespace App\Http\SingleActions\Backend\Merchant\Setting\Admin;

use App\Http\SingleActions\MainAction;
use App\Models\Admin\MerchantAdminAccessGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class for group index action.
 */
class GroupIndexAction extends MainAction
{

    /**
     * @var object MerchantAdminAccessGroup
     */
    protected $model;

    /**
     * @param MerchantAdminAccessGroup $merchantAdminAccessGroup MerchantAdminAccessGroup.
     * @param Request                  $request                  Request.
     * @throws \Exception Exception.
     */
    public function __construct(
        MerchantAdminAccessGroup $merchantAdminAccessGroup,
        Request $request
    ) {
        parent::__construct($request);
        $this->model = $merchantAdminAccessGroup;
    }

    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(): JsonResponse
    {
        $filterArr = ['platform' => $this->currentPlatformEloq->sign];
        $data      = $this->model
            ->filter($filterArr)
            ->with('detail:group_id,menu_id')
            ->select(
                [
                 'id',
                 'group_name',
                 'created_at',
                ],
            )->paginate($this->perPage);
        return msgOut($data);
    }
}
