<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\Platform;

use App\Models\Systems\SystemDomain;
use Illuminate\Http\JsonResponse;
use App\ModelFilters\System\SystemDomainFilter;

/**
 * Class for merchant admin user do add action.
 */
class DomainDetailAction
{

    /**
     * @var SystemDomain
     */
    protected $model;

    /**
     * @param SystemDomain $systemDomain 域名.
     */
    public function __construct(SystemDomain $systemDomain)
    {
        $this->model = $systemDomain;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $data = $this->model->filter($inputDatas, SystemDomainFilter::class)->get()->toArray();
        return msgOut(true, $data);
    }
}
