@extends('layouts.master')

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
                                        <label for="exampleInputEmail1">Location Name</label>
                                        <input type="text" name="location_name" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter Location Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Camera Id</label>
                                        <input type="text" name="camera_id" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter Location Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Latitude and Longitude</label>
                                        <input type="text" name="lat_long" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter Location Name">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cam as $k => $v)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $v->location_name }}</td>
                                <td>{{ $v->camera_id }}</td>
                                <td>{{ $v->created_at }}</td>
                                <td>{{ $v->status ? $v->status : ' Failed' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
