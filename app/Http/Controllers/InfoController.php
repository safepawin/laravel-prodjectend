<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function security_page(){
        return view('footer.security');
    }
    public function contact_page(){
        return view('footer.contact');
    }
}
