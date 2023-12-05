<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'file_id',
        'action'
    ];

    public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function File():BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
