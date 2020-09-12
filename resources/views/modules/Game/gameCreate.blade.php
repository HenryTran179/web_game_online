@extends('adminMaster')
@section('ad-title', 'Create Game')
@section('mainContent')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="container"
        style="border-color: darken($sidebar-light-hover-bg, 5%);">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Create Game</h2>
                    </div>
                    <!-- form start -->
                    <form role="form" action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group row">
                                <label for="game" class="col-sm-2">Name</label>
                                <input type="text" class="form-control col-sm-10" name="name" value="{{ old('name') }}"
                                    placeholder="Enter name">
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-2">Choose category</label>
                                <select name="category_id" class="form-control col-sm-10" id="category_name">
                                    @foreach ($data as $category)
                                    <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-2">Enter Link</label>
                                <input type="text" class="form-control col-sm-10" name="link_name" value="{{ old('link_name') }}"
                                    id="link" placeholder="Enter link">
                            </div>
                            <div class="form-group row">
                                <label for="gameage" class="col-sm-2">Choose game age</label>
                                <input type="number" id="gameage" class="form-control col-sm-10" placeholder="Choose Age *" name="age"
                                    min="5" value="{{ old('age') }}" />
                            </div>
                            <div class="form-group row">
                                <label for="avata" class="col-sm-2">Choose image file</label>                                
                                <input type="file" id="avata" class="form-control col-sm-10" name="img_name" accept='image/*'>
                            </div>

                            <div class="form-group row">    
                                <label for="exampleInputImage" class="col-sm-2">Enter video link</label>
                                <input type="text" name="video_name" class="form-control col-sm-10" placeholder="Video link"
                                    id="exampleInputImage">
                            </div>
                            <div class="form-group">
                                <label for="note1">Control</label>
                                <textarea name="note" id="note1" value="{{ old('note') }}" class="form-control" cols="30"
                                    rows="10" placeholder="Enter Control"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('note1');
                                </script>
                            </div>
                            <div class="form-group row d-flex">
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
