<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Image;


class UserController extends Controller
{
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

    }
    public function toggleadmin(Request $request){
        $user = User::where('email', '=', $request->email)->first();

        if($request->state == "false") {
            $user->mod = 0;
        }else{
            $user->mod = 1;
        }
        $user->save();

        $array = [$user, $user->mod, $request->email, $request->state];

        return $array;
    }
}
