<?php

namespace App\Models;

class CartModel
{
    public $itemCart = null;
    public $coupon = null;
    public $totalPriceCart = 0;
    public $finalTotalPriceCart = 0;
    public $totalItemCart = 0;

    public function __construct($cart)
    {
        if (!empty($cart)) {
            $this->itemCart = $cart->itemCart;
            $this->totalItemCart = $cart->totalItemCart;
            $this->totalPriceCart = $cart->totalPriceCart;
            $this->coupon = $cart->coupon;
            $this->finalTotalPriceCart = $cart->finalTotalPriceCart;
        }
    }

    public function applyCoupon($coupon = null)
    {
        $this->coupon = $coupon;
        if (empty($coupon)) {
            $this->finalTotalPriceCart = $this->totalPriceCart;
        } else {
            $this->finalTotalPrice();
        }
    }

    public function finalTotalPrice()
    {
        if (!empty($this->coupon)) {
            switch ($this->coupon['type']) {
                case 0:
                    $this->finalTotalPriceCart = $this->totalPriceCart * ((100 - $this->coupon['value']) / 100);
                    break;
                case 1:
                    $this->finalTotalPriceCart = $this->totalPriceCart - $this->coupon['value'];
                    break;
                default:
                    $this->finalTotalPriceCart = $this->totalPriceCart;
                    break;
            }
        }
    }

    public function addToCart($item)
    {
        $newItem = [
            'productInfo' => $item,
            'price' => 0,
            'quantity' => 0,
        ];

        if (!empty($this->itemCart)) {
            if (array_key_exists($item['id'], $this->itemCart)) {
                $newItem = $this->itemCart[$item['id']];
                $this->totalPriceCart -= $newItem['price'];
            }
        }

        $newItem['quantity'] +=  $item['quantity'];
        $newItem['price'] = $newItem['quantity'] * $newItem['productInfo']['price'];

        $this->itemCart[$item['id']] = $newItem;
        $this->totalPriceCart += $newItem['price'];
        $this->totalItemCart = count($this->itemCart);
        $this->finalTotalPriceCart = $this->totalPriceCart;

        $this->finalTotalPrice();
    }

    public function updateCart($items)
    {
        foreach ($items->data as $item) {
            $idItem = $item['key'];
            $quantity = $item['value'];
            $this->totalPriceCart -= $this->itemCart[$idItem]['price'];
            $this->itemCart[$idItem]['quantity'] = $quantity;
            $this->itemCart[$idItem]['price'] = $this->itemCart[$idItem]['productInfo']['price'] * $quantity;
            $this->totalItemCart = count($this->itemCart);
            $this->totalPriceCart += $this->itemCart[$idItem]['price'];
        }

        $this->finalTotalPriceCart = $this->totalPriceCart;

        $this->finalTotalPrice();
    }

    public function deleteItem($idItem)
    {
        $this->totalPriceCart -= $this->itemCart[$idItem]['price'];
        unset($this->itemCart[$idItem]);
        $this->totalItemCart--;
        $this->finalTotalPriceCart = $this->totalPriceCart;
        $this->finalTotalPrice();
        if (empty($this->itemCart)) {
            $this->coupon = null;
            $this->totalPriceCart = 0;
            $this->finalTotalPriceCart = 0;
            $this->totalItemCart = 0;
        }
    }
}
