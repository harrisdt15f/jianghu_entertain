<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Merchant\Route;

use App\Http\SingleActions\MainAction;
use App\Models\DeveloperUsage\Merchant\SystemRoutesMerchant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 路由-编辑
 */
class EditAction extends MainAction
{

    /**
     * @var SystemRoutesMerchant
     */
    protected $model;

    /**
     * @param Request              $request              Request.
     * @param SystemRoutesMerchant $systemRoutesMerchant Model.
     */
    public function __construct(
        Request $request,
        SystemRoutesMerchant $systemRoutesMerchant
    ) {
        parent::__construct($request);
        $this->model = $systemRoutesMerchant;
    }

    /**
     * @param  array $inputDatas 接收的数据.
     * @throws \Exception Exception.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $routeEloq = $this->model->find($inputDatas['id']);
        if (!$routeEloq instanceof $this->model) {
            throw new \Exception('302301');
        }
        $routeEloq->fill($inputDatas);
        if (!$routeEloq->save()) {
            throw new \Exception('302302');
        }
        return msgOut(['title' => $routeEloq->title]);
    }
}
