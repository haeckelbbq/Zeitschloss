<?php


class Character
{
    private int $id;
    private string $name;
    private int $spielfeld_id;
    private int $leben;
    private int $ausdauer;
    private int $schaden;
    private int $schutz;
    private bool $geschlecht;
    private string $klasse;
    private int $attrSt;
    private int $attrGe;
    private int $attrIn;
    private int $attrWa;
    private int $attrCh;
    private int $attrGl;
    private int $fertigkeit1;
    private int $fertigkeit2;
    private string $talent1;
    private string $talent2;
    private int $ep;
    private string $aktuelleWaffe;
    private string $aktuelleRuest;

    /**
     * Character constructor.
     * @param int $id
     * @param string $name
     * @param int $spielfeld_id
     * @param int $leben
     * @param int $ausdauer
     * @param int $schaden
     * @param int $schutz
     * @param bool $geschlecht
     * @param string $klasse
     * @param int $attrSt
     * @param int $attrGe
     * @param int $attrIn
     * @param int $attrWa
     * @param int $attrCh
     * @param int $attrGl
     * @param int $fertigkeit1
     * @param int $fertigkeit2
     * @param string $talent1
     * @param string $talent2
     * @param int $ep
     * @param string $aktuelleWaffe
     * @param string $aktuelleRuest
     */

    public function __construct(int $id, string $name, int $spielfeld_id, int $leben, int $ausdauer, int $schaden, int $schutz,
                                bool $geschlecht, string $klasse, int $attrSt, int $attrGe, int $attrIn, int $attrWa, int $attrCh,
                                int $attrGl, int $fertigkeit1, int $fertigkeit2, string $talent1, string $talent2, int $ep,
                                string $aktuelleWaffe, string $aktuelleRuest)
    {
        $this->id = $id;
        $this->name = $name;
        if (isset($spielfeld_id)){
            $this->spielfeld_id = $spielfeld_id;
        }
        $this->leben = $leben;
        $this->ausdauer = $ausdauer;
        $this->schaden = $schaden;
        $this->schutz = $schutz;
        $this->geschlecht = $geschlecht;
        $this->klasse = $klasse;
        $this->attrSt = $attrSt;
        $this->attrGe = $attrGe;
        $this->attrIn = $attrIn;
        $this->attrWa = $attrWa;
        $this->attrCh = $attrCh;
        $this->attrGl = $attrGl;
        $this->fertigkeit1 = $fertigkeit1;
        $this->fertigkeit2 = $fertigkeit2;
        $this->talent1 = $talent1;
        $this->talent2 = $talent2;
        $this->ep = $ep;
        $this->aktuelleWaffe = $aktuelleWaffe;
        $this->aktuelleRuest = $aktuelleRuest;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return int
     */
    public function getSpielfeldId(): int
    {
        return $this->spielfeld_id;
    }
    /**
     * @return int
     */
    public function getLeben(): int
    {
        return $this->leben;
    }
    /**
     * @return int
     */
    public function getAusdauer(): int
    {
        return $this->ausdauer;
    }
    /**
     * @return int
     */
    public function getSchaden(): int
    {
        return $this->schaden;
    }
    /**
     * @return int
     */
    public function getSchutz(): int
    {
        return $this->schutz;
    }
    /**
     * @return bool
     */
    public function isGeschlecht(): bool
    {
        return $this->geschlecht;
    }
    /**
     * @return string
     */
    public function getKlasse(): string
    {
        return $this->klasse;
    }
    /**
     * @return int
     */
    public function getAttrSt(): int
    {
        return $this->attrSt;
    }
    /**
     * @return int
     */
    public function getAttrGe(): int
    {
        return $this->attrGe;
    }
    /**
     * @return int
     */
    public function getAttrIn(): int
    {
        return $this->attrIn;
    }
    /**
     * @return int
     */
    public function getAttrWa(): int
    {
        return $this->attrWa;
    }
    /**
     * @return int
     */
    public function getAttrCh(): int
    {
        return $this->attrCh;
    }
    /**
     * @return int
     */
    public function getAttrGl(): int
    {
        return $this->attrGl;
    }
    /**
     * @return string
     */
    public function getFertigkeit1(): int
    {
        return $this->fertigkeit1;
    }
    /**
     * @return string
     */
    public function getFertigkeit2(): int
    {
        return $this->fertigkeit2;
    }
    /**
     * @return string
     */
    public function getTalent1(): string
    {
        return $this->talent1;
    }
    /**
     * @return string
     */
    public function getTalent2(): string
    {
        return $this->talent2;
    }
    /**
     * @return int
     */
    public function getEp(): int
    {
        return $this->ep;
    }
    /**
     * @return string
     */
    public function getAktuelleWaffe(): string
    {
        return $this->aktuelleWaffe;
    }
    /**
     * @return string
     */
    public function getAktuelleRuest(): string
    {
        return $this->aktuelleRuest;
    }

    public static function getCharacterBySpielfeldId(Spielfeld $spielfeld): void
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM t_character WHERE spielfeld_id = :spielfeld_id';
            $sth = $dbh->prepare($sql);
            $spielfeld_id = $spielfeld->getId();
            $sth->bindParam('spielfeld_id', $spielfeld_id, PDO::PARAM_INT);
            $sth->execute();
            $characters = $sth->fetchAll(PDO::FETCH_FUNC, 'Character::buildFromPDO');
            if (isset($characters[0])){
                $spielfeld->setCharacter($characters[0]);
            }
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function buildFromPDO(int $id, string $name, int $spielfeld_id, int $leben, int $ausdauer, int $schaden,
                                        int $schutz, bool $geschlecht, string $klasse, int $attrSt, int $attrGe, int $attrIn,
                                        int $attrWa, int $attrCh, int $attrGl, int $fertigkeit1, int $fertigkeit2,
                                        string $talent1, string $talent2, int $ep, string $aktuelleWaffe, string $aktuelleRuest)
                                        : Character // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        return new Character($id, $name, $spielfeld_id, $leben, $ausdauer, $schaden, $schutz, $geschlecht, $klasse, $attrSt,
                            $attrGe, $attrIn, $attrWa, $attrCh, $attrGl, $fertigkeit1, $fertigkeit2, $talent1, $talent2, $ep,
                            $aktuelleWaffe, $aktuelleRuest);
    }

    public function angreifen() : void {

    }

    public function ergeben() : void {

    }

    public function verlieren() : void {

    }

    public function wuerfeln(int $wert) : int {

    }

    public function zeigeWuerfelGrafik(int $wert) : int {

    }

    public function verteileFertigkeitspunkte(int $wert) : int {

    }

    public function verteileTalentpunkte(int $wert) : int {

    }

    public function berechneKampfwerte(int $wert) : int {

    }

    public function zeigeStatsSpielbrett() {

    }

    public function zeigeStatsInventar() {

    }

    public function zeigeVornachteile() {

    }

    public function bekommeVornachteile() {

    }

    public function verliereVornachteile() {

    }
}