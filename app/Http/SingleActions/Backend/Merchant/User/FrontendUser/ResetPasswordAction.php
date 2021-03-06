<?php

namespace App\Http\SingleActions\Backend\Merchant\User\FrontendUser;

use App\Models\User\FrontendUser;
use Illuminate\Http\JsonResponse;

/**
 * 重置密码
 */
class ResetPasswordAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param FrontendUser $frontendUser 用户Model.
     */
    public function __construct(FrontendUser $frontendUser)
    {
        $this->model = $frontendUser;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     * @throws \RuntimeException Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $user           = $this->model->where('guid', $inputDatas['guid'])->first();
        $user->password = bcrypt($inputDatas['password']);
        $user->update();
        return msgOut();
    }
}
