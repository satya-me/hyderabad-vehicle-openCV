@extends('layouts.master')

@section('content')
    <div class="main_section_area">
        <div class="table_area">
            <div class="container">
                <div class="row">

                    <table class="table">
                        <thead>
                            <form action="{{ route('filter') }}" method="get">
                                @csrf
                                <tr class="filters">
                                    <th>
                                        <h6 class="title_table">Camera Id Fillter</h6>
                                        <div class="select">
                                            <!-- <select id="assigned-user-filter" class="form-control  input_style"> -->
                                            <select id="assigned-user-filter" name="camera_id" class="input_style">
                                                <option value="" disabled selected>-- Select --</option>
                                                <option>None</option>
                                                @foreach ($device as $k => $v)
                                                    <option value="{{ $v->camera_id }}">{{ $v->camera_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </th>
                                    <th>
                                        <h6 class="title_table">Date Range Fillter</h6>
                                        <input type="text" name="datetimes" class="form-control input_style">
                                    </th>
                                    <th>
                                        <button type="submit" class="btn_search">Filter</button>
                                    </th>
                                </tr>
                            </form>
                        </thead>
                    </table>


                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                            <div class="pull-right"></div>
                        </div>

                        <table id="task-list-tbl" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Device Id</th>
                                    <th>Camra Id</th>
                                    <th>Date</th>
                                    <th>Count</th>
                                    <th>Image</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($report as $k => $v)
                                    <tr id="task-1" class="task-list-row" data-task-id="1"
                                        data-user="{{ $v->camera_id }}" data-status="In Progress"
                                        data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                        <td>{{ ++$k }}</td>
                                        <td>{{ $v->device_id }}</td>
                                        <td>{{ $v->camera_id }}</td>
                                        <td>{{ $v->created_at }}</td>
                                        <td>{{ $v->count }}</td>
                                        <td>
                                            {{-- <button class="img_popup_btn" >
                                            </button> --}}
                                            <i class="fa fa-picture-o fa-3x" aria-hidden="true" data-toggle="modal"
                                                data-target="#{{ 'image' . $v->id }}"></i>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg" id="{{ 'image' . $v->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="{{ 'image' . $v->id }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <?php 
                                                    $IM =  explode("/",$v->image)[1];    
                                                    ?>
                                                    <h5 class="modal-title" id="{{ 'image' . $v->id }}Title">IMAGE : {{ $IM }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal_img">
                                                        <img class="fx" src="{{ $path . $v->image }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ $report->links() }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- in visible content --}}
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <table id="example" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Sl No</th>
                            <th>Device Id</th>
                            <th>Camra Id</th>
                            <th>Date</th>
                            <th>Count</th>
                            <th>Image</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($csv as $k => $v)
                            <tr id="task-1" class="task-list-row" data-task-id="1" data-user="{{ $v->camera_id }}"
                                data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent"
                                data-tags="Tag 2">
                                <td>{{ ++$k }}</td>
                                <td>{{ $v->device_id }}</td>
                                <td>{{ $v->camera_id }}</td>
                                <td>{{ $v->created_at }}</td>
                                <td>{{ $v->count }}</td>
                                <td>
                                    {{ $path . $v->image }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- in visible content --}}
        <div class="download_btn">

            <div class="download-container">
                <a href="#" class="download-btn">Export CSV <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                <div class="countdown"></div>
                <div class="pleaseWait-text">Please wait ...</div>
                <div class="manualDownload-text">
                    If the download didn't start automatically, <a href="#" class="manualDownload-link"
                        target="_top">click
                        here</a>
                </div>
            </div>
        </div>

    </div>
@endsection
