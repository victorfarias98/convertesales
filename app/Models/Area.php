<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Area extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'title'
    ];

    protected $table = 'areas';

    protected $hidden = ['id'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Generate a new UUID for the model.
     *
     * @return string
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
