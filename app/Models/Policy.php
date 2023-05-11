<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;





class Policy extends Model

{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'policynumber',
        'policy_creation_date',
        'policy_expiry_date',
        'policy_status_id',
        'policy_type_id',
        'user_id',
        'discount',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function  type(): BelongsTo
    {
        return $this->belongsTo(PolicyType::class, 'policy_type_id');
    }
    public function  status(): BelongsTo
    {
        return $this->belongsTo(PolicyStatus::class, 'policy_status_id');
    }
}
