<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }


    public function increaseQuantity(): void
    {
        if ($this->quantity < $this->product->getAvailableQuantity()) {
            $this->quantity++;
        } else {
            throw new \Exception("Nem lehet belőle több!");
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity >= 2) {
            $this->quantity--;
        } else {
            throw new \Exception("Semmibol nem vehetsz el!");
        }
    }
}