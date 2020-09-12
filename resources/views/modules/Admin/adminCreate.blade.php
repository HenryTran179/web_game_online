@extends('adminMaster')
@section('ad-title', 'Create Admin')
@section('mainContent')
    <section class="content-header">
        <div class="container" style="border-color: darken($sidebar-light-hover-bg, 5%);">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Create Game</h2>
                        </div>
                        <!-- form start -->
                        <form role="form" class="form-horizontal " action="{{ route('admin.store') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="email" class="fadeIn second form-control" name="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" id="password" class="fadeIn third  form-control"
                                            name="password" placeholder="Password" value="{{ old('password') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-4 col-sm-8 row">
                                        <div class="form-check col-sm-4">
                                            <input type="radio" name="isadmin" class="form-check-input " id="exampleCheck1"
                                                value="1">
                                            <label class="form-check-label" for="exampleCheck1">Is Admin</label>
                                        </div>

                                        <div class="form-chec col-sm-4 ml-3">
                                            <input type="radio" name="isadmin" class="form-check-input" id="exampleCheck2"
                                                value="0" checked>
                                            <label class="form-check-label" for="exampleCheck2">Non Admin</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
