<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Http\SingleActions\MainAction;
use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class for menu delete action.
 */
class GetAllMenuAction extends MainAction
{

    /**
     * @var BackendSystemMenu
     */
    protected $model;

    /**
     * @param Request           $request           Request.
     * @param BackendSystemMenu $backendSystemMenu Model.
     */
    public function __construct(
        Request $request,
        BackendSystemMenu $backendSystemMenu
    ) {
        parent::__construct($request);
        $this->model = $backendSystemMenu;
    }

    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(): JsonResponse
    {
        $data   = $this->model->forStar();
        $msgOut = msgOut($data);
        return $msgOut;
    }
}
