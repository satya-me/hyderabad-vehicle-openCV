<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VehicleReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request)
    {

        if ($request->isMethod('get')) {
            return response()->json([
                "message" => "Bad request handshake failed!",
                "dm" => "Bye Bye..!",
            ]);
        }
        // return $request;
        // return "API Call";
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();
        $ext = $img->getClientOriginalExtension();

        // return Storage::disk('public')->url('logo.png');

        $report = new VehicleReport;
        $report->device_id = $request->device_id;
        $report->camera_id = $request->camera_id;
        $report->count = $request->count;
        $report->image = '0';
        // $report->save();
        if ($report->save()) {
            $flag = true;
        }

        $make_image_name = time() . '_' . $request->camera_id . '_' . $report->id . '.' . $ext;
        DB::table('vehicle_reports')->where('id', $report->id)->update(['image' => $make_image_name]);
        
        if (Storage::disk('public')->put($make_image_name, fopen($request->file('image'), 'r+'))) {
            $flag = true;
        }

        if ($flag == true) {
            return response()->json([
                "message" => "Insert vehicle reports successfully",
                "file_name" => $make_image_name,
                "count" => $report->count,
                "dm" => "Bye Bye..!",
            ]);
        } else {
            return response()->json([
                "message" => "Bad request",
                "dm" => "Bye Bye..!",
            ]);
        }
    }
}
