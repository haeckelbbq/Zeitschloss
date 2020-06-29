<?php


class Spielfeld
{

    private int $posX;
    private int $posY;
    private int $posZ;
    private int $posT;
    private string $name;
    private bool $kartennebel;

    /**
     * @return bool
     */
    public function isKartennebel(): bool
    {
        return $this->kartennebel;
    }

    /**
     * @param bool $kartennebel
     */
    public function setKartennebel(bool $kartennebel): void
    {
        $this->kartennebel = $kartennebel;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

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

    public function __construct(int $posX, int $posY, int $posZ, int $posT, string $name, bool $kartennebel)
    {
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
        $this->posT = $posT;
        $this->name = $name;
        $this->kartennebel = $kartennebel;
    }

    public function aktualisieren() : void {

    }
}