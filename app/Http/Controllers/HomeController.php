<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.home');
    }

    public function showProfile(User $user)
    {
        return view('employee.profile', compact('user'));
    }

    public function editProfile(User $user)
    {
        // Authorization
        $this->authorize('touchUser', $user->profile);

        return view('employee.editprofile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        // Authorization
        $this->authorize('touchUser', $user->profile);

        $user->profile()->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        if ($request->avatar) {
            // Save the image
            $featured          = $request->avatar;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/custom/avatars/', $featured_new_name);

            $user->avatar = 'uploads/custom/avatars/' . $featured_new_name;
            $user->save();
        }

        return redirect(route('employee.show', $user))->withSuccess('Your account updated successfully!');
    }
}
