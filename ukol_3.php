<?php

//1. Upravte řešení úkolu 2 tak, aby:
//    1. Z třídy `GeometrickyUtvar` nebylo možné vytvořit objekt
//    2. Všechny třídy implementovaly společné rozhraní ve kterém budou předepsány veřejné metody `ziskejObvod()` a `ziskejPocetStran()`
//2. Vytvořte funkci `vypisDetail()`:
//    1. Tato funkce přejímá jediný argument implementující vámi definované rozhraní
//    2. Tato funkce vypíše typ geometrického útvaru (typ proměnné v případě třídy zjistíte pomocí funkce `get_class($objekt)`), počet stran a obvod
//3. Vytvořte objekty:
//    1. čtverec s délkou strany 7
//    2. trojúhelník s délkou stran 3, 4 a 9
//4. Pomocí funkce `vypisDetail()` vypište detaily obou objektů

interface IGeometrickyUtvar
{
    public function ziskejObvod();
}
abstract class GeometrickyUtvar implements IGeometrickyUtvar
{
    private $pocetStran;
    public function __construct($pocetStran)
    {
        $this->pocetStran = $pocetStran;
    }
    public function ziskejPocetStran()
    {
        return $this->pocetStran;
    }
}
class Ctverec extends GeometrickyUtvar
{
    private $a;
    public function __construct($a)
    {
        $this->a = $a;
        parent::__construct(4);
    }
    public function ziskejObvod()
    {
        return $this->a * $this->ziskejPocetStran();
    }
}
class Trojuhelnik extends GeometrickyUtvar
{
    private $a;
    private $b;
    private $c;
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        parent::__construct(3);
    }
    public function ziskejObvod()
    {
        return $this->a + $this->b + $this->c;
    }
}
function vypisDetail(IGeometrickyUtvar $utvar)
{
    echo "<h3>" . get_class($utvar) . "</h3>";
    echo "Počet stran: " . $utvar->ziskejPocetStran() . "<br>";
    echo "Obvod: " . $utvar->ziskejObvod() . "<br><hr>";
}
$ctverec = new Ctverec(3);
vypisDetail($ctverec);
$trojuhelnik = new Trojuhelnik(2, 4, 5);
vypisDetail($trojuhelnik);