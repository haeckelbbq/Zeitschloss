<?php


class Spielfeld
{
    private int $id;
    private int $spielbrett_id;
    private bool $kartennebel;
    private int $x;
    private int $y;
    private array $gegenstaende = [];
    private NSC $nsc;
    private Character $character;

    /**
     * @param array $gegenstaende
     */
    public function setGegenstaende(array $gegenstaende): void
    {
        $this->gegenstaende = $gegenstaende;
    }

    /**
     * Spielfeld constructor.
     * @param int $id
     * @param int $spielbrett_id
     * @param bool $kartennebel
     * @param int $x
     * @param int $y
     */

    public function __construct(int $id, int $spielbrett_id, bool $kartennebel, int $x, int $y)
    {
        $this->id = $id;
        $this->spielbrett_id = $spielbrett_id;
        $this->kartennebel = $kartennebel;
        $this->x = $x;
        $this->y = $y;
        $this->loadGegenstaende();
//        $this->loadGegenstand(1); //##
        $this->loadNSC();
        $this->loadCharacter();
    }

    /**
     * @param Gegenstand $gegenstand
     */
    public function setGegenstand(Gegenstand $gegenstand): void
    {
        $this->gegenstand = $gegenstand;
    }

    /**
     * @param NSC $nsc
     */
    public function setNSC(NSC $nsc): void
    {
        $this->nsc = $nsc;
    }

    /**
     * @param Character $character
     */
    public function setCharacter(Character $character): void
    {
        $this->character = $character;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function aktualisieren() : void {

    }

    public static function loadSpielfelder(Spielbrett $spielbrett) : void
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM t_spielfeld WHERE spielbrett_id = :spielbrett_id';
            $sth = $dbh->prepare($sql);
            $spielbrett_id = $spielbrett->getId();
            $sth->bindParam('spielbrett_id', $spielbrett_id, PDO::PARAM_INT);
            $sth->execute();
            $spielfelder = $sth->fetchAll(PDO::FETCH_FUNC, 'Spielfeld::buildFromPDO');
            $spielbrett->setSpielfelder($spielfelder);
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

        public static function buildFromPDO(int $id, int $spielbrett_id, bool $kartennebel, int $x, int $y) : Spielfeld // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        return new Spielfeld($id, $spielbrett_id, $kartennebel, $x, $y);
    }

    private function loadGegenstaende():void
    {
        Gegenstand::getGegenstaendeBySpielfeld($this);
    }

    private function loadNSC():void
    {
        NSC::getNSCBySpielfeldId($this);
    }

    private function loadCharacter():void
    {
        Character::getCharacterBySpielfeldId($this);
    }
}