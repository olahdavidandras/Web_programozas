<?php


class ShoppingList
{
    private $items = [];

    public function addItem(string $nev, int $mennyiseg, float $egysegar): void
    {
        $this->items[] = [
            "nev" => $nev,
            "mennyiseg" => $mennyiseg,
            "egysegar" => $egysegar
        ];
    }

    public function removeItem(string $nev): void
    {
        foreach ($this->items as $key => $item) {
            if ($item['nev'] === $nev) {
                unset($this->items[$key]);
                echo "$nev ki lett szedve a listabol!<br>";
                return;
            }
        }
        echo "$nev nincs a listaban!<br>";
    }

    public function printList(): void
    {
        if (empty($this->items)) {
            echo "A lista ures<br>";
            return;
        }
        echo "Lista:<br>";
        foreach ($this->items as $item) {
            echo $item['nev'] . " - Mennyiseg: " . $item['mennyiseg'] . ", Egysegar: " . $item['egysegar'] . "<br>";
        }
    }

    public function totalCost(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['mennyiseg'] * $item['egysegar'];
        }
        return $total;
    }
}

$shoppingList = new ShoppingList();
$shoppingList->addItem("Sor", 2, 8.5);
$shoppingList->addItem("Bor", 1, 2.5);
$shoppingList->addItem("Sajt", 3, 4.2);
$shoppingList->printList();
$shoppingList->removeItem("Sajt");
$shoppingList->printList();
echo "A lista ara: " . $shoppingList->totalCost() . "<br>";


