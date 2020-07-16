<?php

namespace App\Models;

use App\Models\Transcription;
use App\Models\Monologue;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Returns Monlogue relationship. 
     * 
     * @return Illuminate\Database\Eloquent\belongsToMany
     */
    public function monologues()
    {
        return $this->belongsToMany(Monologue::class);
    }

    /**
     * Returns transcription relationship. 
     * 
     * @return Illuminate\Database\Eloquent\belongsTo
     */
    public function transcription()
    {
        return $this->belongsTo(Transcription::class);
    }
}
