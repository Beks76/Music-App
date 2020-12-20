<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('artist.index', compact('users'));
    }

    public function station()
    {
        return view('artist.station');
    }


}
