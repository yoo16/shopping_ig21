<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    
    public function index()
    {
        $data = [];
        return view('cart.index', $data);
    }

    public function add()
    {
        return redirect()->route('cart.index');
    }

    public function remove()
    {
        return redirect()->route('cart.index');
    }

    public function clear()
    {
        return redirect()->route('cart.index');
    }

}
