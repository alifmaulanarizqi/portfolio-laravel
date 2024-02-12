<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutMe;
use App\Models\HomeSlide;
use App\Models\Award;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use App\Models\Experience;
use App\Http\ValueObject\PortfolioValueObject;

class FrontendController extends Controller
{
    public function getMainPage() {
        $aboutMe = AboutMe::find(1);
        $homeSlide = HomeSlide::find(1);
        $skills = Skill::latest()->get();
        $portfolios = Portfolio::all();
        $experiences = Experience::all();

        $portfolioBasedOnCategory = [];

        foreach($portfolios as $portfolio) {
            $category = $portfolio->portfolioCategory->name;
            if(!array_key_exists($category, $portfolioBasedOnCategory)) {
                $portfolioBasedOnCategory[$category] = [];
            }

            $portfolioBasedOnCategory[$category][] = new PortfolioValueObject(
                $portfolio->id,
                $category,
                $portfolio->title,
                $portfolio->image_thumbnail,
                null,
            );
        }

        return view('frontend.index', compact('aboutMe', 'homeSlide', 'skills', 'portfolioBasedOnCategory', 'experiences'));
    }

    public function getAboutPage() {
        $aboutMe = AboutMe::find(1);
        $awards = Award::all();
        $educations = Education::all();
        $skills = Skill::all();
        $pageName = 'About me';

        return view('frontend.about.about-me', compact('aboutMe', 'awards', 'educations', 'skills', 'pageName'));
    }

    public function showPDF() {
        $pdfPath = public_path('upload/about-me/1788046050161962.pdf');
        return response()->file($pdfPath, ['content-type' => 'application/pdf']);
    }

    public function getContactPage() {
        $contact = Contact::select('id', 'phone', 'email', 'address', 'nation')->where('id', 1)->first();
        $pageName = 'Contact us';

        return view('frontend.contact.contact', compact('contact', 'pageName'));
    }

    public function sendMessage(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $insert = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $notif = array();

        if($insert) {
            $notif = array(
                'message' => 'Message send successfully, we will soon send response email',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Message send failed',
                'alert-type' => 'error',
            );
        }

        return redirect()->back()->with($notif);
    }

    public function getPortfolioPage() {
        $pageName = 'Portfolio';
        $portfolios = Portfolio::all();

        $portfolioBasedOnCategory = [];

        foreach($portfolios as $portfolio) {
            $category = $portfolio->portfolioCategory->name;
            if(!array_key_exists($category, $portfolioBasedOnCategory)) {
                $portfolioBasedOnCategory[$category] = [];
            }

            $portfolioBasedOnCategory[$category][] = new PortfolioValueObject(
                $portfolio->id,
                $category,
                $portfolio->title,
                $portfolio->image_thumbnail,
                $portfolio->desc,
            );
        }

        return view('frontend.portfolio.portfolio', compact('pageName', 'portfolioBasedOnCategory'));
    }

    public function getPortfolioDetailPage($id) {
        $pageName = 'Portfolio Detail';
        $portfolio = Portfolio::find($id);

        return view('frontend.portfolio.detail-portfolio', compact('pageName', 'portfolio'));
    }
}
