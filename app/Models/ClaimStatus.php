<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class ClaimStatus extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'name', 'color'
    ];
    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }
}
