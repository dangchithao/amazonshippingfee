<?php

namespace amazon\shipping;

class Order
{
    /**
     * @var Item[]
     */
    private $items;

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return float|int
     */
    public function getGrossPrice()
    {
        $price = 0;

        foreach ($this->items as $item) {
            $price += $item->getItemPrice();
        }

        return $price;
    }
}
