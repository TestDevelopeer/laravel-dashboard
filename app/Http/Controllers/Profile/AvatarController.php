<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request): RedirectResponse
    {
        // store avatar
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path() . "/$path"]);
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }
}
