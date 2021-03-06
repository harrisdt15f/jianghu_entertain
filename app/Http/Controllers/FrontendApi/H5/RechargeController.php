<?php

namespace App\Http\Controllers\FrontendApi\H5;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\H5\Recharge\CancelRequest;
use App\Http\Requests\Frontend\H5\Recharge\ChannelsRequest;
use App\Http\Requests\Frontend\H5\Recharge\ConfirmRequest;
use App\Http\Requests\Frontend\H5\Recharge\LoadOnlineRequest;
use App\Http\Requests\Frontend\H5\Recharge\RechargeRequest;
use App\Http\Requests\Frontend\H5\Recharge\TypesRequest;
use App\Http\SingleActions\Frontend\H5\Recharge\CancelAction;
use App\Http\SingleActions\Frontend\H5\Recharge\ChannelsAction;
use App\Http\SingleActions\Frontend\H5\Recharge\ConfirmAction;
use App\Http\SingleActions\Frontend\H5\Recharge\GetFinanceInfoAction;
use App\Http\SingleActions\Frontend\H5\Recharge\LoadOnlineAction;
use App\Http\SingleActions\Frontend\H5\Recharge\RechargeAction;
use App\Http\SingleActions\Frontend\H5\Recharge\TypesAction;
use Illuminate\Http\JsonResponse;

/**
 * Class RechargeController
 * @package App\Http\Controllers\FrontendApi\H5
 */
class RechargeController extends Controller
{
    /**
     * 获取分类
     * @param TypesAction  $action  Action.
     * @param TypesRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function types(TypesAction $action, TypesRequest $request): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * 获取渠道
     * @param ChannelsAction  $action  Action.
     * @param ChannelsRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function channels(ChannelsAction $action, ChannelsRequest $request): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * 发起充值
     * @param RechargeAction  $action  Action.
     * @param RechargeRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function recharge(RechargeAction $action, RechargeRequest $request): JsonResponse
    {
        $inputData       = $request->validated();
        $inputData['ip'] = $request->ip();
        return $action->execute($inputData);
    }

    /**
     * 发起充值
     * @param LoadOnlineAction  $action  Action.
     * @param LoadOnlineRequest $request Request.
     * @throws \Exception Exception.
     * @return mixed
     */
    public function loadOnline(LoadOnlineAction $action, LoadOnlineRequest $request)
    {
        $inputData = $request->validated();
        $result    = $action->execute($inputData);
        if (isset($result['error_code'])) {
            return view('recharge.loadOnlineError', $result);
        }
        return view('recharge.loadOnline', $result);
    }

    /**
     * 获取分类与渠道.
     *
     * @param GetFinanceInfoAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function getFinanceInfo(GetFinanceInfoAction $action): JsonResponse
    {
        return $action->execute();
    }

    /**
     * 撤销订单.
     *
     * @param CancelAction  $action  Action.
     * @param CancelRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function cancel(
        CancelAction $action,
        CancelRequest $request
    ): JsonResponse {
        $inputData = $request->validated();
        return $action->execute($inputData);
    }

    /**
     * 确认付款.
     *
     * @param ConfirmAction  $action  Action.
     * @param ConfirmRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function confirm(
        ConfirmAction $action,
        ConfirmRequest $request
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
