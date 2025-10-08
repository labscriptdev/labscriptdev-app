<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class AppUser extends Model implements AuthenticatableContract
{
    use AuthenticatableTrait;

    protected $table = 'app_user';
    protected $fillable = ['name', 'email', 'keycloak_id'];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            if (AppConfig::get('secret.root_user_id')) return;
            AppConfig::set('secret.root_user_id', $model->id);
        });

        static::deleted(function ($model) {
            if ($model->id != AppConfig::get('secret.root_user_id')) return;
            AppConfig::set('secret.root_user_id', null);
        });
    }
}
