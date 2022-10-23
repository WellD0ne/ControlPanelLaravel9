<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property string $uid
 * @property string $nameclient
 * @property string $password
 * @property string|null $remember_token
 * @property string $login
 * @property string $tpname
 * @property string $dateact
 * @property string $abonplata
 * @property string $ostatok
 * @property int $recmnd
 * @property string|null $ppay
 * @property string|null $pdate_end
 * @property int $pcountpermonth
 * @property string|null $last_pdate
 * @property string|null $last_active_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FinanceOperation[] $financeOperations
 * @property-read int|null $finance_operations_count
 * @property-read mixed $short_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbonplata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastActiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastPdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameclient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOstatok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePcountpermonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePdateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePpay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRecmnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTpname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUid($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'uid';
    protected $keyType = 'string';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_active_at'
    ];

    /**
     * Финансовые операции абонента
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financeOperations()
    {
        return $this->hasMany('App\Models\FinanceOperation', 'user_id', 'uid');
    }

    /**
     * Получение ФИО только с первыми буквами Имени и Отчества
     */
    public function getShortNameAttribute()
    {
        $fullName = $this->nameclient;

        $shortName = explode(" ", $fullName);
        if (count($shortName) === 1) {
            return $fullName;
        } elseif (count($shortName) === 2) {
            return $shortName[0] . " " . mb_substr($shortName[1], 0, 1) . ". ";
        } elseif (count($shortName) === 3) {
            return $shortName[0] . " " . mb_substr($shortName[1], 0, 1) . ". " . mb_substr($shortName[2], 0, 1) . ".";
        }
    }

    /**
     * Формат даты абон платы 'dateact'
     */
    public function getDateactAttribute($value)
    {
        return date("d.m.Y", strtotime($value));
    }

    /**
     * Формат даты обещанного платежа 'last_pdate'
     */
    public function getLastPdateAttribute($value)
    {
        return date("d.m.Y H:i", strtotime($value));
    }

    /**
     * Формат абонентской платы, ноль вместо NULL
     */
    public function getAbonplataAttribute($value)
    {
        if (is_null($value)) {
            $value = 0;
        }
        return $value;
    }

    /**
     * Считаем сумму для обещанного платежа
     */
    public function getRecmndAttribute($value)
    {
        if (Carbon::today()->diffInDays(Carbon::createFromDate($this->dateact), false) < 3) {
            return $value;
        } elseif ($this->ostatok < 0) {
            return round(abs($this->ostatok) + 2);
        } else {
            return 0;
        }
    }

}
