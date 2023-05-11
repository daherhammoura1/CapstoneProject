<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Claim extends Model

{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'hospital_id',
        'statement',
        'policy_id',
        'status_id',
        'description',

    ];

    public function  status(): BelongsTo
    {
        return $this->belongsTo(ClaimStatus::class);
    }
    public function  policy(): BelongsTo
    {
        return $this->belongsTo(Policy::class);
    }
    public function  hospital(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
