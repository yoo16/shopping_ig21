<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\UserItem;

class CartService {

    public function orderList(Request $request)
    {
        $data = [];
        if ($request->session()->has('user_items')) {
            $user_items = UserItem::sessionValues($request);
            $items = Item::whereIn('id', array_keys($user_items))->get();
            $total_price = UserItem::calculateTotal($request);
            $data = [
                'user_items' => $user_items,
                'items' => $items,
                'total_price' => $total_price,
            ];
        }
        return $data;
    }

    public function order(Request $request)
    {
        $user_items = UserItem::sessionValues($request);
        if (empty($user_items)) return;
        foreach ($user_items as $user_item) {
            //INSERT INTO user_items (xxx, xxxx, ...) VALUES (xxxx, xxxx, ...);
            $user_item->save();
        }
        UserItem::clearCart($request);
    }
}