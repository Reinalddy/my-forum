<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function showGuestForm(Request $request) {
        $user_data = Auth::user();
        return view('home', [
            'user_data' => $user_data
        ]);
    }
}
