<?php

namespace App\Services;

use \App\Contracts\BiracPitanjaInterface;
use \App\Models\Blanket;
use App\Models\BlanketPitanje;
use App\Models\BlanketPitanjeOdgovor;
use App\Models\Pitanje;
use App\Models\Subject;
use Illuminate\Support\Collection;

class BlanketGeneratorService
{
    private $biracPitanja;
    private $predmet;
    public function __construct(BiracPitanjaInterface $biracPitanja)
    {
        $this->biracPitanja = $biracPitanja;
    }

    /**
     *
     * @param int $brojPitanja
     * @return Blanket
     * @throws Exception
     */
    public function getBlanket(int $brojPitanja): Blanket
    {
        if($this->predmet==null)
            throw new \Exception("startForPredmet mora da bude pozvan");
        if($brojPitanja>$this->biracPitanja->brojDostupnihPitanja($this->predmet))
        {
                throw new \Exception("Nema dovoljno pitanja za popunjavanje blanketa");
        }
        $blanket = new Blanket();
        if($blanket->listaPitanja==null)
            $blanket->listaPitanja = new Collection();
        for($i=0;$i<$brojPitanja;$i++) {
            $blanketPitanje = $this->biracPitanja->nextPitanje($this->predmet);
            $blanket->listaPitanja->push($blanketPitanje);
        }
        $blanket->predmet_id = $this->predmet->id;
        $this->biracPitanja->reset($this->predmet);

        $blanket->predmet_id = $this->predmet->id;
        $blanket->naziv = 'Blanket123';
        $blanket->save();
        $redosled=1;
        foreach ($blanket->listaPitanja as $bp)
        {
            $blanketPitanje = new BlanketPitanje();
            $blanketPitanje->redosled = $redosled;
            $blanketPitanje->pitanje = $bp->pitanje;
            $blanket->blanketPitanja()->save($blanketPitanje);
            $redosled_odg=1;
            $bp->odgovori=$bp->odgovori->shuffle();
            foreach($bp->odgovori as $odgovori)
            {
                $pom = new BlanketPitanjeOdgovor();
                $pom->odgovor=$odgovori->odgovor;
                $pom->je_tacan=$odgovori->je_tacan;
                $pom->redosled=$redosled_odg;
                $blanketPitanje->blanketPitanjaOdgovor()->save($pom);
                $redosled_odg++;
            }
            $redosled++;
        }
        return $blanket;
    }
    public function startForPredmet(Subject $predmet):bool
    {
        $this->predmet = $predmet;
        return true;
    }
}
