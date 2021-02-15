<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Support\Facades\Auth;

use App\Facades\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        //ログイン後のユーザの取得
        $this->middleware(function($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        $data = Cart::orderList($request);
        return view('cart.index', $data);
    }

    public function confirm(Request $request)
    {
        $data = Cart::orderList($request);
        return view('cart.confirm', $data);
    }

    public function add(Request $request)
    {
        $item = Item::find($request->id);
        if (isset($item->id)) UserItem::addCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $item = Item::find($request->id);
        UserItem::removeCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        UserItem::clearCart($request);
        return redirect()->route('cart.index');
    }

    public function updates(Request $request)
    {
        UserItem::updatesCart($request, $this->user);
        return redirect()->route('cart.index');
    }

    public function order(Request $request)
    {
        Cart::order($request);
        return redirect()->route('cart.result');
    }

    public function result()
    {
        return view('cart.result');
    }
}
