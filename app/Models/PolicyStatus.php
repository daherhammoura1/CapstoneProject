<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class PolicyStatus extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'name','color'
    ];

    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class);
    }
}