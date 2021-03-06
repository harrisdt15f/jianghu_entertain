<?php

namespace App\Http\Middleware;

use App\Lib\Crypt\AesCrypt;
use App\Lib\Crypt\RsaCrypt;
use App\Lib\Route\JHHYRoutes;
use App\Models\Systems\SystemDomain;
use Closure;
use Illuminate\Http\Request;

/**
 * 数据加密
 */
class Crypt
{

    /**
     * 当前平台
     * @var mixed
     */
    private $currentPlatformEloq;

    /**
     * 当前平台的SSL
     * @var mixed
     */
    private $currentSSL;

    /**
     * Handle an incoming request.
     * @param Request $request 传递的参数.
     * @param Closure $next    Closure.
     * @throws \Exception Exception.
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //获取当前域名所属平台
        $this->_getCurrentPlatform($request);
        //查看是否 有些路由是提供给外部的情况
        $getcurrentRouteInfo = JHHYRoutes::validateRoute();
        //系统配置为不加密传输数据时直接放行
        $configCryptStatus = configure($this->currentPlatformEloq->sign, 'is_crypt_data');
        $isCryptData       = $getcurrentRouteInfo['exposure_status'] === 1 ? 0 : $configCryptStatus;
        $request->attributes->add(['is_crypt_data' => $isCryptData]);
        $request->attributes->add(['currentRouteInfos' => $getcurrentRouteInfo]);// 传递到 RouteAuth 层 继续处理该处理的任务。
        if (!$isCryptData) {
            //配置为不加密数据时传递的数据还是加密的，则返回100607让前端刷新该加密配置
            $domain       = getReferrerDomain();
            $domainExist  = SystemDomain::where('domain', $domain)->exists();
            $requsetCount = $request->attributes->count();
            $status       = ($domainExist && ($requsetCount === 1) && $request->has('data'));
            if ($status) {
                throw new \Exception('100607');
            }
            return $next($request);
        }
        //空参放行
        if (count($request->request) === 0) {
            return $next($request);
        }

        //数据解密处理
        $this->_dataHandle($request);
        return $next($request);
    }

    /**
     * 获取当前域名所属平台
     * @param  Request $request Request.
     * @throws \Exception Exception.
     * @return void
     */
    private function _getCurrentPlatform(Request $request): void
    {
        $this->currentPlatformEloq = getCurrentPlatform($request);
        $this->currentSSL          = $this->currentPlatformEloq->sslKey;
        if ($this->currentSSL === null) {
            throw new \Exception('100602');
        }
        $request->attributes->add(['current_platform_eloq' => $this->currentPlatformEloq]);
        $request->attributes->add(['current_platform_ssl' => $this->currentSSL]);
    }

    /**
     * @param  Request $request 传递的参数.
     * @throws \Exception Exception.
     * @return void
     */
    private function _dataHandle(Request $request): void
    {
        //验证传输的数据是否合法
        $inData = $request->input('data');
        if (!$inData) {
            throw new \Exception('100606');
        }
        if (!is_string($inData)) {
            throw new \Exception('100600');
        }
        $requestCryptData = explode($this->currentSSL->interval_str_first, $inData);
        if (!is_array($requestCryptData) || count($requestCryptData) !== 3) {
            throw new \Exception('100601');
        }
        //开始数据解密   0加密的数据  1加密数据的值  2加密数据的键
        $data     = $requestCryptData[0];
        $aesCrypt = new RsaCrypt();
        $aesCrypt->setPrivateKey($this->currentSSL->private_key_first);
        $iValue    = $aesCrypt->rsaDeCrypt($requestCryptData[1]);
        $iKey      = $aesCrypt->rsaDeCrypt($requestCryptData[2]);
        $aesCrypt  = new AesCrypt($iKey, $iValue);
        $deAesData = $aesCrypt->aesDecrypt($data);
        $deData    = json_decode($deAesData, true);
        if (!$deData) {
            throw new \Exception('100604');
        }
        //给request重新赋值并删除加密的data数据
        $request->replace($deData);
        $request->attributes->add(['crypt_data' => $inData]);
        unset($request['data']);
    }
}
