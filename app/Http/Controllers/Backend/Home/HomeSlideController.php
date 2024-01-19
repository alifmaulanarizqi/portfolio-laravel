<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class HomeSlideController extends Controller
{
    public function getHomeSlide() {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home-slide.home-slide-all', compact('homeSlide'));
    }

    public function updateHomeSlide(Request $request) {
        $id = $request->id;

        $affectedRows = -1;
        if($request->file('slide_image')) {
            $homeSlide = HomeSlide::find($id);
            $editedImageFilePath = $homeSlide->image;
            if (File::exists(public_path($editedImageFilePath))) {
                File::delete(public_path($editedImageFilePath));
            }

            $imageInput = $request->file('slide_image');
            $imageName = hexdec(uniqid()).'.'.$imageInput->getClientOriginalExtension();

            $manager = new ImageManager(Driver::class);
            $image = $manager->read($imageInput)->scale(height: 800)->toJpeg(80)->save(base_path('public/upload/home_slide/'.$imageName));

            $affectedRows = HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'image' => 'upload/home_slide/'.$imageName,
            ]);
        } else {
            $affectedRows = HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);
        }

        if($affectedRows > 0) {
            $toastNotif = array(
                'message' => 'Home Slide Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $toastNotif = array(
                'message' => 'Home Slide Update Failed',
                'alert-type' => 'error',
            );
        }


        return redirect()->back()->with($toastNotif);
    }
}
