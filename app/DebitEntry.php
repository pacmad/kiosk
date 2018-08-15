<?php

namespace RP\Kiosk;

use Illuminate\Database\Eloquent\Model;

class DebitEntry extends Model
{
    /**
     * @var [type]
     */
    protected $fillable = [
        'value',
        'child_id',
    ];
}
