<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';

    protected $fillable = [
        'name',
        'description',
        'summary',
        'icon',
        'is_favorites',
        'owner',
        'status',
        'priority',
    ];
}
