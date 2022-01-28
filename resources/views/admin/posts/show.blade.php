@extends('layouts.admin')

@section('content')

@include('partials.messages')
     <div class="container">
          <span>
               Post numero {{$post->id}}
          </span>
          <h2>
               {{$post->title}}
          </h2> 
          <h5>
               {{$post->sub_title}}
          </h5>    
          <img class="img-fluid" src="{{ $post->image }}" alt="">
          
          <p>
               {{$post->description}}
          </p>

     </div>    

@endsection