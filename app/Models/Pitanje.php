<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class Pitanje extends Model
{
    protected $table = 'pitanje';

    protected $fillable = [
        'pitanje',
        'predmet_id',
        'creator_id',
        'id',
        'editor_id',
        'created_at',
        'updated_at',
        'je_tacan',
    ];
    private $listaOdgovora;
    private $tacanOdgovor;
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
    public function  odgovori():hasMany
    {
        return $this->hasMany(Odgovor::class, 'pitanje_id', 'id');
    }
    public function  tacanOdgovor():hasMany
    {
        return $this->hasMany(Odgovor::class, 'pitanje_id', 'id')->where('je_tacan', true);
    }
    public function isValid(): bool
    {
        if($this->tacanOdgovor()->count()!=1) // && $this->listaOdgovora->count()<>4
            return false;
        return true;
    }

    public function createPitanje($pitanje, $odgovori): Pitanje
    {
        $pitanje->save();
        foreach ($odgovori as $odgovor)
        {
            $pitanje->odgovori()->save($odgovor);
        }
        if(!$pitanje->isValid())
            throw new Exception("Pitanje nenalezena");
        return $pitanje;
    }

}
