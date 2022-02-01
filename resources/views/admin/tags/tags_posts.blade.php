@extends('layouts.admin')

@section('content')

@include('partials.errors')
@include('partials.messages')
<div class="container pt-3">
     <div class="row">
          <div class="col-6">
               <form action="{{route('admin.tags.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Name</label>
                         <input type="text" name="name" id="name" class="form-control" placeholder="tag name" aria-describedby="nameHelper">
                         <small id="nameHelper" class="text-muted">tag name max 200</small>
                    </div>

                    <button type="submit" class="btn btn-dark">Invia</button>

               </form>
          </div>

          <div class="col-6">

               <ul class="list-group">
                    @foreach($tags as $tag)
                    <li class="list-group-item">
                         <form action="{{route('admin.tags.update', $tag->id)}}" method="post">
                              @csrf
                              @method('PATCH')

                              <input class="border-0" type="text" name="name" value="{{$tag->name}}">

                         </form>

                         <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn text-danger">
                                   <i class="fas fa-trash fa-lg fa-fw"></i>
                              </button>
                         </form>
                    </li>
                    @endforeach
               </ul>


          </div>

     </div>


</div>


@endsection