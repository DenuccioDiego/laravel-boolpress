@extends('layouts.app')

@section('content')


<div class="p-5 bg-light">
     <div class="container">
          <h1 class="display-3">Tag: {{$tag->name}} </h1>
          <p class="lead">All posts of this category</p>

     </div>
</div>


<div class="container">
     <div class="row">
          @forelse($posts as $post)
          <div class="col-6">
               <img src="{{$post->image}}" alt="">
               <a href="{{ route('guest.show.post', $post->slug) }}">
                    {{$post->title}}
               </a>
          </div>

          @empty
          <span>
               Nessun tag abbinato
          </span>

          @endforelse
     </div>

     {{ $posts->links() }}
</div>

@endsection