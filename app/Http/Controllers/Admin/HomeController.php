<?php

namespace App\Http\Controllers\Admin;
use App\Models\Projet;

class HomeController
{
    public function index()
    {
        $projets = Projet::all();
        return view('admin.MesProjets', compact('projets'));
    }
}
