<?php

namespace App\Http\SingleActions\Backend\Merchant\User\UserGrade;

use App\Http\SingleActions\MainAction;
use App\Models\User\FrontendUserLevel;
use App\Models\User\UsersCommissionConfigDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 用户等级-删除
 */
class DeleteAction extends MainAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param FrontendUserLevel $usersGrade 用户等级Model.
     * @param Request           $request    Request.
     * @throws \Exception Exception.
     */
    public function __construct(FrontendUserLevel $usersGrade, Request $request)
    {
        parent::__construct($request);
        $this->model = $usersGrade;
    }

    /**
     * @param array $inputDatas 接收的数据.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        //检查当前平台的这条数据是否存在。
        $currentUsersGrade = $this->model->where(
            [
             [
              'id',
              $inputDatas['id'],
             ],
             [
              'platform_sign',
              $this->currentPlatformEloq->sign,
             ],
            ],
        )->first();
        if (!$currentUsersGrade) {
            throw new \Exception('200704');
        }
        DB::beginTransaction();
        //修改该等级的用户等级ID = null
        if ($currentUsersGrade->users->isNotEmpty()) {
            $users      = $currentUsersGrade->users();
            $updateUser = $users->update(['level_id' => null]);
            if (!$updateUser) {
                DB::rollback();
                throw new \Exception('200706');
            }
        }
        //删除该等级的洗码设置数据
        UsersCommissionConfigDetail::where('grade_id', $currentUsersGrade->id)->delete();
        //删除这条等级数据。
        if (!$currentUsersGrade->delete()) {
            DB::rollback();
            throw new \Exception('200705');
        }
        DB::commit();
        return msgOut();
    }
}
