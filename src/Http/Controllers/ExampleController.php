<?php

namespace AgusUsk\AdminLte\Http\Controllers;

use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    public function loginPage()
    {
        return view('adminlte::examples.login');
    }

    public function registerPage()
    {
        return view('adminlte::examples.register');
    }
}