<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard', ['pageSlug' => 'dashboard']);
    }

    public function profile()
    {
        return view('pages.profile', ['pageSlug' => 'profile']);
    }

    public function users()
    {
        return view('pages.users', ['pageSlug' => 'users']);
    }

    public function criteria()
    {
        return view('pages.criteria', ['pageSlug' => 'criteria']);
    }

    public function alternative()
    {
        return view('pages.alternative', ['pageSlug' => 'alternative']);
    }

    public function calculation()
    {
        return view('pages.calculation', ['pageSlug' => 'calculation']);
    }

    public function result()
    {
        return view('pages.results', ['pageSlug' => 'result']);
    }
    public function nilai()
    {
        return view('pages.grade', ['pageSlug' => 'nilai alternative']);
    }

}
