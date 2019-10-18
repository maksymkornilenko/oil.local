<?php

namespace app\models\ext;

use app\models\OrderItems;

class ExtOrderItems extends OrderItems
{
    public static function factory()
    {
        return new ExtOrderItems();
    }

    public function saveOrderItems($products, $sum, $count, $order_id)
    {

        $orderItems = new OrderItems();
        $orderItems->order_id = $order_id;
        $orderItems->product_id = $products['id'];
        $orderItems->name = $products['name'];
        $orderItems->count_item = $count;
        if ($count == 1) {
            $orderItems->price = $products['price'];
        } else if ($count == 2) {
            $orderItems->price = 125;
        } else if ($count >= 3) {
            $orderItems->price = 100;
        } else {
            $orderItems->price = $products['price'];
        }
        $orderItems->sum_item = $sum;
        $orderItems->save();

    }
}
