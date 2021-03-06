<?php

class NumberAdminController extends \BaseController {


    public function showAdminView(){

        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user(); #get user

        $numbers = Number::where('ocn', '=', $user->ocn)->get();

        return View::make('numadmin.index', ['numbers' => $numbers]);

    }




    public function showResetPasswordView()
    {
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user(); #get user


        return View:: make('numadmin.reset');
    }


    public function resetPassword(){

        $user = Auth:: user();


        $admin = User:: find($user->id);


        if(Input::get('newpassword') == Input::get('repassword')){ #validate new password
            $admin->password = Hash::make(Input::get('newpassword'));
            $admin->save();

            Session::flash('success_message', 'Password Reset Successful!');
            return Redirect::to('/numadmin');
        }

        Session::flash('error_message', 'Passwords entered do not match. Please re-try!');
        return Redirect::back();

    }


    public function showEditProfileView(){

        $user = Auth::user();

        return View::make('numadmin.edit', ['admin' => $user]);

    }

    public function editProfile(){

        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = User::find(Auth::user()->id);

        if(Input::get('ocn') == "0"){

            Session::flash('error_message', 'OCN cannot be zero.');
            return Redirect::back()->withInput();

        }

        $user->ocn = Input::get('ocn');
        $user->assignee = Input::get('assignee');
        $user->save();

        Session::flash('success_message', 'Edit saved.');
        return Redirect::to('/numadmin');

    }






}
