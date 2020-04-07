<?php

namespace App\Http\SingleActions\Backend\Merchant\Setting\PromotionPic;

use App\Http\SingleActions\MainAction;
use App\ModelFilters\System\SystemPromotionPicFilter;
use App\Models\Systems\SystemPromotionPic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 推广图片-列表
 */
class IndexAction extends MainAction
{

    /**
     * @var object
     */
    protected $model;

    /**
     * @param SystemPromotionPic $systemPromotionPic Model.
     * @param Request            $request            Request.
     * @throws \Exception Exception.
     */
    public function __construct(SystemPromotionPic $systemPromotionPic, Request $request)
    {
        parent::__construct($request);
        $this->model = $systemPromotionPic;
    }


    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $inputDatas['platform_id'] = $this->currentPlatformEloq->id;
        if (isset($inputDatas['pageSize'])) {
            $this->model->setPerPage($inputDatas['pageSize']);
        }
        $result = $this->model
            ->filter($inputDatas, SystemPromotionPicFilter::class)->with(
                [
                 'author',
                 'newer',
                ],
            )->paginate()->toArray();
        $data   = [];
        foreach ($result['data'] as $picDatas) {
            $data[] = [
                       'id'          => $picDatas['id'],
                       'pic'         => $picDatas['pic'],
                       'author'      => $picDatas['author']['name'] ?? '',
                       'last_editor' => $picDatas['newer']['name'] ?? '',
                       'created_at'  => $picDatas['created_at'],
                       'updated_at'  => $picDatas['updated_at'],
                      ];
        }
        $result['data'] = $data;
        return msgOut($result);
    }
}