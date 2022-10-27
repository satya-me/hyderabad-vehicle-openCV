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
        $location = $request->lat . ',' . $request->long;

        $cam = new CameraSetting;
        $cam->location_name = $request->location_name;
        $cam->camera_id = $request->camera_id;
        $cam->location = $location;
        $cam->save();

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        // return $request;
        $cam_id_primary = $request->cam_id;
        $location_name = $request->location_name;
        $location = $request->lat . ',' . $request->long;

        CameraSetting::where('id', $cam_id_primary)->update(['location_name' => $location_name, 'location' => $location]);
        return redirect()->back();

    }
}
