<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CameraSetting;
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
        // $path = Storage::disk('public')->url('/');
        $path = Storage::disk('s3')->url('/');
        $report = VehicleReport::orderBy('id', 'DESC')->simplePaginate(15);
        $csv = VehicleReport::orderBy('id', 'DESC')->get();
        $device = CameraSetting::get();
        return view('report', compact('report', 'csv', 'path', 'device'));
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

    public function filter(Request $request)
    {
        // return $request->datetimes;
        $camera_id = $request->camera_id;
        $date = explode(" - ", $request->datetimes);
        if ($request->camera_id == '') {
            $report = VehicleReport::whereBetween('created_at', [$date[0], $date[1]])->orderBy('id', 'DESC')->simplePaginate(15);
            $csv = VehicleReport::whereBetween('created_at', [$date[0], $date[1]])->orderBy('id', 'DESC')->get();

        } else {

            $report = VehicleReport::whereBetween('created_at', [$date[0], $date[1]])->Where('camera_id', $camera_id)->orderBy('id', 'DESC')->simplePaginate(15);
            $csv = VehicleReport::whereBetween('created_at', [$date[0], $date[1]])->Where('camera_id', $camera_id)->orderBy('id', 'DESC')->get();
        }

        $path = Storage::disk('s3')->url('/');
        $device = CameraSetting::get();
        return view('report', compact('report', 'csv', 'path', 'device'));
    }

    public function Clear()
    {
        $path = Storage::disk('s3')->url('/');
        $report = VehicleReport::orderBy('id', 'DESC')->simplePaginate(15);
        $csv = VehicleReport::orderBy('id', 'DESC')->get();
        $device = CameraSetting::get();

        foreach ($csv as $key => $value) {
            
            $ob = explode("/", $value->image)[1];
            Storage::disk('s3')->delete($ob);
        }

        VehicleReport::truncate();

        return view('report', compact('report', 'csv', 'path', 'device'));
    }
}
