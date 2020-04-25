<?php

namespace App\Http\SingleActions\Backend\Merchant\User\FrontendUser;

use App\Http\SingleActions\MainAction;
use App\Models\User\UsersLoginLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 会员登陆记录
 */
class LoginLogAction extends MainAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param UsersLoginLog $usersLoginLog 用户登陆记录Model.
     * @param Request       $request       Request.
     * @throws \Exception Exception.
     */
    public function __construct(UsersLoginLog $usersLoginLog, Request $request)
    {
        parent::__construct($request);
        $this->model = $usersLoginLog;
    }

    /**
     * @param array $inputDatas 接收的数据.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        if (isset($inputDatas['pageSize'])) {
            $this->model->setPerPage($inputDatas['pageSize']);
        }
        $inputDatas['platformSign'] = $this->currentPlatformEloq->sign;
        $data                       = $this->model
            ->filter($inputDatas)
            ->paginate();
        return msgOut($data);
    }
}
