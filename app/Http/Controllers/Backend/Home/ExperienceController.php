<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function getExperience() {
        $experiences = Experience::latest()->get();
        return view('admin.experience.experience', compact('experiences'));
    }

    public function addExperience() {
        return view('admin.experience.add-experience');
    }

    public function storeExperience(Request $request) {
        $validated = $request->validate([
            'company' => 'required|max:255',
            'entry_date' => 'required|max:255',
            'exit_date' => 'required|max:255',
            'role' => 'required|max:255',
            'location' => 'required|max:255',
            'desc' => 'required',
        ]);

        $experience = new Experience;
        $experience->company = $request->company;
        $experience->entry_date = $request->entry_date;
        $experience->exit_date = $request->exit_date;
        $experience->role = $request->role;
        $experience->location = $request->location;
        $experience->company_profile = $request->company_profile;
        $experience->desc = $request->desc;

        $notif = array();

        if($experience->save()) {
            $notif = array(
                'message' => 'Experience added successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Experience added failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.experience')->with($notif);
    }
}
