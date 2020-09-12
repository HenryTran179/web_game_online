<!DOCTYPE html>
<html>
   <head>
    @include('blocksAdmin.head')
   </head>
   <body class="hold-transition sidebar-mini">
      <!-- Site wrapper -->
      <div class="wrapper">
         <!-- Navbar -->
         @include('blocksAdmin.navbar')
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         @include('blocksAdmin.sidebar')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          @include('blocksAdmin.header')
            <!-- Main content -->
           @yield('mainContent')
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
        @include('blocksAdmin.footer')
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
     @include('blocksAdmin.foot')
   </body>
</html>