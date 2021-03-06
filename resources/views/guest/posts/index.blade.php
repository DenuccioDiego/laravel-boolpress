@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          <div class="row col-10">
               @foreach($posts as $post)
               <div class="col-6">
                    <img src="{{ asset('storage/' . $post->image) }}" with="125" height="125" alt="">
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

          <div class="row col-2">
               <ul class="list-group">
                    @foreach($tags as $tag)
                    <li class="list-group-item"><a href="{{ route('guest.tags.posts', $tag->slug) }}"> {{$tag->name}} </a></li>
                    @endforeach
               </ul>
          </div>
     </div>
     


     
     {{ $posts->links() }}
</div>
    
@endsection