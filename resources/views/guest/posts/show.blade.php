@extends('layouts.app')

@section('content')

     <div>
          {{$post->title}}
     </div>

     @if($post->category)
     <a href="{{ route('guest.categories.posts', $post->category->slug) }}"> {{$post->category->name}} </a>
     @else
     <span>Nessuna categoria associata</span>
     @endif
@endsection