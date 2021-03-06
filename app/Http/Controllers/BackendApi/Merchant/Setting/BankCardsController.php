<?php

namespace App\Http\Controllers\BackendApi\Merchant\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Merchant\Setting\BankCards\DeleteRequest;
use App\Http\Requests\Backend\Merchant\Setting\BankCards\IndexRequest;
use App\Http\SingleActions\Backend\Merchant\Setting\BankCards\BankListAction;
use App\Http\SingleActions\Backend\Merchant\Setting\BankCards\DeleteAction;
use App\Http\SingleActions\Backend\Merchant\Setting\BankCards\IndexAction;
use Illuminate\Http\JsonResponse;

/**
 * 银行卡反查
 */
class BankCardsController extends Controller
{

    /**
     * 用户银行卡-列表
     *
     * @param  IndexRequest $request Request.
     * @param  IndexAction  $action  Action.
     * @return JsonResponse
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * 银行-列表
     *
     * @param  BankListAction $action Action.
     * @return JsonResponse
     */
    public function bankList(BankListAction $action): JsonResponse
    {
        return $action->execute();
    }

    /**
     * 用户银行卡-删除
     *
     * @param  DeleteRequest $request Request.
     * @param  DeleteAction  $action  Action.
     * @return JsonResponse
     */
    public function delete(DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
