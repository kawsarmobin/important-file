<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.index')
                ->with('profiles', Profile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profiles.create')
                ->with('profiles', Profile::all()->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'string',
        ]);

        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        if ($profile) {
            // Update...
            if ($request->hasFile('image')) {
              $avatar = $request->image;
              $avatar_new_name = time().'-'.$avatar->getClientOriginalName();
              $avatar->move('uploads/profiles', $avatar_new_name);
              $profile->image = $avatar_new_name;
            }

            $profile->user_id = $user_id;
            $profile->status = $request->status;

            if ($profile->save()) {
                Session::flash('success', 'Profile update successfully.');
            }
        } else {
            // Create...
            $avatar = $request->image;
            $avatar_new_name = time().'-'.$avatar->getClientOriginalName();
            $avatar->move('uploads/profiles', $avatar_new_name);

            $profile = new Profile();
            $profile->user_id = $user_id;
            $profile->image = $avatar_new_name;
            $profile->status = $request->status;

            if ($profile->save()) {
                Session::flash('success', 'Profile create successfully.');
            }
        }
        return redirect()->route('profiles.index');
    }
}
