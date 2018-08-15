<?php

namespace RP\Kiosk;

use Illuminate\Database\Eloquent\Model;

class Godparenthood extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    /**
     * @return float
     */
    public function getEarningsAttribute(): float
    {
        $earnings = 0.0;

        foreach ($this->children as $child) {
            $earnings += $child->earnings;
        }

        return (float)$earnings;
    }
}
