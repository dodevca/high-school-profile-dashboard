<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory;

    protected $table = 'majors';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    public function facility(): HasMany
    {
        return $this->hasMany(Facility::class);
    }

    public function module(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
