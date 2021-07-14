<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id'
    ];

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id', 'company_id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return ucwords(
            $this->first_name . ' ' . $this->last_name
        );
    }

    /**
     * @return string
     */
    public function getContractedAtAttribute(): string
    {
        return $this->created_at->format('d/m/Y');
    }
}
