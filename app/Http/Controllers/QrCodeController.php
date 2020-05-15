<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class QrCodeController extends Controller
{
    public function qrGenerator($course_name)
    {
        // $course = Course::find($id);
        // $course_name = "IR";
        \QrCode::size(500)
              ->format('png')
              ->generate($course_name, public_path('images/qrcode.png'));
      
        return view('qrCode')->with('course_name',$course_name);
    }
}
