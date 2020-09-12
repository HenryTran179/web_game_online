@section('title','Success')
<link rel="shortcut icon" href="{{ asset( 'img/successIcon.png') }}">
@include('blocks.head')
<link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
<link href="{{ asset( 'dist/css/adminlte.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="{{ asset( 'img/successIcon.png') }}" id="icon" alt="User Login Success Icon" />
        </div>
            <h2>Sign Up Success</h2>
            <a href="/user/login"><input type="button" value="Login Now"></a>
            <hr>
        <div id="formFooter">
        </div>
      </div>
    </div>
@include('blocks.foot')
<script src="{{ asset( 'js/bootstrap.min.js') }}"></script>
<script src="{{ asset( 'js/jquery-3.5.1.slim.min.js') }}"></script>