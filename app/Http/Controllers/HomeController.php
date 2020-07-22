<?php

namespace App\Http\Controllers;

use App\Domain\Models\Tables\Agreement;
use App\Domain\Models\Tables\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = Customer::all()->count();
        $agreements = Agreement::all();

        $open = $agreements->filter(
            function($item) {
                return Carbon::parse($item->deadline)->gte(Carbon::now());
            }
        )
        ->count();

        $close = $agreements->filter(
            function($item) {
                return Carbon::parse($item->deadline)->lt(Carbon::now());
            }
        )
        ->count();

        $latests = Agreement::query()
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        return view('home', compact('latests', 'total', 'open', 'close'));
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
