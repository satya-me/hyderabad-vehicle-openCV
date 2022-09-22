@extends('layouts.master')

@section('content')
    <div class="main_section_area">
        <div class="table_area">
            <div class="container">
                <div class="row">

                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>
                                    <h6 class="title_table">Device Id Fillter</h6>
                                    <div class="select">
                                        <!-- <select id="assigned-user-filter" class="form-control  input_style"> -->
                                        <select id="assigned-user-filter" class=" input_style">
                                            <option>None</option>
                                            <option>John</option>
                                            <option>Rob</option>
                                            <option>Larry</option>
                                            <option>Donald</option>
                                            <option>Roger</option>
                                        </select>
                                    </div>

                                </th>
                                <th>
                                    <h6 class="title_table">Date Range Fillter</h6>
                                    <!-- <select id="status-filter" class="form-control">
                          <option>Any</option>
                          <option>Not Started</option>
                          <option>In Progress</option>
                          <option>Completed</option>
                        </select> -->
                                    <input type="text" name="datetimes" class="form-control input_style">
                                </th>


                            </tr>
                        </thead>
                    </table>


                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                            <div class="pull-right"></div>
                        </div>





                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Camra Id</th>
                                    <th> Date</th>
                                    <th>Volume</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry"
                                    data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent"
                                    data-tags="Tag 2">
                                    <td>1</td>
                                    <td>1A</td>
                                    <td>09/24/2015</td>
                                    <td>500</td>
                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry"
                                    data-status="Not Started" data-milestone="Milestone 2" data-priority="Low"
                                    data-tags="Tag 1">
                                    <td>2</td>
                                    <td>2A</td>
                                    <td>09/24/2018</td>
                                    <td>600</td>

                                </tr>

                                <tr id="task-3" class="task-list-row" data-task-id="3" data-user="Donald"
                                    data-status="Not Started" data-milestone="Milestone 1" data-priority="Low"
                                    data-tags="Tag 3">
                                    <td>3</td>
                                    <td>2B</td>
                                    <td>05/24/2014</td>
                                    <td>500</td>

                                </tr>


                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald"
                                    data-status="Completed" data-milestone="Milestone 1" data-priority="High"
                                    data-tags="Tag 1">
                                    <td>1</td>
                                    <td>1A</td>
                                    <td>09/24/2015</td>
                                    <td>500</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="download_btn">
            <div class="download-container">
                <a href="#" class="download-btn">Export csv <i class="fas fa-download"></i></a>
                <div class="countdown"></div>
                <div class="pleaseWait-text">Please wait ...</div>
                <div class="manualDownload-text">
                    If the download didn't start automatically, <a href="#" class="manualDownload-link"
                        target="_top">click
                        here</a>
                </div>
            </div>
            <div class="download-container">
                <a href="#" class="download-btn">Export Pdf <i class="fas fa-download"></i></a>
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
