<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutMe;
use App\Models\HomeSlide;
use App\Models\Award;
use App\Models\Education;
use App\Models\Skill;

class FrontendController extends Controller
{
    public function getMainPage() {
        $aboutMe = AboutMe::find(1);
        $homeSlide = HomeSlide::find(1);
        $skills = Skill::latest()->get();
        return view('frontend.index', compact('aboutMe', 'homeSlide', 'skills'));
    }

    public function getAboutPage() {
        $aboutMe = AboutMe::find(1);
        $awards = Award::all();
        $educations = Education::all();
        $skills = Skill::all();
        return view('frontend.about-me', compact('aboutMe', 'awards', 'educations', 'skills'));
    }

    public function showPDF() {
        $pdfPath = public_path('upload/about-me/1788046050161962.pdf');
        return response()->file($pdfPath, ['content-type' => 'application/pdf']);
    }
}
