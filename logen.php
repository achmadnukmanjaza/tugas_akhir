<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ModelKontak;
use validator;

class logen extends Controller 
{
    public function index()
    {
        return view('logen');
    }
    public function cek(request $req)
    {
        $this->validate($req,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $proses = modelKontak::where('username',$req->username)->where('password',$req->password)->first();
            if($proses) {
                Session::put('id',$proses->id);
                Session::put('username',$proses->username);
                Session::put('multilevel',$proses->multilevel);              
                Session::put('email',$proses->email);
                Session::put('password',$proses->password);
                Session::put('logen_status',true);
                return redirect('/');
            }else {
                Session::flash('alert_pesan','Username dan password tidak cocok');
                return redirect('logen');
            }
            
        }
        public function logout()
        {
            Session::flush();
            return redirect('logen');
        }
}