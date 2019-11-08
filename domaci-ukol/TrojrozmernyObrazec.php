<?php

//1. Vytvořte interface TrojrozmernyObrazec který bude obsahovat veřejné metody ziskejObjem a ziskejPovrch
//2. Naimplementujte třídu Kvadr která bude tento interface splňovat
//3. Naimplementujte krychli (seznam matematických funkcí dostupných v PHP: http://php.net/manual/en/ref.math.php)
//4. Naimplementujte kouli
//5. Naimplementujte jehlan
//6. Implementujte funkci pro výpis objemu a obsahu které budou vyžadovat TrojrozmernyObrazec jako parametr
//7. Vypiste výpočet objemu a obsahu pro:
//    1. Krychli o délce strany 5
//    2. Kvádr o délkách stran 2, 3, 7
//    3. Kouli o poloměru 6
//    4. Jehlanu o délce strany 3 a výšce 4

interface InterfaceTrojrozmernyObrazec
{
    public function ziskejObjem();
    public function ziskejPovrch();
}
class Kvadr implements InterfaceTrojrozmernyObrazec

{
    private $a;

    private $b;

    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    public function ziskejObjem()
    {
        return $this->a * $this->b * $this->c;
    }
    public function ziskejPovrch()
    {
         return 2 * ($this->a * $this->b + $this->b * $this->c + $this->a * $this->c);
    }
}
class Krychle implements InterfaceTrojrozmernyObrazec

{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }
    public function ziskejObjem()
    {
        return $this->a ** 3;
    }
    public function ziskejPovrch()
    {
        return 6 * ($this->a ** 2);
    }
}
class Koule implements InterfaceTrojrozmernyObrazec
{
    private $r;
    public function __construct($r)
    {
        $this->r = $r;
    }
    public function ziskejObjem()
    {
        return 4/3 * pi() * $this->r ** 3;
    }
    public function ziskejPovrch()
    {
        return 4 * pi() * $this->r ** 2;
    }
}
class Jehlan implements InterfaceTrojrozmernyObrazec
{
    private $a;
    private $v;
    public function __construct($a, $v)
    {
        $this->a = $a;
        $this->v = $v;
    }
    public function ziskejObjem()
    {
        return $this->a ** 2 / 3 * $this->v;
    }
    public function spocitejStenovouVysku()
    {
        return sqrt(($this->a / 2) ** 2 + $this->v ** 2);
    }
    public function ziskejPovrch()
    {
        return $this->a ** 2 + 2 * $this->a * $this->spocitejStenovouVysku();
    }
}
function vypisObjemPovrch(InterfaceTrojrozmernyObrazec $teleso)
{
    echo "<b>" . get_class($teleso) . " má objem: " . $teleso->ziskejObjem() . "</b><br>";
    echo "<b>" . get_class($teleso) . " má povrch: " . $teleso->ziskejPovrch() . "</b><br><hr>";
}
echo "<br><br>";
$krychle = new Krychle(5);
vypisObjemPovrch($krychle);
$kvadr = new Kvadr(2,3,7);
vypisObjemPovrch($kvadr);
$koule = new Koule(6);
vypisObjemPovrch($koule);
$jehlan = new Jehlan(3, 4);
vypisObjemPovrch($jehlan);

/* alternativní zápis pro výpis jednotlivých hodnot

$telesa = [
    new Krychle(5),
    new Kvadr(2, 3, 7),
    new Koule(6),
    new Jehlan(3, 4)
];
foreach ($telesa as $teleso) {
    vypisObjemPovrch($teleso);
}
