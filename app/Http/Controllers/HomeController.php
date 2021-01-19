<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ImageService;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        $images = ImageService::getSliders(true);
        return view('welcome' , compact('images'));
    }
    //  Usualy I am using CustomRequest type , but havn't minutes :-) 
    public function uploadImage(Request $req){
        $validated = $req->validate([
            'email' => 'required|max:191',
            'image' => 'required',
        ]);
        $user = User::where('email' , $req->email)->first();
        if(!$user){
            $user = User::create(['email' => $req->email]);
        } 
        ImageService::insertImage($user->id , $req->image);
        \Auth::loginUsingId($user->id);
        return response()->json(['success' => true]);
    }

    public function userImages(){
        $user = \Auth::user();
        return view('images' , compact('user'));
    }
}
