<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppUserNotification extends Model
{
    use HasFactory, ModelTrait;

    protected $table = 'app_user_notification';

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'url',
        'text',
    ];

    public function searchQuery($query, $request)
    {
        if ($request->status) {
            $query->where('status', $request->status);
        }

        return $query;
    }

    public function appUser(): HasOne
    {
        return $this->hasOne(AppUser::class, 'id', 'user_id');
    }
}
