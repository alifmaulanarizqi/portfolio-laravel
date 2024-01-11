<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AdminController extends Controller
{
    private $imagePath = 'upload\admin_images\\';

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $toastNotif = array(
            'message' => 'User Logout Sucessfully',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($toastNotif);
    }

    public function profile() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user-profile', compact('user'));
    }

    public function profileEdit() {
        $id = Auth::user()->id;
        $userEdit = User::find($id);
        return view('admin.user-profile-edit', compact('userEdit'));
    }

    public function storeProfile(Request $request) {
        $id = Auth::user()->id;
        $userEdit = User::find($id);

        $validator  = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id, 'id')],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($id, 'id')],
        ],[
            'username.unique' => 'The username is already taken',
            'email.unique' => 'The email address is already taken',
        ]);

        if($validator->errors()->has('username')) {
            $toastNotif = array(
                'message' => $validator->errors()->first('username'),
                'alert-type' => 'warning',
            );
            return back()->with($toastNotif);
        } else if($validator->errors()->has('email')) {
            $toastNotif = array(
                'message' => $validator->errors()->first('email'),
                'alert-type' => 'warning',
            );
            return back()->with($toastNotif);
        }

        $userEdit->name = $request->name;
        $userEdit->email = $request->email;
        $userEdit->username = $request->username;

        if($request->file('profile_image')) {
            $editedImageFilePath = $this->imagePath . $userEdit->profile_image;
            if (File::exists(public_path($editedImageFilePath))) {
                File::delete(public_path($editedImageFilePath));
            }

            $file = $request->file('profile_image');

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);

            $userEdit->profile_image = $fileName;
        }

        if($userEdit->save()) {
            $toastNotif = array(
                'message' => 'Admin Profile Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $toastNotif = array(
                'message' => 'Error Updating Admin Profile',
                'alert-type' => 'error',
            );
        }

        return redirect()->route('admin.profile')->with($toastNotif);
    }

    public function changePassword() {
        return view('admin.admin-change-password');
    }

    public function updatePassword(Request $request) {
        $validator  = $request->validate([
            'old_password' => ['required',
            function ($attribute, $value, $fail) use ($request) {
                $hashedPassword = Auth::user()->password;
                if (!Hash::check($request->old_password, $hashedPassword)) {
                    $fail('The old password is incorrect');
                }
            },],
            'new_password' => ['required', Password::defaults()],
            'confirmation_password' => ['required', 'same:new_password'],
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->new_password);
            $user->save();

            $toastNotif = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($toastNotif);
        }

        return redirect()->back();
    }
}
