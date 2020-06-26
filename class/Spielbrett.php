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

    public function getSpielbrettById(int $id): Spielbrett{

    }
}