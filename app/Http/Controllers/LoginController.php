<?php

namespace App\Http\Controllers;
use App\Http\Requests\loginrequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }

    public function login( loginrequest $request ){

        $credentiales = $request->getCredentials();

        if( Auth::validate($credentiales) ){
            return redirect()->to('/')->withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentiales);
        $module='menu';


        Auth::login($user);

        return $this->authenticated($request,$user,$module);
    }

    public function authenticated (Request $request,$user,$module){
        
        // return redirect()->route('profile', ['id' => 1]);
        return redirect()->route('menu');

    }

    public function logout (Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
