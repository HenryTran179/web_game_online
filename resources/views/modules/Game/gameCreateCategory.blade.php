@extends('adminMaster')
@section('ad-title', 'Create Game Category')
@section('mainContent')

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    
    <div class="container "
        style="border-color: darken($sidebar-light-hover-bg, 5%);">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Create Category</h2>
                    </div>
                    <!-- form start -->
                    <form role="form" action="{{ route('game.storecategory') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            {{-- ERROR --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Default box -->
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Name"
                                    id="category">
                            </div>
                            <div class="form-group card-footer row d-flex">
                                <div class="col-md text-center">
                                    <button type="submit" class="btn bg-blue">Add now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
