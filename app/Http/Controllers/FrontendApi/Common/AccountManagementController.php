<?php

namespace App\Http\Controllers\FrontendApi\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Common\FrontendUser\AccountDestroyRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\AliPayBindingRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\AliPayFirstBindingRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\BankCardBindingRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\BankCardFirstBindingRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\ReportRequest;
use App\Http\Requests\Frontend\Common\FrontendUser\WithdrawalRequest;
use App\Http\SingleActions\Frontend\Common\AccountManagement\AccountDestroyAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\AccountListAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\AliPayBindingAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\BankCardBindingAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\FundPasswordCheckAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\ReportAction;
use App\Http\SingleActions\Frontend\Common\AccountManagement\WithdrawalAction;
use App\Http\SingleActions\Frontend\Common\VerificationCode\PrivateVerificationCodeAction;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountManagementController
 * @package App\Http\Controllers\FrontendApi\Common
 */
class AccountManagementController extends Controller
{

    /**
     * User account List.
     * @param AccountListAction $action User account list action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function accountList(AccountListAction $action): JsonResponse
    {
        return $action->execute();
    }

    /**
     * Binding bank card.
     * @param BankCardBindingAction  $action  BankCardBindingAction.
     * @param BankCardBindingRequest $request BankCardAddRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function bankCardBinding(
        BankCardBindingAction $action,
        BankCardBindingRequest $request
    ): JsonResponse {
        return $action->execute($request);
    }

    /**
     * Binding bank card.
     * @param BankCardBindingAction       $action  BankCardBindingAction.
     * @param BankCardFirstBindingRequest $request BankCardFirstBindingRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function bankCardFirstBinding(
        BankCardBindingAction $action,
        BankCardFirstBindingRequest $request
    ): JsonResponse {
        return $action->firstExecute($request);
    }

    /**
     *  Binding AliPay.
     * @param AliPayBindingAction  $action  AliPayBindingAction.
     * @param AliPayBindingRequest $request AliPayAddRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function aliPayBinding(
        AliPayBindingAction $action,
        AliPayBindingRequest $request
    ): JsonResponse {
        return $action->execute($request);
    }

    /**
     *  First binding AliPay.
     * @param AliPayBindingAction       $action  AliPayBindingAction.
     * @param AliPayFirstBindingRequest $request AliPayFirstBindingRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function aliPayFirstBinding(
        AliPayBindingAction $action,
        AliPayFirstBindingRequest $request
    ): JsonResponse {
        return $action->firstExecute($request);
    }

    /**
     *  Destroy account.
     * @param AccountDestroyAction  $action  AccountDestroyAction.
     * @param AccountDestroyRequest $request AccountDestroyRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function accountDestroy(
        AccountDestroyAction $action,
        AccountDestroyRequest $request
    ): JsonResponse {
        return $action->execute($request);
    }

    /**
     * Account fund password check.
     * @param FundPasswordCheckAction $action FundPasswordCheckAction.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function fundPasswordCheck(FundPasswordCheckAction $action): JsonResponse
    {
        return $action->execute();
    }

    /**
     * Account withdraw.
     * @param WithdrawalAction  $action  WithdrawalAction.
     * @param WithdrawalRequest $request WithdrawalRequest.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function withdrawal(WithdrawalAction $action, WithdrawalRequest $request): JsonResponse
    {
        return $action->execute($request);
    }

    /**
     * Get verification code when deleting account.
     * @param PrivateVerificationCodeAction $action PrivateVerificationCodeAction.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function accountDestroyVerificationCode(
        PrivateVerificationCodeAction $action
    ): JsonResponse {
        return $action->execute();
    }

    /**
     * Account report.
     * @param ReportRequest $request ReportRequest.
     * @param ReportAction  $action  ReportAction.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function report(ReportRequest $request, ReportAction $action): JsonResponse
    {
        $validated = $request->validated();
        return $action->execute($validated);
    }
}
