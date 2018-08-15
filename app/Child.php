<?php

namespace RP\Kiosk;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    /**
     * @var [type]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'godparenthood_id',
    ];

    public function debitEntries()
    {
        return $this->hasMany(DebitEntry::class)->orderBy('created_at', 'desc');
    }

    public function godparenthood()
    {
        return $this->belongsTo(Godparenthood::class);
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @return float
     */
    public function getAmountAttribute(): float
    {
        return $this->debitEntries->sum('value') ?? 0.0;
    }

    /**
     * @return float
     */
    public function getEarningsAttribute(): float
    {
        return abs($this->debitEntries->where('value', '<', 0)->sum('value')) ?? 0.0;
    }
}
