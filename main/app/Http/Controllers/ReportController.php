<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CameraSetting;
use App\Models\VehicleReport;
use Carbon\Carbon;
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

        $date = "screenshot";
        $make_image_name = time() . '_' . $request->camera_id . '_' . $report->id . '.' . $ext;

        DB::table('vehicle_reports')->where('id', $report->id)->update(['image' => $date . '/' . $make_image_name]);
        if (Storage::disk('s3')->put($date . '/' . $make_image_name, fopen($request->file('image'), 'r+'))) {
            $flag = true;
        }

        // return Storage::get($date . '/' . $make_image_name);
        if ($flag == true) {
            return response()->json([
                "message" => "Insert vehicle reports successfully",
                "file_name" => $make_image_name,
                "img" => $img,
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

    public function information(Request $request)
    {
        $allCam = CameraSetting::get();

        for ($i = 0; $i < count($allCam); $i++) {
            # code...
            $status = VehicleReport::where('camera_id', $allCam[$i]->camera_id)->latest('created_at')->first();
            // $resp['status'] = $status->device_id;
            // $resp['status'] = $status->count;
            
            if ($status != null && $status->created_at->diffInMinutes(\Carbon\Carbon::now()) <= 17) {
                $resp['status'] = 'ONLINE';
                $resp['location'] = $allCam[$i]->location;
                $resp['lat'] = explode(',',$allCam[$i]->location)[0];
                $resp['long'] = explode(',',$allCam[$i]->location)[1];
                $resp['name'] = $allCam[$i]->location_name;
                $resp['id'] = $allCam[$i]->camera_id;
                $resp['status_id'] = $allCam[$i]->id.'_'.$allCam[$i]->camera_id;
                $resp['png'] = 'main/public/images/mapicon/cctvonline.png';
                
            } else {
                $resp['status'] = 'OFFLINE';
                $resp['location'] = $allCam[$i]->location;
                $resp['lat'] = explode(',',$allCam[$i]->location)[0];
                $resp['long'] = explode(',',$allCam[$i]->location)[1];
                $resp['name'] = $allCam[$i]->location_name;
                $resp['id'] = $allCam[$i]->camera_id;
                $resp['status_id'] = $allCam[$i]->id.'_'.$allCam[$i]->camera_id;
                $resp['png'] = 'main/public/images/mapicon/cctvoffline.png';

            }
            $cam[] = $resp;
        }
        return $cam;
    }
}
