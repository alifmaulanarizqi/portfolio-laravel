<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutMe;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
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
                $image = $manager->read($imageInput)->scale(height: 605)->toJpeg(80)->save(base_path('public/upload/about-me/'.$imageName));

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
}
