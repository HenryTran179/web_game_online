@section('title','Information')
<link rel="shortcut icon" href="{{ asset( 'img/informationIcon.png') }}">
@include('blocks.head')
<link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
<link href="{{ asset( 'dist/css/adminlte.min.css') }}" rel="stylesheet" id="bootstrap-css">

    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="{{ asset( 'img/informationIcon.png') }}" id="icon" alt="Information Icon" />
        </div>
        <h2>Information</h2>
         <!--Error-->
         
        <!-- Imformation Form -->
        <form method="POST" action="{{ route('user.storeinfo', ['id'=>$id]) }}" enctype="multipart/form-data">
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
          <input type="text" id="email" class="fadeIn second" name="name" placeholder="Type Name">
          <div class="row fadeIn third">
                <div class="form-group col-md">
                    <label for="radiobtn1">Male</label>
                    <input type="radio" id="radiobtn1" name="gender" value="1" checked>           
                    <input type="radio" id="radiobtn2"  class="ml-5" name="gender" value="0">
                    <label for="radiobtn2">Female</label>
                </div>
            </div>
            <div class="row fadeIn fadeIn fourth">
                <div class="form-group col-md">
                    <label class="birthday" for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday">
                </div>
            </div>      
            <div class="row fadeIn fadeIn fourth">
                <div class="form-group col-md">
                    <label class="avata" for="avata">Avatar</label>
                    <input type="file" id="avata" name="file" accept='image/*'>
                </div>
            </div>     
          <input type="submit" id="login" class="fadeIn fourth" value="Submit">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
        </div>
      </div>
    </div>
@include('blocks.foot')
<script src="{{ asset( 'js/bootstrap.min.js') }}"></script>
<script src="{{ asset( 'js/jquery-3.5.1.slim.min.js') }}"></script>