<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;


class Unit extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title' ,  'latitude', 'longitude', 'area_id'
    ];

    protected $table = 'units';

    #protected $hidden = ['id'];

    public $incrementing = false;

    protected $keyType = 'string';
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double'
    ];
    /**
     * Generate a new UUID for the vmmfck,.f.dç~wefkw jfmfovm krnfkfmfnm kmodel.
     *
     * @return string
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


}
