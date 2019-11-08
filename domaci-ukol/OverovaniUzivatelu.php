<?php

//1.	Vytvořte třídu Uzivatel, která obsahuje:
//1.	atributy jmeno a heslo (nastavené přes konstruktor)
//2.	metodu overeni, která:
//i.	přejímá jako parametry zadané jméno a heslo
//ii.	vrací true pokud se jméno i heslo shodují
//iii.	nebo vrací false pokud se jméno a heslo neshodují
//3.	metodu ziskejJmeno, která vrací jméno uživatele předané konstruktorem
//2.	Vytvořte třídu Prihlasovani, která obsahuje:
//1.	atribut prihlaseniUzivatele (pole)
//2.	metodu prihlas, která přejímá tři parametry:
//i.	objekt vytvořený z třídy Uzivatel
//ii.	jméno jako string
//iii.	heslo jako string
//3.	metodu zobrazPrihlaseneUzivatele, která vypíše obsah atributu prihlaseniUzivatele jako text: Prihlaseni uzivatele: josef, karel, marek
//3.	Metoda prihlas pomocí metody overeni zjisti, zda zadané jméno a heslo (přijaté argumenty) odpovídá jménu a heslu, které má uživatel nastaven (nastavené konstruktorem). Pokud odpovídají, přidá login uživatele do svého atributu prihlaseniUzivatele.
//4.	Vytvořte objekt uživatele, konstruktorem předejte jméno josef a heslo josef1234.
//5.	Vytvořte objekt z třídy Prihlasovani.
//6.	Vypište seznam přihlášených pomocí metody zobrazPrihlaseneUzivatele. Poté na objektu vytvořeném z třídy Prihlasovani pomocí metody prihlas zkuste uživatele přihlásit s údaji josef a josef1234. Nyní opět vypište seznam přihlášených uživatelů.
//7.	Vytvořte další objekt uživatele, zkuste ho přihlásit nejprve s chybnými údaji, poté se správnými údaji. Opět zkontrolujte vypsáním přihlášených uživatelů.

class Uzivatel
{
    private $jmeno; // atributy
    private $heslo;
    public function __construct($jmeno, $heslo) // konstruktor
    {
        $this->jmeno = $jmeno;
        $this->heslo = $heslo;
    }
    public function overeni($jmeno, $heslo) // metoda
    {
        return $jmeno === $this->jmeno and $heslo === $this->heslo;
    }
    public function ziskejJmeno()
    {
        return $this->jmeno;
    }
}
class Prihlasovani
{
    private $prihlaseniUzivatele = [];

    public function prihlas(Uzivatel $uzivatel, $jmeno, $heslo)
   {
       if ($uzivatel->overeni($jmeno, $heslo)) {
           $this->prihlaseniUzivatele[] = $jmeno;
       }
   }
    public function zobrazPrihlaseneUzivatele()
    {
        echo "Přihlášení uživatelé: " . implode(", ", $this->prihlaseniUzivatele) . "<br>";
    }
}

$josef = new Uzivatel("Josef", "josef1234"); // přidání uživatele
$prihlasovani = new Prihlasovani();

$prihlasovani->zobrazPrihlaseneUzivatele(); // nikdo není přihlášen

$prihlasovani->prihlas($josef, "Josef", "josef1234"); // přihlášení uživatele
$prihlasovani->zobrazPrihlaseneUzivatele();

$andrea = new Uzivatel("andrea", "123456789"); // nový uživatel

$prihlasovani->prihlas($andrea, "andrea", "heslo"); // přihlášení uživatele s chybným heslem
$prihlasovani->zobrazPrihlaseneUzivatele();

$prihlasovani->prihlas($andrea, "andrea", "123456789"); // přihlášení se správným heslem
$prihlasovani->zobrazPrihlaseneUzivatele();