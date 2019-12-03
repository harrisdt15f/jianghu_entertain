<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Illuminate\Http\JsonResponse;

/**
 * Class for menu edit action.
 */
class EditAction
{
    /**
     * @var BackendSystemMenu
     */
    protected $model;

    /**
     * @param BackendSystemMenu $backendSystemMenu Model.
     */
    public function __construct(BackendSystemMenu $backendSystemMenu)
    {
        $this->model = $backendSystemMenu;
    }

    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $parent = false;
        if (isset($inputDatas['is_parent']) && (int) $inputDatas['is_parent'] === 1) {
            $parent = true;
        }
        $menuEloq = $this->model::find($inputDatas['menu_id']);
        if ($menuEloq) {
            $menuEloq->label = $inputDatas['label'];
            $menuEloq->en_name = $inputDatas['en_name'];
            $menuEloq->display = $inputDatas['display'];
            $menuEloq->icon = $inputDatas['icon'] ?? null;
            if ($parent === true) {
                $menuEloq->route = '#';
                $menuEloq->pid = 0;
            } else {
                $menuEloq->route = $inputDatas['route'];
                $menuEloq->pid = $inputDatas['parent_id'];
            }
            $data = $menuEloq->toArray();
            if ($menuEloq->save()) {
                return msgOut(true, $data);
            } else {
                throw new \Exception('300000');
            }
        } else {
            throw new \Exception('300000');
        }
    }
}