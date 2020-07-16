<?php

namespace App\Models;

use App\Models\Speaker;
use App\Models\Transcription;
use App\Models\MonologueElement;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Monologue extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Returns the line elements. 
     * 
     * @return Illuminate\Database\Eloquent\HasMany
     */
    public function elements()
    {
        return $this->hasMany(MonologueElement::class);
    }

    /**
     * Returns speakers.
     * 
     * @return Illuminate\Database\Eloquent\HasOne
     */
    public function speakers()
    {
        return $this->hasOne(Speaker::class);
    }

    /**
     * Returns transcription.
     * 
     * @return Illuminate\Database\Eloquent\belongsTo
     */
    public function transcription()
    {
        return $this->belongsTo(Transcription::class);
    }
}
