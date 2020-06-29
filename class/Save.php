<?php


class Save
{

    /*
     * INT
     */
    private int $id;
    /*
     * VARCHAR(45)
     */
    private string $name;
    /*
     * DATETIME (YYYY-MM-DD hh:mm:ss)
     */
    private string $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): void // string oder date??
    {
        $this->date = $date;
    }

    public function __construct(int $id, string $name, string $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }

    public function getDataFromDatabase() : array {

    }

    private function insert(string $name, string $datum) : int {

    }

    private function delete(int $id) : void {

    }

    public function buildSave(string $name, string $datum) : int {

    }

    public function deleteSave(int $id) : void {

    }

    public function buildFromPDO() : Save {

    }

    public function getById() : Save {

    }

}