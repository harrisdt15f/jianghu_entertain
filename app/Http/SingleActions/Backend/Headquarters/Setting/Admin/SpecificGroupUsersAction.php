<?php

namespace App\Http\SingleActions\Backend\Headquarters\Setting\Admin;

use App\Http\SingleActions\MainAction;
use App\Models\Admin\BackendAdminUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class for specific group users action.
 */
class SpecificGroupUsersAction extends MainAction
{

    /**
     * @var BackendAdminUser
     */
    protected $model;

    /**
     * @param Request          $request          Request.
     * @param BackendAdminUser $backendAdminUser BackendAdminUser.
     */
    public function __construct(
        Request $request,
        BackendAdminUser $backendAdminUser
    ) {
        parent::__construct($request);
        $this->model = $backendAdminUser;
    }

    /**
     * @param  array $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        if (isset($inputDatas['pageSize'])) {
            $this->model->setPerPage($inputDatas['pageSize']);
        }
        $data = $this->model
            ->where('group_id', $inputDatas['id'])
            ->paginate();
        return msgOut($data);
    }
}
