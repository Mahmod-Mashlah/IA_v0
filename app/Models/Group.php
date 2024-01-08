<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name'
    ];

    public function Admin():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function Users()
    {
        return $this->belongsToMany(User::class, 'group_user')->withPivot ('created_at','updated_at');
    }

    public function Files()
    {
        return $this->hasMany(File::class);
    }
}
