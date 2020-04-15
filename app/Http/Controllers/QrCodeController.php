<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class QrCodeController extends Controller
{
    public function qrGenerator()
    {
        $course = Course::find(1);
        \QrCode::size(500)
              ->format('png')
              ->generate($course->course_name, public_path('images/qrcode.png'));
      
        return view('qrCode')->with('course',$course);
    }
}
