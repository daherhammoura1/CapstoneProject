<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class ClientInfo extends Model
{

    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'dob',
        'address',
        'zip',
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
