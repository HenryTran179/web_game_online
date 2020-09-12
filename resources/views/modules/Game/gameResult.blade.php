@extends('master')
@section('title','Game Result')
@section('u-title','Game Result')
@section('content')
    <div>
        @foreach ($data as $data2)
            <h1 style="display: none" >{{ $loop->iteration }}</h1>
            <h1>{{ $data2->name }}</h1>
        @endforeach
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
         $('#search').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
          var query = $(this).val(); //lấy gía trị ng dùng gõ
          if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
          {
           var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
           $.ajax({
            url:"{{ route('game.search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            method:"POST", // phương thức gửi dữ liệu.
            data:{query:query, _token:_token},
            success:function(data){ //dữ liệu nhận về 
             $('#haha').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
           }
         });
         }
       });
      
        //  $(document).on('click', 'li', function(){  
        //   $('#country_name').val($(this).text());  
        //   $('#countryList').fadeOut();  
        // });  
      
       });
      </script>
@endsection