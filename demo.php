<?php

class Order
{
    public $products;
    public $price;
    public $customer;

    public function __construct($products, $price, $customer)
    {
        $this->products = $products;
        $this->price = $price;
        $this->customer = $customer;
    }
    public function productsCount()
    {
        return count($this->products); // uvnitř fce používám this
    }
    public function echoProductsCount()
    {
        echo "Počet položek: " . $this->productsCount() . "<br><br>";
    }
}

$order = new Order(
    ["Pračka AEG", "Žehlička Zanussi", "Myčka Bosch", "Vysavač Electrolux"],
    12000,
    "Karel Nový"
); // objekt

$order->echoProductsCount();

echo "Zákazník: " . $order->customer, "<br><br>";
foreach ($order->products as $item){ // vně fce používám přes order
    echo $item;
    echo "<br>";
}

//$nova_cena = $order->price;
//$snizeni_ceny = $nova_cena - 100;
//$order->price = $snizeni_ceny;

$order->price = $order->price - 100; // zkrácený zápis toho, co je na řádcích 39 - 41
echo "<br>" . "Celková cena: " . $order->price;