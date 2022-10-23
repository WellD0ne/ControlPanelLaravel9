<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinanceOperation
 *
 * @property int $op_id
 * @property int $user_id
 * @property int $owner_id
 * @property int $op_type
 * @property string $op_date
 * @property int $op_summa
 * @property int $op_card_id
 * @property string $system_date
 * @property string $number
 * @property int $balance_buh
 * @property string $descr
 * @property int|null $finance
 * @property int $isbuhdoc
 * @property int $end_user
 * @property-read \App\Models\FinanceType|null $financeType
 * @method static \Database\Factories\FinanceOperationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereBalanceBuh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereEndUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereFinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereIsbuhdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOpCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOpDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOpSumma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOpType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereSystemDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceOperation whereUserId($value)
 * @mixin \Eloquent
 */
class FinanceOperation extends Model
{
    use HasFactory;

    protected $primaryKey = 'op_id';

    public $timestamps = false;

    public function financeType()
    {
        return $this->hasOne('App\Models\FinanceType', 'type_id', "op_type");
    }

    public function getOpDateAttribute($value)
    {
        return date("d.m.Y", strtotime($value));
    }

    public function getOpSummaAttribute($value)
    {
        return sprintf("%01.2f", $value/10000000000);
    }

    public function getBalanceBuhAttribute($value)
    {
        return sprintf("%01.2f", $value/10000000000);
    }
}
