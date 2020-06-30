<?php


class Gegenstand
{
    private int $id;
    private string $name;
    private int $spielfeld_id;

    /**
     * Gegenstand constructor.
     * @param int $id
     * @param string $name
     * @param int $spielfeld_id
     */
    public function __construct(int $id, string $name, int $spielfeld_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        if (isset($spielfeld_id)){
            $this->spielfeld_id = $spielfeld_id;
        }
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

    public static function getGegenstaendeBySpielfeld(Spielfeld $spielfeld): void
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM t_gegenstand WHERE spielfeld_id = :spielfeld_id';
            $sth = $dbh->prepare($sql);
            $spielfeld_id = $spielfeld->getId();
            $sth->bindParam('spielfeld_id', $spielfeld_id, PDO::PARAM_INT);
            $sth->execute();
            $gegenstaende = $sth->fetchAll(PDO::FETCH_FUNC, 'Gegenstand::buildFromPDO');
            if (isset($gegenstaende)){
                $spielfeld->setGegenstaende($gegenstaende);
            }
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function buildFromPDO(int $id, string $name, int $spielfeld_id) : Gegenstand // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        return new Gegenstand($id, $name, $spielfeld_id);
    }

}