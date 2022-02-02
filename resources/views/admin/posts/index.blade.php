@extends('layouts.admin')

@section('content')

@include('partials.messages')

     <div class="row mt-3">
          <h1 class="col-9">Posts List</h1>
          <div class="col-3 text-end">
               <button type="button" name="" id="" class="btn btn-primary">
                    <a class="text-body text-decoration-none" href="{{ route('admin.posts.create') }}">
                         Crea nuovo Post
                    </a>
               </button>
          </div>
     </div>
          
     <table class="table">
          <thead>
               <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>image</th>
                    <th>slug</th>
                    <th>sub_title</th>
                    <th>description</th>
                    <th>actions</th>
               </tr>
          </thead>
          <tbody>
               @foreach($posts as $post)
               <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="100" src="{{ asset('storage/' . $post->image) }}" alt=""></td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->sub_title }}</td>
                    <td>{{ $post->description }}</td>
                    <td class="text-center fs-2">

                         <button class="btn btn-link btn-xs" type="submit" name="action" >
                              <a class="" href="{{ route('admin.posts.show', $post->slug) }}">
                                   <i class="fas fa-eye fa-lg fa-fw"></i>
                              </a>
                         </button>

                         <button class="btn btn-link btn-xs" type="submit" name="action"  >
                              <a class="" href="{{ route('admin.posts.edit', $post->slug) }}">
                                   <i class="fas fa-edit"></i>
                              </a>
                         </button>
                         
                         <button class="btn btn-link btn-xs" type="submit" name="action" 
                              data-bs-toggle="modal" data-bs-target="#delete_post_{{$post->slug}}">
                              <i class="fas fa-trash-alt"></i>
                         </button>

                         <!-- Modal -->
                         <div class="modal fade" id="delete_post_{{$post->slug}}" tabindex="-1" aria-labelledby="modal_{{$post->slug}}" aria-hidden="true">
                              <div class="modal-dialog">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h5 class="modal-title">DELETE POST {{$post->title}} </h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                             Stai per cancellare un post sei sicuro?
                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                             <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                             @csrf
                                             @method('DELETE')
                                                  <button type="submit" class="btn btn-danger">Save changes</button>
                                             </form> 
                                        </div>
                                   </div>
                              </div>
                         </div>
                           
                    </td>
               </tr>
               @endforeach
          </tbody>

     </table>
     <div>
          {{$posts->links()}}
     </div>
     

@endsection