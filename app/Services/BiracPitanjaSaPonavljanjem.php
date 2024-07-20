<?php

namespace App\Services;

use App\Contracts\BiracPitanjaInterface;
use App\Models\Pitanje;
use App\Models\Subject;

class BiracPitanjaSaPonavljanjem implements BiracPitanjaInterface
{
    private $pitanja=null;
    public function __constructor()
    {
    }

    public function reset():bool
    {
        unset($this->pitanja);
        return true;
    }

    public function  init(Subject $predmet)
    {
        $this->pitanja = Pitanje::where('predmet_id', $predmet->id)->get();
        $this->pitanja=$this->pitanja->shuffle();
//        $this->pitanja=$this->pitanja->all();
        return $this->pitanja;
    }
    public function nextPitanje(Subject $predmet) : Pitanje
    {
        if($this->pitanja==null)
            $this->init($predmet);
        $pitanje = $this->pitanja->pop();
        //$this->pitanja = $this->pitanja->all();
//        $pitanje->odgovori();
//        $pitanje->tacanOdgovor();
        return $pitanje;
    }

    public function brojDostupnihPitanja(Subject $predmet): int
    {
        if(!isset($this->pitanja) || $this->pitanja==null)
            $this->init($predmet);
        if($this->pitanja!=null)
            return count($this->pitanja);
        else
            return 0;
    }
}

