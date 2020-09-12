@extends('master')
@section('title', 'My Profile')
@section('u-title', 'My Profile')
@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary" style="border-top: 3px solid #fd7e14 !important;">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="img-fluid img-circle" width="154px" height="auto"
                                src="{{ asset('images/User/' . $data->file) }}" alt="User profile picture">
                        </div>
                        <h3 class="text-muted text-center">{{ $data->name }}</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <p>{{ $data->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10 ">
                                        <?php if( $data->gender==1 )
                                            echo "Male";
                                        else
                                            echo "Female";                                       
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <p>{{  $data->birthday }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <a href="{{ route('user.editprofile') }}">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    </div>
</section>

@endsection