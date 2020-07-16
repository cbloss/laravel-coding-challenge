<?php

namespace App\Models;

use App\Models\Speaker;
use App\Models\Monologue;
use Illuminate\Database\Eloquent\Model;

class Transcription extends Model
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
     * @return Illuminate\Database\Eloquent\HasMany
     */
    public function monologues()
    {
        return $this->hasMany(Monologue::class);
    }
    
    /**
     * Returns the Speakers. 
     * 
     * @return Illuminate\Database\Eloquent\HasMany
     */
    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}
