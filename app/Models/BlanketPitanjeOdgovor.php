<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BlanketPitanjeOdgovor extends Model
{
    protected $table = 'blanket_pitanje_odgovor';
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
    public function blanketPitanje()
    {
        return $this->belongsTo('App\Models\BlanketPitanje','blanket_pitanje_id','id');
    }
}
