<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Support;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function main (Request $request, Support $support): View 
    {
        // Take all the supports
        $supports = $support->all();

        return view('main', [
            'user' => $request->user(),
            'support' => $supports,
            // 'subjects' => $supports->pluck('subject'),
        ]);
    }

    public function edit (Request $request): View
    {
        return view('profile/edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = $request->user();
        if ($request->hasFile('profile_photo')) {
            // Deleta a foto antiga, se existir
            if ($user->profile_photo) {
                Storage::delete('public/' . $user->profile_photo);
            }

            // Salva a nova foto e armazena o caminho
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
        $user->save();
        return redirect()->route('profile.edit')->with('status', 'Profile Photo uploaded!');
    }

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

    // public function showUserSupports(Request $request): View
    // {
    //     $user = $request->user(); // Obtenha o usuário autenticado
    //     $supports = $user->supports; // Acesse todos os supports associados ao usuário

    //     return view('profile.user-supports', compact('user', 'supports'));
    // }
}
