<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class MyController extends Controller
{
    //==========================================================    Navigation parts Start   =======================
    public function HomePage($id){ //Home Page 

        $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/')->with('msg','Login First');
                }
    
                $user = DB::table('users')->where('id',$id)->first();
                $users = DB::table('users')->get();  //Get All class table contants from class table(DB)
                return view('Home',compact('users','user'));

        // $user = DB::table('users')->where('id',$id)->first();
        // $users = DB::table('users')->get();  //Get All class table contants from class table(DB)
        // return view('Home', compact('users'));
    }


    public function LoginPage(){ //Home Page 
        return view('Login');
    }


    public function getusers(){
        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

        $us = DB::table('users')->get();

        return view('viewusers',compact('us'));
    }


    public function adduser(Request $req){  //Daa USER ======================
        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/')->with('msg','Login First');
            }

        $req->validate([
            'UName'=>'required',
            'UEmail'=>'required|min:11',
            'UPassword'=>'required|min:8',
        ],[
            //User name Add
            'UName.required'=>'User Name is must',
            //User Email Add
            'UEmail.required'=>'User E-mail is must',
            'UEmail.min'=>'User E-mail Minimum 12 letters must',
            //User Password Add
            'UPassword.required'=>'User Password is must',
            'UPassword.min'=>'User Name Password Minimum 8 letters must',
        ]);

        $cnt = count(DB::table('users')->get());
        
        $use = new User;
        $use->name = $req->UName;
        $use->email = $req->UEmail;
        $use->password = Hash::make($req->UPassword);

        $use->save();

        $notification = array(
            'message' => 'Successfully Saved', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edituser(Request $req) { //EDIT USER =======================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/')->with('msg','Login First');
            }

        $req->validate([
            'EUName'=>'required',
            'EUEmail'=>'required|min:12',
            'EUPassword'=>'required|min:8',
        ],[
            //User name Add
            'EUName.required'=>'User Name is must',
            //User Email Add
            'EUEmail.required'=>'User E-mail is must',
            'EUEmail.min'=>'User E-mail Minimum 12 letters must',
            //User Password Add
            'EUPassword.required'=>'User Password is must',
            'EUPassword.min'=>'User Name Password Minimum 8 letters must',
        ]);

        $hash = Hash::make($req->EUPassword);

        DB::table('users')->where('id' , $req->EUID)->update([

            'name' => $req->EUName,
            'email' => $req->EUEmail,
            'password' => $hash
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteuser($i){  //DELETE USER ==========================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/')->with('msg','Login First');
            }
        DB::table('users')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function log(Request $req) { //Login Function
        $user = DB::table('users')->where('email',$req->email)->first();
        if($user){
            if(Hash::check($req->password ,$user->password )){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$user->id]);
                return redirect()->route('HomePage',['c'=>$user->id]);
            }   else{
                    $notification = array(
                        'message' =>'Password wrong', 
                        'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }
        }   else{
                $notification = array(
                    'message' =>'User does not exist', 
                    'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logout(){ //Logout
        session()->flush();
        session()->regenerate();
        return view('Login');
    
    }
}
