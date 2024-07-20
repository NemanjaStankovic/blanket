<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odgovor extends Model
{
    protected $table = 'odgovor';
    protected $fillable = [
        'odgovor',
        'je_tacan',
        'creator_id',
    ];

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
    public function pitanje()
    {
        return $this->belongsTo(Pitanje::class, 'pitanje_id', 'id');
    }
}
