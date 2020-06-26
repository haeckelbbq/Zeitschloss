<?php
// ist für das sichtbare Spielbrett, mit allen Spielfeldern zuständig
// Spielbretter sind abhängig von Etage und Zeitebene

class Spielbrett
{
    /*
     * PK
     */
    private int $id;
    private int $etage; // -1, 0 ,1 zZt.
    private string $zeitebene;
    private array $spielfelder = []; // typ Spielfeld

    /**
     * Spielbrett constructor.
     * @param int $id
     * @param int $etage
     * @param string $zeitebene
     */
    public function __construct(int $id, int $etage, string $zeitebene)
    {
        $this->id = $id;
        $this->etage = $etage;
        $this->zeitebene = $zeitebene;
        $this->loadSpielfelder();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getEtage(): int
    {
        return $this->etage;
    }

    /**
     * @return string
     */
    public function getZeitebene(): string
    {
        return $this->zeitebene;
    }

    /**
     * @param array $spielfelder
     */
    public function setSpielfelder(array $spielfelder): void
    {
        $this->spielfelder = $spielfelder;
    }

    /**
     * @return array
     */
    public function getSpielfelder(): array
    {
        return $this->spielfelder;
    }

    public static function getSpielbrettById(int $id): Spielbrett{
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM t_spielbrett WHERE id = :id';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
            $spielbretter = $sth->fetchAll(PDO::FETCH_FUNC, 'Spielbrett::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $spielbretter[0];
    }
    public static function buildFromPDO(int $id, int $etage, string $zeitebene) : Spielbrett // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        return new Spielbrett($id, $etage, $zeitebene);
    }
    private function loadSpielfelder() : void
    {
        Spielfeld::loadSpielfelder($this);
    }
}