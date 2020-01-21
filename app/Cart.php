<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalNumber = 0;
    public $totalPrice = 0;
    public $totalDisPrice = 0;
    public $totalPurePrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalNumber = $oldCart->totalNumber;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalDisPrice = $oldCart->totalDisPrice;
            $this->totalPurePrice = $oldCart->totalPurePrice;
        }

    }

    public function add($item, $id)

    {
        if ($item->discount_price) {
            $storedItem = ['number' => 0, 'price' => $item->discount_price, 'item' => $item];
        } else {
            $storedItem = ['number' => 0, 'price' => $item->price, 'item' => $item];
        }
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['number']++;
        if ($item->discount_price) {
            $storedItem['price'] = $item->discount_price * $storedItem['number'];
            $this->totalPrice += $item->discount_price;
            $this->totalDisPrice += ($item->price - $item->discount_price);
        } else {
            $storedItem['price'] = $item->price * $storedItem['number'];
            $this->totalPrice += $item->price;

        }
        $this->totalPurePrice += $item->price;
        $this->items[$id] = $storedItem;
        $this->totalNumber++;


    }


    public function remove($item,$id)
    {
        if($this->items){
            if(array_key_exists($id,$this->items)){

                if($item->discount_price!=null){
                    //50-25
                    $this->items[$id]['price'] -= $item->discount_price;
//                        90-25
                    $this->totalPrice -= $item->discount_price;
//                       = 50-25
                    $this->totalDisPrice -= ($item->price - $item->discount_price);
                } else {

                    $this->items[$id]['price'] -= $item->price;
                    $this->totalPrice -= $item->price;

                }
//                4--
                $this->totalNumber--;
//                140
                $this->totalPurePrice-= $item->price;
                if($this->items[$id]['number']>1){
                    $this->items[$id]['number']-=1;
                }else{
                    unset($this->items[$id]);
                }

                }
            }


    }
}
