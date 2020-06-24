<?php


class Spielfeld
{

    private int $posX;
    private int $posY;
    private int $posZ;
    private int $posT;
    private string $name;
    private bool $kartennebel;


    public function getPosX(): int
    {
        return $this->posX;
    }

    public function setPosX(int $posX): void
    {
        $this->posX = $posX;
    }

    public function getPosY(): int
    {
        return $this->posY;
    }

    public function setPosY(int $posY): void
    {
        $this->posY = $posY;
    }

    public function getPosZ(): int
    {
        return $this->posZ;
    }

    public function setPosZ(int $posZ): void
    {
        $this->posZ = $posZ;
    }

    public function getPosT(): int
    {
        return $this->posT;
    }

    public function setPosT(int $posT): void
    {
        $this->posT = $posT;
    }

    public function __construct(int $posX, int $posY, int $posZ, int $posT)
    {
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
        $this->posT = $posT;
    }

    public function aktualisieren() : void {

    }

}