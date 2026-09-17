<?php
namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('templates/nav') . view('landing');

    }
    public function about()
    {
        return view('templates/nav') . view('about');
        
    }
}

?>