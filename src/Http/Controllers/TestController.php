<?php

namespace AgusUsk\AdminLte\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        dd('Test controller works!');
    }
}