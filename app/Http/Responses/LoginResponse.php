<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    /**
     * If role name is 'Administrator', the user is redirected to intranet area.
     * In other cases - client area.
     */
    public function toResponse($request)
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($user->role->name != "Client") {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect('intranet/dashboard');
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(config('fortify.home'));
    }
}
