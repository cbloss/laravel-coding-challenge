<?php

namespace App\Models;

use App\Models\Speaker;
use App\Models\Monologue;
use Illuminate\Database\Eloquent\Model;

class MonologueElement extends Model
{
    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Returns the Monologue. 
     * 
     * @return Illuminate\Database\Eloquent\belongsTo
     */
    public function monologue()
    {
        return $this->belongsTo(Monologue::class);
    }
}
