@extends('adminMaster')
@section('ad-title', 'User List Table')
@section('mainContent')

    <div class="card text-center">
      
        <!-- /.card-header -->
        <div class="card-body ">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                        <th>Status</th>
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
                            <td>{{ $data2->email }}</td>
                            <td>{{ $data2->isadmin }}</td>
                            <td>{{ $data2->status }}</td>
                            <td>{{ date('d/m/Y h:i:s', strtotime($data2->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i:s', strtotime($data2->updated_at)) }}</td>
                            <td><a href="{{ route('admin.delete', ['id' => $data2->id]) }}"
                                    onclick="return accepDelete('Bạn có chắc muốn xóa  không ')">Delete</a></td>
                            <td><a href="{{ route('admin.edit', ['id' => $data2->id]) }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
