@extends('master')
@section('title','Home')
@section('page-title','Home Page')
@section('fisrt-page','Home')
@section('link-to','home')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data as $data2)
            <div class="col">
                <section class="row">
                    <div class="col">
                        <a href="{{ route('game.home',['id' => $data2->id]) }}"><img src="{{asset('img/'. $data2->img_name) }}" height="200px" width="200px" alt="Image"></a>
                    </div>
                    <div class="col"> 
                        <h3>{{ $data2->name }}</h3>   
                            
                        <p>{{ $data2->age }}+</p>
                    </div>    
                </section>
            </div>  
                {{-- <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div> --}}
            @endforeach
            
        </div>
    </div>
    
@endsection