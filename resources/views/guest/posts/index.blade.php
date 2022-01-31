@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          <div class="row col-10">
               @foreach($posts as $post)
               <div class="col-6">
                    <img src="{{$post->image}}" alt="">
                    <a href="{{ route('guest.show.post', $post->slug) }}">
                         {{$post->title}}
                    </a>
               </div>
               @endforeach
          </div>

          <div class="row col-2">
               <ul class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item"><a href="{{ route('guest.categories.posts', $category->slug) }}"> {{$category->name}} </a></li>
                    @endforeach
               </ul>
          </div>
     </div>
     


     
     {{ $posts->links() }}
</div>
    
@endsection