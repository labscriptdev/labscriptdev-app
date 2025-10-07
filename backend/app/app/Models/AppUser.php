<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class AppUser extends Model
{
    protected $table = 'app_user';
    protected $fillable = ['name', 'email', 'keycloak_id'];

    // protected function casts(): array
    // {
    //     return [
    //         'password' => 'hashed',
    //     ];
    // }
}
