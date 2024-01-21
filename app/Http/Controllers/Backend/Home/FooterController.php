<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
{
    public function getContactMe() {
        $contactMe = Contact::select('id', 'phone', 'email', 'short_desc')->where('id', 1)->first();
        return view('admin.footer.contact-me', compact('contactMe'));
    }

    public function updateContactMe(Request $request) {
        $validated = Validator::make($request->all(), [
            'short_desc' => 'required',
            'phone' => 'required|phone:ID',
            'email' => 'required|email',
        ]);

        $id = $request->id;

        $update = Contact::find($id)->update([
            'short_desc' => $request->short_desc,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Contact Me updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Contact Me update failed',
                'alert-type' => 'error',
            );
        }

        return redirect()->back()->with($notif);
    }

    public function getMyAddress() {
        $myAddress = Contact::select('id', 'nation', 'address')->where('id', 1)->first();
        return view('admin.footer.address', compact('myAddress'));
    }

    public function updateMyAddress(Request $request) {
        $validated = $request->validate([
            'nation' => 'required',
            'address' => 'required',
        ]);

        $id = $request->id;

        $update = Contact::find($id)->update([
            'nation' => $request->nation,
            'address' => $request->address,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Address updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Address update failed',
                'alert-type' => 'error',
            );
        }

        return redirect()->back()->with($notif);
    }

    public function getSocial() {
        $social = Contact::select('id', 'linkedin', 'instagram', 'twitter', 'youtube')->where('id', 1)->first();
        return view('admin.footer.social', compact('social'));
    }

    public function updateSocial(Request $request) {
        $id = $request->id;

        $update = Contact::find($id)->update([
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Social Media updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Social Media update failed',
                'alert-type' => 'error',
            );
        }

        return redirect()->back()->with($notif);
    }
}
