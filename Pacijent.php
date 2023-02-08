<?php

require_once 'db.php';

class pacijent
{
    public $id;
    public $imep;
    public $prezimep;
    public $dijagnoza;
    public $terapija;
    public $godine;
    public $lekar_id;

    public function __construct($id, $imep, $prezimep, $dijagnoza, $terapija, $godine, $lekar_id)
    {
        $this->id = $id;
        $this->imep = $imep;
        $this->prezimep = $prezimep;
        $this->dijagnoza = $dijagnoza;
        $this->godine = $godine;
        $this->terapija = $terapija;
        $this->lekar_id = $lekar_id;
    }

    public function dodajNovog($pacijent)
    {
        $db = new DB();
        $upit = "insert into pacijent values (NULL, '$pacijent->imep', '$pacijent->prezimep', '$pacijent->dijagnoza', '$pacijent->terapija',
        '$pacijent->godine', '$pacijent->lekar_id')";

        $rez = $db->connection->query($upit);
        if ($rez) {
            return true;
        } else {
            return false;
        }
    }
}