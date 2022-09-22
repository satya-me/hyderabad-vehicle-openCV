<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CameraSetting;
use Illuminate\Http\Request;

class CameraController extends Controller
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
        $cam = CameraSetting::get();
        return view('camera', compact('cam'));
    }

    public function add(Request $request)
    {
        // return $request;

        $cam = new CameraSetting;
        $cam->location_name = $request->location_name;
        $cam->camera_id = $request->camera_id;
        $cam->location = $request->lat_long;
        $cam->save();

        return redirect()->back();
    }
}
