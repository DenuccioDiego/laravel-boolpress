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
          <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
          
          <p>
               {{$post->description}}
          </p>

          <div class="metadata">
               <span>
               
                    Category: {{!empty($post->category->name) ? $post->category->name : 'no category'}}
                    
               </span>
          </div>

          <div class="metadata">
               <span>
                    @forelse($post->tags as $tag)
                    <span>{{$tag->name}}/</span> 
                    @empty
                    <span>No tags</span>
                    @endforelse
               </span>
          </div>
     </div>    

@endsection