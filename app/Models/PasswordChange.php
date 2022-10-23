<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PasswordChange
 *
 * @property int $id
 * @property string $login
 * @property int $uid
 * @property string $new_plain
 * @property string $new_password
 * @property int $is_held
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereIsHeld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereNewPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereNewPlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordChange whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PasswordChange extends Model
{
    use HasFactory;
}
