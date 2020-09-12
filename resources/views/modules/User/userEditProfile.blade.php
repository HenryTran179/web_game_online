@extends('master')
@section('title', 'Edit My Profile')
@section('content')
<section class="main-content">
    <div class="container">
        <form method="POST" action="{{ route('user.updateprofile',['id'=>$data->id])}}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error1)
                    <li>{{ $error1 }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="card card-primary" style="border-top: 3px solid #fd7e14 !important;">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid img-circle" width="154px" height="auto"
                                    src="{{ asset('images/User/' . $data->file) }}" alt="User profile picture">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <input type="file" class="form-control" name="file" value="Update avatar"
                                    accept='image/*'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <div class="card-title col-md-2">
                                <h4>Edit Profile</h4>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName"
                                        value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                            value="1" {{ $data->gender == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                            value="0" {{ $data->gender == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" name="birthday" class="form-control"
                                        value="{{ $data->birthday }}">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                    <label for="avatar" class="col-sm-2 col-form-label">Avartar</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="avata" name="file" accept='image/*'>
                                    </div>
                                </div> --}}
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
        </form>
    </div>
    <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    </div>
</section>

@endsection