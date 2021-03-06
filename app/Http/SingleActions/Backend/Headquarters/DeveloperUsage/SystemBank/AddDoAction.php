<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\SystemBank;

use App\Models\Finance\SystemPlatformBank;
use App\Models\Systems\SystemPlatform;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class AddDoAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\SystemBank
 */
class AddDoAction extends BaseAction
{
    
    /**
     * @param  array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $flag = false;
        try {
            $inputDatas['author_id'] = $this->user->id;
            DB::beginTransaction();
            $this->model->fill($inputDatas);
            if ($this->model->save()) {
                $lastId    = $this->model->id;
                $platforms = SystemPlatform::get(['sign as platform_sign'])->toArray();
                $data      = [];
                foreach ($platforms as $platform) {
                    $platform['bank_id'] = $lastId;
                    $data[]              = $platform;
                }
                SystemPlatformBank::insert($data);
                $flag = true;
            }
        } catch (\Throwable $exception) {
            $flag = false;
        }
        if (!$flag) {
            DB::rollBack();
            throw new \Exception('300900');
        }
        DB::commit();
        return msgOut();
    }
}
