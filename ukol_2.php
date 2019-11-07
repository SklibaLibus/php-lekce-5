<?php

//1. Vytvořte rodičovskou třídu `GeometrickyUtvar`, která má atribut `pocetStran` viditelný pouze v této třídě
//2. Počet stran nastavujte při vytváření instance (konstruktorem)
//3. Vytvořte v této třídě veřejně přístupnou metodu `ziskejPocetStran()`, která vrací jako číselnou hodnotu počet stran geometrického tvaru
//4. Vytvořte třídu `Ctverec`, která:
//    1. Dědí z třídy `GeometrickyUtvar`
//    2. V konstruktoru jako argument přebírá délku strany, kterou nastaví do svého atributu
//    3. V konstruktoru volá rodičovskou třídu a nastaví správný počet stran
//5. Vytvořte třídu `Trojuhelnik`, která:
//    1. Dědí z třídy `GeometrickyUtvar`
//    2. V konstruktoru přebírá jako argumenty délku všech tří stran a uloží je do svých atributů
//    3. V konstruktoru volá rodičovskou třídu a nastaví správný počet stran
//6. V obou třídách vytvořte metodu `ziskejObvod()`, která spočítá obvod pro čtverec/trojúhelník
//7. Z obou tříd vytvořte objekty (čtverec s délkou strany 3 a trojúhelník s délkou stran 2, 4 a 5)
//8. U obou objektů vypište jejich počet stran získaný rodičovskou metodou `ziskejPocetStran()` a obvod spočítaný metodami `ziskejObvod()`

class GeometrickyUtvar
{
    protected $pocetStran;

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

echo "<h2>Čtverec</h2>";
$ctverec = new Ctverec(3);
echo "Počet stran: " . $ctverec->ziskejPocetStran() . "<br>";
echo "Obvod: " . $ctverec->ziskejObvod() . "<br><hr>";
echo "<h2>Trojúhelník</h2>";
$trojuhelnik = new Trojuhelnik(2,4,5);
echo "Počet stran: " . $trojuhelnik->ziskejPocetStran() . "<br>";
echo "Obvod: " . $trojuhelnik->ziskejObvod() . "<br>";