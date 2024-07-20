<?php

namespace App\Contracts;

use App\Models\Pitanje;
use App\Models\Subject;
use phpDocumentor\Reflection\Types\Integer;

interface BiracPitanjaInterface
{
    public function nextPitanje(Subject $predmet):Pitanje;
    public function reset():bool;

    public function brojDostupnihPitanja(Subject $predmet):int;

}
