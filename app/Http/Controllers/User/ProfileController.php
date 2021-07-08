<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.index');
    }

    public function changePassword(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->getAuthPassword())) {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Eski Şifrenizi Hatalı Girdiniz! Lütfen Kontrol Edip Tekrar Deneyin.']);
        } else if ($request->password != $request->confirm_password) {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Yeni Şifreler Birbiriyle Aynı Değil! Lütfen Kontrol Edip Tekrar Deneyin.']);
        } else {
            $user = User::find(auth()->user()->getId());
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with(['type' => 'success', 'data' => 'Şifreniz Başarıyla Güncellendi']);
        }
    }
}
