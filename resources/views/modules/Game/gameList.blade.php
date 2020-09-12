@extends('adminMaster')
@section('ad-title', 'Game List')
@section('mainContent')
    <div class=" mt-5 mb-3 ml-3" style="opacity: 0.8;">
        <div class="card-header bg-blue">
            <h3 class="card-title">Show Game Infomation</h3>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    {{-- <th>Link</th> --}}
                    <th>Age</th>
                    <th>Image</th>
                    <th>Video</th>
                    {{-- <th>Control</th> --}}
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data2)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data2->name }}</td>
                        <td>{{ $data2->category_name }}</td>
                        {{-- <td>{{ $data2->link_name }}</td> --}}
                        <td>{{ $data2->age }}</td>
                        
                        <td> <img src="{{ asset('img/'. $data2->img_name) }}" height="100px" width="auto"
                                alt="Image"></td>
                        <td><iframe width="auto" height="170px" src={{ ($data2->video_name) }}></iframe></td>
                        {{-- <td>{{ $data2->note }}</td> --}}
                        <td>{{ date('d/m/Y h:i:s', strtotime($data2->created_at)) }}</td>
                        <td>{{ date('d/m/Y h:i:s', strtotime($data2->updated_at)) }}</td>
                        <td><a href="{{ route('game.delete', ['id' => $data2->id]) }}"
                                onclick="return accepDelete('Bạn có chắc muốn xóa  không ')">Delete</a></td>
                        <td><a href="{{ route('game.edit', ['id' => $data2->id]) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" text-center mb-3">
        <a href="{{ route('game.create') }}">
            <button class="btn bg-blue" type="submit">Create new game</button>
        </a>
    </div>
    </div>
    </div>
@endsection
