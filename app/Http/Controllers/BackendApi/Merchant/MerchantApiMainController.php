<?php

namespace App\Http\Controllers\BackendApi\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Admin\MerchantAdminAccessGroup;
use App\Models\DeveloperUsage\Merchant\SystemRoutesMerchant;
use App\Models\DeveloperUsage\Menu\MerchantSystemMenu;
use App\Models\Systems\SystemPlatform;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

/**
 * 管理后台需要继承的控制器
 */
class MerchantApiMainController extends Controller
{

    /**
     * 传递的参数
     * @var array $inputs
     */
    public $inputs;

    /**
     * 当前的商户用户
     * @var object $currentAdmin
     */
    public $currentAdmin;

    /**
     * 当前商户存在的平台
     * @var App\Models\Systems\SystemPlatform $currentPlatformEloq
     */
    public $currentPlatformEloq;

    /**
     * 目前路由
     * @var \Illuminate\Routing\Route $currentOptRoute
     */
    protected $currentOptRoute;

    /**
     * 当前商户的权限组
     * @var MerchantAdminAccessGroup $currentAccessAdminGroup
     */
    public $currentAccessAdminGroup;

    /**
     * 当前商户的权限
     * @var array $adminAccessGroupDetail
     */
    public $adminAccessGroupDetail = [];

    /**
     * 目前所有的菜单为前端展示用的
     * @var array $menuLists
     */
    protected $menuLists;

    /**
     * 当前的路由名称
     * @var string $currentRouteName
     */
    protected $currentRouteName;

    /**
     * 是否有路由权限
     * @var boolean $routeAccessable
     */
    protected $routeAccessable = false;

    /**
     * 当前的logId
     * @var string $log_uuid
     */
    public $log_uuid;

    /**
     * 中间件
     * @var string $currentGuard
     */
    protected $currentGuard = 'merchant';

    /**
     * currentAuth
     * @var object $currentAuth
     */
    public $currentAuth;

    /**
     * @var Agent $userAgent
     */
    public $userAgent;

    /**
     * AdminMainController constructor.
     */
    public function __construct()
    {
        $this->_handleEndUser();
        $this->middleware(
            function ($request, $next) {
                $this->currentAuth = auth($this->currentGuard);
                $this->currentAdmin = $this->currentAuth->user();
                if ($this->currentAdmin !== null) {
                    //登录注册的时候是没办法获取到当前用户的相关信息所以需要过滤
                    $this->currentAccessAdminGroup = new MerchantAdminAccessGroup();
                    $this->currentPlatformEloq = new SystemPlatform();
                    if ($this->currentAdmin->accessGroup()->exists()) {
                        $this->currentPlatformEloq = $this->currentAdmin->platform;
                        $this->currentAccessAdminGroup = $this->currentAdmin->accessGroup;
                        $this->adminAccessGroupDetail = $this->currentAccessAdminGroup->detail->pluck('menu_id')->toArray();
                    }
                    $this->_menuAccess();
                    $this->_routeAccessCheck();
                    if ($this->routeAccessable === false) {
                        return msgOut($this->routeAccessable, [], '100001');
                    }
                }
                $this->inputs = Request::all(); //获取所有相关的传参数据
                $this->_adminOperateLog(); //登录注册的时候是没办法获取到当前用户的相关信息所以需要过滤
                return $next($request);
            },
        );
    }

    /**
     * 处理客户端
     * @return void
     */
    private function _handleEndUser(): void
    {
        $result = false;
        $open_route = [];
        $this->userAgent = new Agent();
        if ($this->userAgent->isDesktop()) {
            $open_route = SystemRoutesMerchant::where('is_open', 1)->pluck('method')->toArray();
            $result = true;
        } elseif (Request::header('from') === 'Lottery Center System v3.0.0.0') {
            $open_route = SystemRoutesMerchant::where('is_open', 1)->pluck('method')->toArray();
            $result = true;
        } else {
            Log::info('robot attacks: ' . json_encode(Request::all()) . json_encode(Request::header()));
            // echo '机器人禁止操作';
            die();
        }
        if ($result === true) {
            $this->middleware('auth:' . $this->currentGuard, ['except' => $open_route]);
        }
    }

    /**
     * 初始化所有菜单，目前商户该拥有的菜单与权限
     * @return void
     */
    private function _menuAccess(): void
    {
        $menuEloq = new MerchantSystemMenu();
         //目前所有的菜单为前端展示用的
        $this->menuLists = $menuEloq->getUserMenuDatas(
            $this->currentAccessAdminGroup->id,
            $this->adminAccessGroupDetail,
        );
    }

    /**
     * 检测目前的路由是否有权限访问
     * @return void
     */
    private function _routeAccessCheck(): void
    {
        $this->currentOptRoute = Route::getCurrentRoute();
        if ($this->currentOptRoute !== null) {
            $this->currentRouteName = $this->currentOptRoute->action['as']; //当前的route name;
            $routeEloq = SystemRoutesMerchant::where('route_name', $this->currentRouteName)->first();
            if ($routeEloq !== null) {
                if ($routeEloq->menu) {
                    $this->_accessGroupCheck($routeEloq->menu);
                }
            }
        }
    }

    /**
     * @param MerchantSystemMenu $menuEloq MerchantSystemMenu.
     * @return void
     */
    private function _accessGroupCheck(MerchantSystemMenu $menuEloq): void
    {
        if (in_array($menuEloq->id, $this->adminAccessGroupDetail)) {
            $this->routeAccessable = true;
        }
    }

    /**
     * 记录后台管理员操作日志
     * @return void
     */
    private function _adminOperateLog(): void
    {
        $this->log_uuid = Str::orderedUuid()->getNodeHex();
        $datas['input'] = $this->inputs;
        $datas['route'] = $this->currentOptRoute;
        $datas['log_uuid'] = $this->log_uuid;
        $logData = json_encode($datas, JSON_UNESCAPED_UNICODE);
        Log::channel('apibyqueue')->info($logData);
    }
}
