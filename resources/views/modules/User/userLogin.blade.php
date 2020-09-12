@section('title','Login')
<link rel="shortcut icon" href="{{ asset( 'img/userIcon.png') }}">
@include('blocks.head')
<link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
<link href="{{ asset( 'dist/css/adminlte.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="{{ asset( 'img/userIcon.png') }}" id="icon" alt="User Login Icon" />
        </div>
            <h2>Login</h2>
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
        @endif    
        <!-- Login Form -->
        <form method="POST" action="{{ route('user.loginprogress') }}">
          @csrf
          <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" onFocus="this.select()" value="{{ old('email') }}">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
          <input type="submit" id="login" class="fadeIn fourth" value="Log In">
        </form>
          <p>Or</p>
          <a class="underlineHover fadeIn second" href="/user/create">Sign Up</a>
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
@include('blocks.foot')
<script>
  
  var input = document.getElementById('email');
    input.focus();
    input.select();

    function preback(){window.history.forward();}
    setTimeout("preback()",0);
    window.onunload=function(){null};
</script>
<script src="{{ asset( 'js/jquery-3.5.1.slim.min.js') }}"></script>