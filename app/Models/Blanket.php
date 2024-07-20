<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Blanket extends Model
{
    protected $table = 'blanket';
    public $listaPitanja;

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
    public function blanketPitanja():HasMany
    {
        return $this->hasMany(BlanketPitanje::class, 'blanket_id', 'id');
    }

}
