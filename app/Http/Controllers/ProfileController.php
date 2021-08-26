<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;

class ProfileController extends Controller
{
    // Tampilkan halaman profile
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    // Tampilkan halaman edit
    public function edit() 
    {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    // Proses edit/update data
    public function update(Request $request, $id) 
    {
        $user = User::findorfail($id);
        $user->update($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        $user->save();
        return redirect('/profile')->with('sukses', 'Data berhasil diubah!');
    }
    
    public function changePassword() 
    {
        $user = Auth::user();
        return view('user.changepassword', ['user' => $user]);
    }

    public function updatePassword(Request $request) 
    {
        if(Auth::Check())
        {
            $requestData = $request->all();
            $validator = $this->validatePasswords($requestData);
            if($validator->fails())
            {
                // return back()->withErrors($validator->getMessageBag());
                return redirect('/profile')->with('gagal', 'Maaf, Ada yang salah dengan password baru anda, bisa jadi terlalu pendek. coba panjangkan sedikit.');
            }
            else
            {
                $currentPassword = Auth::user()->password;
                if(Hash::check($requestData['password'], $currentPassword))
                {
                    $userId = Auth::user()->id;
                    $user = User::findorfail($userId);
                    $user->password = Hash::make($requestData['password-baru']);;
                    $user->save();
                    return redirect('/profile')->with('sukses', 'Password berhasil diganti.');
                }
                else
                {
                    return redirect('/profile')->with('gagal', 'Maaf, Password anda yang sekarang tidak dapat dikenali.');
                }
            }
        }
        else
        {
            // Auth check failed - redirect to domain root
            return redirect('/profile');
        }
        // return view('user.changepassword', ['user' => $user]);
    }

    public function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Input password anda',
            'password-baru.required' => 'Input password baru anda',
            'password-baru-confirm.not_in' => 'Maaf, password yang anda input terlalu mudah. Coba cari lagi.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'password-baru' => ['required', 'same:password-baru-confirm', 'min:8', Rule::notIn($this->bannedPasswords())],
            'password-baru-confirm' => 'required|same:password-baru',
        ], $messages);

        return $validator;
    }

    public function bannedPasswords(){
        return [
            'password', '12345678', '123456789', 'baseball', 'football', 'jennifer', 'iloveyou', '11111111', '222222222', '33333333', 'qwerty123'
        ];
    }
}
