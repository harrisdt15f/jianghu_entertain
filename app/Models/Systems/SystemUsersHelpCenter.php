<?php

namespace App\Models\Systems;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 帮助设置
 */
class SystemUsersHelpCenter extends BaseModel
{

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public static $fieldDefinition = [
                                      'id'     => '帮助设置ID',
                                      'title'  => '帮助设置标题',
                                      'pic'    => '帮助设置图片',
                                      'type'   => '帮助设置所属客户端',
                                      'status' => '帮助设置状态',
                                     ];

    /**
     * 作者
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        $author = $this->belongsTo(BackendAdminUser::class, 'add_admin_id', 'id');
        return $author;
    }

    /**
     * 最后更新人
     * @return BelongsTo
     */
    public function newer(): BelongsTo
    {
        $newer = $this->belongsTo(BackendAdminUser::class, 'add_admin_id', 'id');
        return $newer;
    }
}
