<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Route;

use App\Http\SingleActions\MainAction;
use App\Models\DeveloperUsage\Backend\SystemRoutesBackend;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 路由-添加
 */
class DoAddAction extends MainAction
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
        $this->model->fill($inputDatas);
        if (!$this->model->save()) {
            throw new \Exception('302300');
        }
        return msgOut(['title' => $this->model->title]);
    }
}
