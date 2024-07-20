<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Odgovor;
use App\Models\Pitanje;
use App\Models\Subject;
use App\Services\BlanketGeneratorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PitanjeController extends Controller
{
    public function dodajPitanje(Request $request)
    {
        $pitanje = Pitanje::create([
            'pitanje'=>'Kako?',
            'predmet_id'=>'1',
            'creator_id'=>Auth::id(),
        ]);
        $odgovor1 = new Odgovor([
            'odgovor'=>'a',
            'je_tacan'=>'1',
            'creator_id'=>Auth::id(),
        ]);
        $odgovor2 = new Odgovor([
            'odgovor'=>'b',
            'je_tacan'=>'0',
            'creator_id'=>Auth::id(),
        ]);
        $odgovor3 =new Odgovor([
            'odgovor'=>'c',
            'je_tacan'=>'0',
            'creator_id'=>Auth::id(),
        ]);
        $odgovor4 = new Odgovor([
            'odgovor'=>'d',
            'je_tacan'=>'0',
            'creator_id'=>Auth::id(),
        ]);
        $odgovori=[];
        $odgovori[0]=$odgovor1;
        $odgovori[1]=$odgovor2;
        $odgovori[2]=$odgovor3;
        $odgovori[3]=$odgovor4;
        $pitanje->createPitanje($pitanje,$odgovori);
    }

    public function generisiBlanket()
    {
        DB::enableQueryLog();
        $subjects = Subject::find(1);
        $s = app()->make(BlanketGeneratorService::class);
        $s->startForPredmet($subjects);
        $s->getBlanket(3);
        dd(DB::getQueryLog());
    }
}
