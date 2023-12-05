<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'user_id',
        'group_id',
        'file',
        // 'modify'
    ];

    public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Group():BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
