<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutMe;
use App\Models\HomeSlide;
use App\Models\Award;

class FrontendController extends Controller
{
    public function getMainPage() {
        $aboutMe = AboutMe::find(1);
        $homeSlide = HomeSlide::find(1);
        return view('frontend.index', compact('aboutMe', 'homeSlide'));
    }

    public function getAboutPage() {
        $aboutMe = AboutMe::find(1);
        $awards = Award::all();
        return view('frontend.about-me', compact('aboutMe', 'awards'));
    }

    public function showPDF() {
        $pdfPath = public_path('upload/about-me/1788046050161962.pdf');
        return response()->file($pdfPath, ['content-type' => 'application/pdf']);
    }
}
