@extends('layouts.admin')

@section('content')
@include('partials.errors')
<form class="pt-4" action="{{ route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
     @csrf

     <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input value="{{old('title')}}" type="text" name="title" id="title" class="form-control" placeholder="Here title" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Max 200 charaters</small>
          @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
     </div>

     <div class="mb-3">
          <label for="image" class="form-label">Link Image</label>
          <input type="file" class="form-control" name="image" id="image" 
          aria-describedby="helpImage" placeholder="https://yourimage_here.jpg" accept=".jpg,.png">
          <small id="helpImage" class="form-text text-muted">Link image</small>
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
     </div>

     <div class="mb-3">
          <label for="sub_title" class="form-label">Sub-Title</label>
          <input value="{{old('sub_title')}}" type="text" class="form-control" name="sub_title" id="sub_title" aria-describedby="helpId" placeholder="subtitle">
          <small id="helpId" class="form-text text-muted">Max 200 charaters</small>
          @error('sub_title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
     </div>

     <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3" placeholder="write text">{{old('description')}}</textarea>
          <small id="helpId" class="form-text text-muted">Max 500 charaters</small>
          @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
     </div>

     <div class="mb-3">
          <label for="category_id" class="form-label">Categories</label>
          <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
               <option value="" selected>Select a category</option>

               @foreach($categories as $category)
               <option value="{{$category->id}}">
                    {{$category->name}}
               </option>
               @endforeach

          </select>
     </div>

     <div class="form-group">
          <label for="tags">Tags</label>
          <select multiple class="form-control" name="tags[]" id="tags">
               @if($tags)
               @foreach($tags as $tag)
               <option value="{{$tag->id}}">{{$tag->name}}</option>
               @endforeach
               @endif
          </select>
     </div>

     @error('tags')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror

     <button class="btn btn-dark" type="submit" value="invia">INVIA</button>
</form>



@endsection