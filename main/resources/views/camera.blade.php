@extends('layouts.master')

@section('js')
<script src="{{ asset('/main/public') }}/js/custom.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="main_section_area">
        <div class="main_camera_setting_area">
            <div class="new_camera_add">
                <div class="page_title">
                    <h4>Camera Setting</h4>
                </div>
                <div class="button_area">
                    <!-- <button class="btn_cls" data-toggle="modal" data-target="#exampleModal">Add New Camera</button> -->
                    <button class="btn btn-1 btn-sep icon-info" data-toggle="modal" data-target="#exampleModal">Add New
                        Camera</button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add To New Camera Setting</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <form action="{{ route('camera_add') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Location Name</label>
                                        <input type="text" name="location_name" class="form-control" id=""
                                            aria-describedby="emailHelp" placeholder="Enter Location Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Camera Id <small class="not_change">
                                                {{ " :(You can't change camera id after submit.)" }}</small></label>
                                        <input type="text" name="camera_id" class="form-control" id=""
                                            aria-describedby="emailHelp" placeholder="Enter Camera Id">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Latitude :</label>
                                        <input type="text" name="lat" class="form-control"
                                            placeholder="Enter Latitude">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Longitude :</label>
                                        <input type="text" name="long" class="form-control"
                                            placeholder="Enter Longitude">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class=" btn_style">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="camera_id_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl no</th>
                            <th scope="col">Location</th>
                            <th scope="col">Camera Id</th>
                            <th scope="col">Date Of Created</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cam as $k => $v)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $v->location_name }}</td>
                                <td>{{ $v->camera_id }}</td>
                                <td>{{ $v->created_at }}</td>
                                <td id="{{ $v->id.'_'.$v->camera_id }}"><iconify-icon icon="line-md:loading-alt-loop" style="color: blue;" width="28" height="28"></iconify-icon></td>
                                <td>
                                    <span class="badge badge-danger" data-toggle="modal"
                                        data-target="#edit_camera{{ $v->id }}">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </span>
                                    {{-- <a href="{{ route('edit_camera', $v->id) }}">
                                    </a> --}}
                                </td>
                            </tr>
                            @php
                                $lat = explode(',', $v->location)[0];
                                $long = explode(',', $v->location)[1];
                            @endphp

                            <!-- Modal -->
                            <div class="modal fade" id="edit_camera{{ $v->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="edit_cameraLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-uppercase" id="edit_cameraLabel">{{ $v->camera_id }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('edit_camera') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" name="cam_id" value="{{ $v->id }}">
                                                <div class="form-group">
                                                    <label for="">Location Name</label>
                                                    <input type="text" name="location_name" class="form-control"
                                                        value="{{ $v->location_name }}"
                                                        placeholder="Enter Location Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Camera Id <small class="not_change">
                                                            {{ " :(You can't change camera id!)" }}</small></label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $v->camera_id }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Latitude :</label>
                                                    <input type="text" name="lat" value="{{$lat}}" class="form-control"
                                                        placeholder="Enter Latitude">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Longitude :</label>
                                                    <input type="text" name="long" value="{{$long}}" class="form-control"
                                                        placeholder="Enter Longitude">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn_style_danger">Update <i
                                                        class="fa fa-video-camera" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
