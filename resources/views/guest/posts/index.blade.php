@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          @foreach($posts as $post)
          <div class="col-6">
               <a href="{{ route('guest.show.post', $post->id) }}">
                    {{$post->title}}
               </a>
          </div>
          @endforeach
     </div>
</div>
    
@endsection