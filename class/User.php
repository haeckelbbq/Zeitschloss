<?php


class User
{

    private int $id;
    private string $name;
    private string $passwort;
    private int $statistikTode;
    private int $statistikKills;
    private int $statistikSpielA;
    private int $statistikSpielO;
    private bool $erfolg1;
    private bool $erfolg2;


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

    public function getPasswort(): string
    {
        return $this->passwort;
    }

    public function setPasswort(string $passwort): void
    {
        $this->passwort = $passwort;
    }

    public function getStatistikTode(): int
    {
        return $this->statistikTode;
    }

    public function setStatistikTode(int $statistikTode): void
    {
        $this->statistikTode = $statistikTode;
    }

    public function getStatistikKills(): int
    {
        return $this->statistikKills;
    }

    public function setStatistikKills(int $statistikKills): void
    {
        $this->statistikKills = $statistikKills;
    }

    public function getStatistikSpielA(): int
    {
        return $this->statistikSpielA;
    }

    public function setStatistikSpielA(int $statistikSpielA): void
    {
        $this->statistikSpielA = $statistikSpielA;
    }

    public function getStatistikSpielO(): int
    {
        return $this->statistikSpielO;
    }

    public function setStatistikSpielO(int $statistikSpielO): void
    {
        $this->statistikSpielO = $statistikSpielO;
    }

    public function isErfolg1(): bool
    {
        return $this->erfolg1;
    }

    public function setErfolg1(bool $erfolg1): void
    {
        $this->erfolg1 = $erfolg1;
    }

    public function isErfolg2(): bool
    {
        return $this->erfolg2;
    }

    public function setErfolg2(bool $erfolg2): void
    {
        $this->erfolg2 = $erfolg2;
    }

    public function __construct(int $id, string $name, string $passwort)
    {
        $this->id = $id;
        $this->name = $name;
        $this->passwort = $passwort;
    }

    public function getDataFromDatabase() : array {

    }

    private function insert(string $name, string $passwort) : int {

    }

    private function update(int $id, string $name, string $passwort) : void {

    }

    private function delete(int $id) : void {

    }

    public function buildUser(string $name, string $passwort) : int {

    }

    public function updateUser(int $id, string $name, string $passwort) : void {

    }

    public function deleteUser(int $id) : void {

    }

    public function buildFromPDO() : User {

    }

    public function getById(int $id) : User {

    }

    public function loginUser(string $name, string $passwort) : bool {

    }

    public function doesNameExist(string $name) : bool {

    }

    public function getIdByNamePasswort(string $name, string $passwort) : void {

    }

    public function buildSavesOnBuildUser() : array {

    }

    public function buildStatistik() : void {

    }

}