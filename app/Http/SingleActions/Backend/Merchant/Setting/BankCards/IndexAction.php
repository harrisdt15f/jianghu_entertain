<?php

namespace App\Http\SingleActions\Backend\Merchant\Setting\BankCards;

use App\Http\SingleActions\MainAction;
use App\Models\User\FrontendUsersBankCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 用户银行卡-列表
 */
class IndexAction extends MainAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param FrontendUsersBankCard $frontendUsersBankCard 用户银行卡Model.
     * @param Request               $request               Request.
     * @throws \Exception Exception.
     */
    public function __construct(FrontendUsersBankCard $frontendUsersBankCard, Request $request)
    {
        parent::__construct($request);
        $this->model = $frontendUsersBankCard;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {

        $inputDatas['sign'] = $this->currentPlatformEloq->sign;
        $returnData         = $this->model
            ->filter($inputDatas)
            ->with(
                [
                 'bank.bank',
                 'user:id,mobile,guid',
                ],
            )
            ->select(['id', 'platform_sign', 'user_id', 'owner_name', 'bank_id', 'card_number', 'created_at'])
            ->paginate($this->perPage)
            ->toArray();
            
        $bankCards = [];
        foreach ($returnData['data'] as $item) {
            $data        = [
                            'id'          => $item['id'],
                            'guid'        => $item['user']['guid'] ?? null,
                            'owner_name'  => $item['owner_name'],
                            'card_number' => $item['card_number'],
                            'binding_num' => $item['binding_num'],
                            'bank_name'   => $item['bank']['bank']['name'] ?? null,
                            'mobile'      => $item['user']['mobile'] ?? null,
                            'created_at'  => $item['created_at'],
                           ];
            $bankCards[] = $data;
        }
        $returnData['data'] = $bankCards;
        return msgOut($returnData);
    }
}
