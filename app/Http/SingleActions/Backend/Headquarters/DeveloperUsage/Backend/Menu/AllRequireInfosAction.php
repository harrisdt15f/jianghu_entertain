<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Http\SingleActions\MainAction;
use App\Models\DeveloperUsage\Backend\SystemRoutesBackend;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/**
 * Class for menu all require infos action.
 */
class AllRequireInfosAction extends MainAction
{
    /**
     * @param  array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $routeCollection = Route::getRoutes()->getRoutes();
        if ((int) $inputDatas['type'] === 0) {
            $routeInfo = $this->_getAllRouteInfo($routeCollection);
        } else {
            $routeInfo = $this->_getRouteInfo($routeCollection, $inputDatas);
        }

        //$data['firstlevelmenus'] = $firstlevelmenus;
        //$data['editMenu'] = $editMenu;
        //$data['routeMatchingName'] = $routeMatchingName;
        $data = ['route_info' => $routeInfo];
        return msgOut($data);
    }

    /**
     * Gets the route information.
     *
     * @param array $routeCollection RouteCollection.
     * @param array $inputDatas      传递的参数.
     *
     * @return mixed[]
     */
    private function _getRouteInfo(array $routeCollection, array $inputDatas): array
    {
        $type        = [
                        1 => 'headquarters-api',
                        2 => 'merchant-api',
                        3 => 'app-api',
                       ];
        $routeEndKey = $type[$inputDatas['type']] ?? $type[1];
        //      firstlevelmenus = BackendSystemMenu::getFirstLevelList();

        //      editMenu = BackendSystemMenu::all();
        //      $routeMatchingName = $editMenu->where('route', '!=', '#')->keyBy('route')->toArray();
        $registeredRoute = SystemRoutesBackend::pluck('route_name');

        $routeInfo = [];

        foreach ($routeCollection as $route) {
            if (!isset($route->action['as'])
                || !isset($route->action['prefix'])
                || $route->action['prefix'] === '_debugbar'
                || preg_match('#^' . $routeEndKey . '#', $route->action['as']) !== 1
                || in_array($route->action['as'], (array) $registeredRoute)
            ) {
                continue;
            }

            $routeShortData = [
                               'url'        => $route->uri,
                               'controller' => $route->action['controller'],
                               'route_name' => $route->action['as'],
                              ];
            $routeInfo[]    = $routeShortData;
            //$routeInfo[$r->action['as']] = $r->uri;
        }
        return $routeInfo;
    }

    /**
     * Gets all route information.
     *
     * @param array $routeCollection RouteCollection.
     *
     * @return mixed[]
     */
    private function _getAllRouteInfo(array $routeCollection): array
    {
        $routeInfo = [];
        foreach ($routeCollection as $route) {
            if (!isset($route->action['as'])
                || !isset($route->action['prefix'])
                || $route->action['prefix'] === '_debugbar'
            ) {
                continue;
            }
            $routeShortData = [
                               'url'        => $route->uri,
                               'controller' => $route->action['controller'],
                               'route_name' => $route->action['as'],
                              ];
            $routeInfo[]    = $routeShortData;
        }
        return $routeInfo;
    }
}
