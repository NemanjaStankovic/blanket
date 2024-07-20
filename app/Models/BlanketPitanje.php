<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlanketPitanje extends Model
{
    protected $table = 'blanket_pitanje';
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->creator_id = auth()->id();
        });
        static::updating(function ($model) {
            $model->editor_id = auth()->id();
        });
    }
    public function blanketPitanjaOdgovor():HasMany
    {
        return $this->hasMany(BlanketPitanjeOdgovor::class, 'blanket_pitanje_id', 'id');
    }

    public function blanket()
    {
        return $this->belongsTo(Blanket::class, 'blanket_id','id');
    }
}
