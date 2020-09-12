@section('ad-title', 'Admin Dashboard')
@extends('adminMaster')
@section('mainContent')
<section class="content">
    <!-- Default box -->
    <div class="card">
       <div class="card-header">
          <h3 class="card-title">Title</h3>
          <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
             <i class="fas fa-minus"></i></button>
             <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
             <i class="fas fa-times"></i></button>
          </div>
       </div>
       <div class="card-body">
        <div class="text-center">
            <h1 style="color: Gainsboro; font-size: 200px; margin-bottom: 258px; margin-top: 100px">Admin Page</h1>
        </div>   
       </div>
       <!-- /.card-body -->
       <div class="card-footer">
         
       </div>
       <!-- /.card-footer-->    
    </div>
    <!-- /.card -->
 </section>
    <script class="text/javascript">
        function preback() {
            window.history.forward();
        }
        setTimeout("preback()", 0);
        window.onunload = function() {
            null
        };
    </script>
      
@endsection
