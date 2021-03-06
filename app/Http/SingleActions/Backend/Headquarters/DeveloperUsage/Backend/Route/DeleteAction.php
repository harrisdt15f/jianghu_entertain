<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Route;

use App\Http\SingleActions\MainAction;
use App\Models\DeveloperUsage\Backend\SystemRoutesBackend;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 路由-删除
 */
class DeleteAction extends MainAction
{

    /**
     * @var SystemRoutesBackend
     */
    protected $model;

    /**
     * @param Request             $request             Request.
     * @param SystemRoutesBackend $systemRoutesBackend Model.
     */
    public function __construct(
        Request $request,
        SystemRoutesBackend $systemRoutesBackend
    ) {
        parent::__construct($request);
        $this->model = $systemRoutesBackend;
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
        $title = $routeEloq->title;
        if (!$routeEloq->delete()) {
            throw new \Exception('302303');
        }
        return msgOut(['title' => $title]);
    }
}
