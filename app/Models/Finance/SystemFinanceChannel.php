<?php

namespace App\Models\Finance;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;
use App\Models\User\UsersRechargeOrder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class SystemFinanceChannel
 * @package App\Models\Finance
 */
class SystemFinanceChannel extends BaseModel
{

    public const STATUS_YES = 1;
    public const STATUS_NO  = 0;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public static $fieldDefinition = [
                                      'type_id'        => '所属金流分类ID',
                                      'vendor_id'      => '所属金流厂商ID',
                                      'name'           => '金流通道名称',
                                      'sign'           => '金流通道标记',
                                      'request_mode'   => '金流通道请求模式',
                                      'banks_code'     => '金流通道银行码',
                                      'status'         => '金流通道状态',
                                      'desc'           => '金流通道描述',
                                      'author_id'      => '创建人ID',
                                      'last_editor_id' => '最后编辑人ID',
                                      'created_at'     => '创建时间',
                                      'updated_at'     => '更新时间',
                                     ];

    /**
     * @return BelongsTo
     */
    public function lastEditor(): BelongsTo
    {
        return $this->belongsTo(BackendAdminUser::class, 'last_editor_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(BackendAdminUser::class, 'author_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(SystemFinanceVendor::class, 'vendor_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(SystemFinanceType::class, 'type_id', 'id');
    }

    /**
     * @param UsersRechargeOrder $order    UsersRechargeOrder.
     * @param integer|null       $callback Callback.
     * @return \Illuminate\Contracts\Foundation\Application|mixed|null
     */
    public function getChannelClass(UsersRechargeOrder $order, ?int $callback = 0)
    {
        $vendor = $this->vendor;
        if (!$vendor instanceof SystemFinanceVendor) {
            return null;
        }
        $platform           = ucfirst(Str::camel($vendor->sign));
        $payConfigClassName = 'App\\Finance\\Pay\\' . $platform . 'Platform\\' . $platform . 'Pay';
        $param              = [
                               'channel'  => $this,
                               'order'    => $order,
                               'callback' => $callback,
                              ];
        return resolve($payConfigClassName, $param);
    }
}
