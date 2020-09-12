@section('title','Sign Up')
<link rel="shortcut icon" href="{{ asset( 'img/registerIcon.png') }}">
@include('blocks.head')
<link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
<link href="{{ asset( 'dist/css/adminlte.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="{{ asset( 'img/registerIcon.png') }}" id="icon" alt="Admin Icon" />
        </div>
        <h2>Sign Up</h2>
        <!--Error-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Login Form -->
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
          <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" value="{{ old('email') }}">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="{{ old('password') }}">
          <input type="password" id="password_confirm" class="fadeIn third" name="password_confirm" placeholder="Password Confirm">
          <input type="submit" id="login" class="fadeIn fourth" value="Sign Up">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
        </div>
      </div>
    </div>
@include('blocks.foot')
<script src="{{ asset( 'js/bootstrap.min.js') }}"></script>
<script src="{{ asset( 'js/jquery-3.5.1.slim.min.js') }}"></script>