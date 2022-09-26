<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VehicleReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('dashboard');
    }

    public function report()
    {
        $path = Storage::disk('public')->url('/');
        $report = VehicleReport::orderBy('id', 'DESC')->get();
        return view('report', compact('report', 'path'));
    }

    public function password()
    {
        return view('change_password');
    }

    public function updatePassword(Request $request)
    {

        // return $request;
        $user = User::where('email', '=', Auth::user()->email)->first();
        $check = Hash::check($request->current_pass, $user->password);

        if ($check) {
            // return "Ok";
            if ($request->pass == $request->cnf_pass) {

                $upPass = Hash::make($request->cnf_pass);
                DB::table('users')->where('email', Auth::user()->email)->update(['password' => $upPass]);
                return $this->report();

            } else {
                return view('change_password');

            }

        } else {
            // return "no";
            return view('change_password');

        }

        return view('change_password');
    }
}
