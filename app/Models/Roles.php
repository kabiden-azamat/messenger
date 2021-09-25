<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;

    protected $table = 'users_roles';

    protected $fillable = ['user_id', 'role'];

    public const USER_ROLE = 1;
    public const MODERATOR_ROLE = 2;
    public const ADMIN_ROLE = 3;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
