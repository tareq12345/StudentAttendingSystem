<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = "Wlecome to ToDo List App.";
        // return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title = "about us";
        return view('pages.index')->with('title',$title);
    }

    public function services(){
        $data = array(
            'title' => 'services',
            'services' => ["Web devlopment","design","SEO"]
        );
        return view("pages.services")->with($data);
    }
}
