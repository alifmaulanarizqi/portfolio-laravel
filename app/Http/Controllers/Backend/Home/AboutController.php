<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutMe;
use App\Models\Award;
use App\Models\Education;
use App\Models\Skill;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    // about me
    public function getAboutMe() {
        $aboutMe = AboutMe::find(1);
        return view('admin.about.about-me', compact('aboutMe'));
    }

    public function updateAboutMe(Request $request) {
        $id = $request->id;

        $affectedRows = -1;
        if($request->file('about_image') || $request->file('cv')) {
            $aboutMe = AboutMe::find($id);

            $affectedRows = AboutMe::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
            ]);

            if($request->file('about_image')) {
                $editedImageFilePath = $aboutMe->image;
                if (File::exists(public_path($editedImageFilePath))) {
                    File::delete(public_path($editedImageFilePath));
                }

                $imageInput = $request->file('about_image');
                $imageName = hexdec(uniqid()).'.'.$imageInput->getClientOriginalExtension();

                $manager = new ImageManager(Driver::class);
                $image = $manager->read($imageInput)->scale(height: 605)->save(base_path('public/upload/about-me/'.$imageName), 80);

                $affectedRows = AboutMe::findOrFail($id)->update([
                    'image' => 'upload/about-me/'.$imageName,
                ]);
            }

            if($request->file('cv')) {
                $editedCVFilePath = $aboutMe->cv;
                if (File::exists(public_path($editedCVFilePath))) {
                    File::delete(public_path($editedCVFilePath));
                }

                $cvInput = $request->file('cv');
                $cvName = hexdec(uniqid()).'.'.$cvInput->getClientOriginalExtension();
                $cvInput->move(public_path('upload/about-me'), $cvName);

                $affectedRows = AboutMe::findOrFail($id)->update([
                    'cv' => 'upload/about-me/'.$cvName,
                ]);
            }
        } else {
            $affectedRows = AboutMe::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
            ]);
        }

        if($affectedRows > 0) {
            $toastNotif = array(
                'message' => 'About Me Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $toastNotif = array(
                'message' => 'About Me Update Failed',
                'alert-type' => 'error',
            );
        }


        return redirect()->back()->with($toastNotif);
    }



    // award
    public function getAward() {
        $awards = Award::latest()->get();

        return view('admin.about.award.award', compact('awards'));
    }

    public function addAward() {
        return view('admin.about.award.add-award');
    }

    public function storeAward(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
        ]);

        $award = new Award;
        $award->title = $request->title;
        $award->desc = $request->desc;

        $notif = array();

        if($award->save()) {
            $notif = array(
                'message' => 'Award added successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Award added failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.award')->with($notif);
    }

    public function editAward($id) {
        $award = Award::find($id);
        return view('admin.about.award.edit-award', compact('award'));
    }

    public function updateAward(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
        ]);

        $update = Award::find($id)->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Award updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Award update failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.award')->with($notif);
    }

    public function deleteAward() {
        $id = $_POST['deleteId'];
        $award = Award::where('id', $id)->first();

        $delete = false;
        if($award != NULL) {
            $delete = $award->delete();
        }

        if($delete) {
            $notif = array(
                'message' => 'Award deleted successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Award delete failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.award')->with($notif);
    }



    // education
    public function getEducation() {
        $educations = Education::latest()->get();

        return view('admin.about.education.education', compact('educations'));
    }

    public function addEducation() {
        return view('admin.about.education.add-education');
    }

    public function storeEducation(Request $request) {
        $validated = $request->validate([
            'school' => 'required',
            'entry_year' => 'required',
            'graduate_year' => 'required',
            'desc' => 'required',
        ]);

        $education = new Education;
        $education->school = $request->school;
        $education->entry_year = $request->entry_year;
        $education->graduate_year = $request->graduate_year;
        $education->desc = $request->desc;

        $notif = array();

        if($education->save()) {
            $notif = array(
                'message' => 'Education added successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Education added failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.education')->with($notif);
    }

    public function editEducation($id) {
        $education = Education::find($id);
        return view('admin.about.education.edit-education', compact('education'));
    }

    public function updateEducation(Request $request, $id) {
        $validated = $request->validate([
            'school' => 'required',
            'entry_year' => 'required',
            'graduate_year' => 'required',
            'desc' => 'required',
        ]);

        $update = Education::find($id)->update([
            'school' => $request->school,
            'entry_year' => $request->entry_year,
            'graduate_year' => $request->graduate_year,
            'desc' => $request->desc,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Education updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Education update failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.education')->with($notif);
    }

    public function deleteEducation() {
        $id = $_POST['deleteId'];
        $education = Education::where('id', $id)->first();

        $delete = false;
        if($education != NULL) {
            $delete = $education->delete();
        }

        if($delete) {
            $notif = array(
                'message' => 'Education deleted successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Education delete failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.education')->with($notif);
    }



    // skill
    public function getSkill() {
        $skills = Skill::latest()->get();

        return view('admin.about.skill.skill', compact('skills'));
    }

    public function addSkill() {
        return view('admin.about.skill.add-skill');
    }

    public function storeSkill(Request $request) {
        $validated = $request->validate([
            'name' => 'required:max:255',
            'proficiency' => 'required|numeric|max:100',
            'icon2' => 'required',
        ]);

        $iconInput = $request->file('icon2');
        $iconName = hexdec(uniqid()).'.'.$iconInput->getClientOriginalExtension();

        $manager = new ImageManager(Driver::class);
        $image = $manager->read($iconInput)->scale(height: 100)->save(base_path('public/upload/about-me/skill-icon/'.$iconName), 80);

        $skill = new Skill;
        $skill->name = $request->name;
        $skill->proficiency = $request->proficiency;
        $skill->icon = 'upload/about-me/skill-icon/'.$iconName;

        $notif = array();

        if($skill->save()) {
            $notif = array(
                'message' => 'Skill added successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Skill added failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.skill')->with($notif);
    }

    public function editSkill($id) {
        $skill = Skill::find($id);
        return view('admin.about.skill.edit-skill', compact('skill'));
    }

    public function updateSkill(Request $request) {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required:max:255',
            'proficiency' => 'required|numeric|max:100',
        ]);

        $affectedRows = -1;
        if($request->file('icon2')) {
            $skill = Skill::find($id);
            $editedIconFilePath = $skill->icon;
            if (File::exists(public_path($editedIconFilePath))) {
                File::delete(public_path($editedIconFilePath));
            }

            $iconInput = $request->file('icon2');
            $iconName = hexdec(uniqid()).'.'.$iconInput->getClientOriginalExtension();

            $manager = new ImageManager(Driver::class);
            $icon = $manager->read($iconInput)->scale(height: 100)->save(base_path('public/upload/about-me/skill-icon/'.$iconName), 80);

            $affectedRows = Skill::findOrFail($id)->update([
                'name' => $request->name,
                'proficiency' => $request->proficiency,
                'icon' => 'upload/about-me/skill-icon/'.$iconName,
            ]);
        } else {
            $affectedRows = Skill::findOrFail($id)->update([
                'name' => $request->name,
                'proficiency' => $request->proficiency,
            ]);
        }

        $toastNotif = array();
        if($affectedRows > 0) {
            $toastNotif = array(
                'message' => 'Skill Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $toastNotif = array(
                'message' => 'Skill Update Failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.skill')->with($toastNotif);
    }

    public function deleteSkill() {
        $id = $_POST['deleteId'];
        $skill = Skill::where('id', $id)->first();

        $affectedRows = -1;
        if($skill->icon) {
            $editedIconFilePath = $skill->icon;
            if (File::exists(public_path($editedIconFilePath))) {
                File::delete(public_path($editedIconFilePath));
            }

            $affectedRows = $skill->delete();
        } else {
            $affectedRows = $skill->delete();
        }

        $notif = array();
        if($affectedRows > 0) {
            $notif = array(
                'message' => 'Skill deleted successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Skill delete failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.skill')->with($notif);
    }
}
