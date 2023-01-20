<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class Sale extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title', 'value', 'latitude', 'longitude','roaming', 'synced', 'created','user_id'
    ];

    protected $table = 'sales';

    protected $hidden = ['id'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
        'roaming' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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

    public function scopeRoaming($query)
    {
        return $query->where('roaming', true);
    }

}
