<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Models\Item;
use App\User;

class UserItem extends Model
{

    protected $fillable = [
        'amount',
        'user_id',
        'item_id',
        'price',
        'tax',
    ];

    protected $guraded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static $session_key = 'user_items';

    static function sessionValues(Request $request) {
        $values = [];
        if ($request->session()->has(self::$session_key)) {
            $values = $request->session()->get(self::$session_key);
        }
        return $values;
    }

    static function sessionValue(Request $request) {
        $values = UserItem::sessionValues($request);
        if (isset($values[$request->id])) {
            return $values[$request->id];
        }
    }

    static function saveSession(Request $request, UserItem $user_item) {
        $values = UserItem::sessionValues($request);
        $values[$user_item->item_id] = $user_item;
        $request->session()->put(self::$session_key, $values);
    }

    static function updateCart(Request $request, User $user, Item $item, $amount) {
        $user_item = UserItem::sessionValue($request);
        if (!$user_item) $user_item = new UserItem();
        $user_item->item_id = $item->id;
        $user_item->user_id = $user->id;
        $user_item->price = $item->price;
        $user_item->amount = $amount;

        UserItem::saveSession($request, $user_item);
    }

    static function addCart(Request $request, User $user, Item $item) {
        $user_item = UserItem::sessionValue($request);
        $amount = (isset($user_item->amount)) ? $user_item->amount + 1 : 1;
        UserItem::updateCart($request, $user, $item, $amount);
    }

    static function removeCart(Request $request, User $user, Item $item) {
        if (empty($item)) return;
        if (!$request->session()->has(self::$session_key)) return;

        $user_items = UserItem::sessionValues($request);
        if (isset($user_items[$item->id])) {
            unset($user_items[$item->id]);
            $request->session()->put(self::$session_key, $user_items);
        }
    }

    static function clearCart(Request $request) {
        $request->session()->forget(self::$session_key);
    }

    static function calculateTotal(Request $request) {
        $user_items = UserItem::sessionValues($request);
        $total_price = 0;
        if (empty($user_items)) return $total_price;
        foreach ($user_items as $user_item) {
            $total_price+= $user_item->price * $user_item->amount;
        }
        return $total_price;
    }

    static function updatesCart(Request $request, User $user) {
        //if (!$request->all()) return;
        //$request_items = $request->all()['user_items'];
        $request_items = $request->input('user_items');
        if (!$request_items) return;
        foreach ($request_items as $item_id => $amount) {
            $item = Item::find($item_id);
            UserItem::updateCart($request, $user, $item, $amount);
        }
    }


}
