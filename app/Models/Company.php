<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'logo',
        'website'
    ];

    /**
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
