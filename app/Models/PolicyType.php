<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class PolicyType extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];
    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class);
    }
}
