<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserAvatarRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
//    : RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

//        $request->user()->save();

        if ($request->user()->save()){
            return response()->json([
                'status' => true
            ]);
        }
        else{
            return response()->json([
                'status' => false
            ]);
        }

//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile Image.
     * @param UserAvatarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(UserAvatarRequest $request)
    {
        $user = User::find(Auth::user()->id);

        $imageName = $user->avatar;
        if ($request->file('avatar') != null){

            if ($user->avatar != 'default.png'){
                unlink(public_path('build/assets/images/' . $user->avatar));
            }
            $imageName = time() . $request->file('avatar')->getClientOriginalName();
            $request->avatar->move('build/assets/images/', $imageName);
        }

        $user->avatar = $imageName;

        if ($user->save()){
            return response()->json([
                'status' => true
            ]);
        }
        else{
            return response()->json([
                'status' => false
            ]);
        }
    }

    /**
     * Update the user's profile Image.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removePicker(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->avatar != 'default.png'){
            unlink(public_path('build/assets/images/' . $user->avatar));
        }

        $user->avatar = 'default.png';

        if ($user->save()){
            return response()->json([
                'status' => true
            ]);
        }
        else{
            return response()->json([
                'status' => false
            ]);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
