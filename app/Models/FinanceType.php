<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinanceType
 *
 * @property int $type_id
 * @property string $op_name
 * @property int $op_sign
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType whereOpName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType whereOpSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceType whereTypeId($value)
 * @mixin \Eloquent
 */
class FinanceType extends Model
{
    use HasFactory;

    protected $table = 'fin_types';

    protected $primaryKey = 'type_id';

    public $timestamps = false;
}
