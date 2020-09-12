@section('ad-title', 'Admin Login')

    @include('blocksAdmin.head')
    {{-- chặn user quay lại sau khi login thành công --}}
  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="{{ asset('img/adminIcon.png') }}" id="icon" alt="Admin Icon" />
            </div>
            <h2>Login</h2>
            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.loginprogress') }}">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" value="{{ old('email') }}"
                    onFocus="this.select()">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" value="{{ old('password')}}">
                <input type="submit" id="login" class="fadeIn fourth" value="Log In">
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
    @include('blocksAdmin.foot')
    <script>
        
    var input = document.getElementById('email');
    input.focus();
    input.select();

    function preback(){window.history.forward();}
    setTimeout("preback()",0);
    window.onunload=function(){null};
    </script>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
