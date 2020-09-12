@extends('adminMaster')
@section('ad-tile','Edit')
@section('mainContent')
<form method="POST" action="{{ route('user.update',['id'=>$data->id])}}">
    @csrf
    <div class="container">
<div class="card">
    <div class="card-header bg-blue">
        <h3 class="card-title">Modify Acccount</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">PassWord</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{$data->password}}">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!-- /.card-footer-->
</div>
</div>
</form>
@endsection