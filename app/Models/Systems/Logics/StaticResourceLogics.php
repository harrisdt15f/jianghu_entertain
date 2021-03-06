<?php

namespace App\Models\Systems\Logics;

use App\Models\DeveloperUsage\TaskScheduling\CronJob;
use Illuminate\Support\Facades\Storage;

trait StaticResourceLogics
{
    /**
     * 保存定时任务json文件
     * @return void
     */
    public static function saveSchedule(): void
    {
        $jobs     = CronJob::where('status', CronJob::STATUS_OPEN)
            ->get(
                [
                 'command',
                 'schedule',
                 'argument',
                 'option',
                ],
            )
            ->toArray();
        $jobsJson = json_encode($jobs);
        $path     = self::getSchedulePath();
        Storage::disk(config('filesystems.default'))->put($path, $jobsJson);
    }

    /**
     * 定时任务json路径
     * @return string
     */
    public static function getSchedulePath(): string
    {
        return 'backend/static_resource/json/cron_job.json';
    }

    /**
     * 获取资源
     * @param  string $disk 磁盘.
     * @param  string $path 路径.
     * @return mixed
     */
    public static function getResource(string $disk, string $path)
    {
        return Storage::disk($disk)->get($path);
    }

    /**
     * 清理旧文件 与 数据
     * @param integer $id Id to find data.
     * @return boolean
     */
    public static function resourceClean(int $id): bool
    {
        $statusResourseEloq = self::find($id);
        if (!$statusResourseEloq instanceof self) {
            return false;
        }
        Storage::disk('json')->delete($statusResourseEloq->path);
        $statusResourseEloq->delete();
        return true;
    }
}
