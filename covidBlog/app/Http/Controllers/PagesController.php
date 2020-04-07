<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        $title = 'COVID19 BLOGSPOT';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $data = array(
            'title' => 'About Us',
            'desc' => 'We are committed to provide you quality services'
        );
        return view('pages.about')->with($data);
    }

    public function services(){
        
        $data = array(
            'title' => 'What we offer',
            'services' => ['Web Dev', 'SEO', 'Web Design']
        );
        return view('pages.services')->with($data);
    }

    public function report(){
       
        return view('pages.report');
    }
}
