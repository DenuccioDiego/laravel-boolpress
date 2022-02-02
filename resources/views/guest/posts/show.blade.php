@extends('layouts.app')

@section('content')

     <div>
          {{$post->title}}
     </div>

     <img src="{{ asset('storage/' . $post->image) }}" alt="">

     @if($post->category)
     <a href="{{ route('guest.categories.posts', $post->category->slug) }}"> {{$post->category->name}} </a>
     @else
     <span>Nessuna categoria associata</span>
     @endif

     @forelse($post->tags as $tag)
     <a href="{{ route('guest.tags.posts', $tag->slug) }}"> {{$tag->name}} </a>/
     @empty
     <span>Nessun tag associata</span>
     @endforelse
@endsection