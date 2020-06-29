<?php


class NSC
{
    private int $id;
    private string $name;
    private int $spielfeld_id;
    private int $leben;
    private int $ausdauer;
    private int $schaden;
    private int $schutz;
    private int $typ;

    /**
     * NSC constructor.
     * @param int $id
     * @param string $name
     * @param int $spielfeld_id
     * @param int $leben
     * @param int $ausdauer
     * @param int $schaden
     * @param int $schutz
     * @param int $typ
     */
    public function __construct(int $id, string $name, int $spielfeld_id, int $leben, int $ausdauer, int $schaden, int $schutz, int $typ)
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
        $this->typ = $typ;
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
     * @return int
     */
    public function getTyp(): int
    {
        return $this->typ;
    }

    public static function getNSCBySpielfeldId(Spielfeld $spielfeld): void
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM t_nsc WHERE spielfeld_id = :spielfeld_id';
            $sth = $dbh->prepare($sql);
            $spielfeld_id = $spielfeld->getId();
            $sth->bindParam('spielfeld_id', $spielfeld_id, PDO::PARAM_INT);
            $sth->execute();
            $nscs = $sth->fetchAll(PDO::FETCH_FUNC, 'NSC::buildFromPDO');
            if (isset($nscs[0])){
                $spielfeld->setNSC($nscs[0]);
            }
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
    public static function buildFromPDO(int $id, string $name, int $spielfeld_id, int $leben, int $ausdauer, int $schaden,
                                        int $schutz, int $typ) : NSC // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        return new NSC($id, $name, $spielfeld_id, $leben, $ausdauer, $schaden, $schutz, $typ);
    }

    public function angreifen() : void {

    }

    public function ergeben() : void {

    }

    public function verlieren() : void {

    }

    public function wuerfeln(int $wert) : int {

    }
}