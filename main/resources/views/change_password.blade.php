@extends('layouts.master')

@section('content')
    <div class="main_section_area">
        <div class="form_area">

            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Update Password </h4>

                    <form class="forms-sample" action="{{ route('post_change_pass') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="oldPassword">Current Password</label>
                            <input type="text" class="form-control" id="oldPassword" name="current_pass" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Password</label>
                            <input type="password" class="form-control" id="newPassword" name="pass" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="ConfirmPassword1" name="cnf_pass" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
