<?php

//1. Vytvořte třídu `Ctverec` obsahující atribut `delkaStrany`, který se nastavuje na výchozí hodnotu pomocí konstruktoru
//2. V této třídě vytvořte metodu `spocitejObsah()`, která vrátí spočítaný obsah
//3. Vytvořte objekt čtverec s délkou strany `6`
//4. Vypište větu Obsah ctverce o delce strany X je Y, přičemž:
//    1. délku strany získejte z atributu objektu
//    2. obsah získejte voláním metody objektu

class Ctverec // třída
{
    public $delkaStrany; // atribut

    public function __construct($delkaStrany) // konstruktor
    {
        $this->delkaStrany = $delkaStrany;
    }

    public function spocitejObsah() // metoda
    {
        return $this->delkaStrany * $this->delkaStrany; // vrací spočítaný obsah
    }
}

$mujCtverec = new Ctverec(6); // objekt


echo "Obsah čtverce o délce strany " . $mujCtverec->delkaStrany . " je " . $mujCtverec->spocitejObsah();
// vypsána věta, délka strany získána z atributu objektu, obsah získán voláním metody objektu