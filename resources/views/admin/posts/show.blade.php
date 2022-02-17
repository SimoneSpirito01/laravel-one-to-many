@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="post mt-5">
                <h3 class="text-uppercase">{{$post->title}}</h3>
                <p class="my-4">{{$post->content}}</p>
                <span class="badge {{($post->published) ? 'badge-success' : 'badge-secondary'}}">{{($post->published) ? 'Published' : 'Not published'}}</span>
                @if ($post->category)
                  <span class="badge badge-info">{{$post->category->name}}</span>
                @endif
            </div>
            <div class="buttons mt-4">
                <button type="button" class="btn btn-warning mr-2"><a class="text-white" href="{{route('posts.edit', $post->slug)}}">Edit</a></button>
                <button type="button" class="btn btn-danger btnP" data-toggle="modal" data-target="#exampleModal">Delete</button>
                <button type="button" class="btn btn-primary ml-1"><a class="text-white" href="{{route('posts.index')}}">Back to the list</a></button>
                {{-- Modal --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-uppercase" id="exampleModalLabel">Attention! ❌</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary btnP" data-dismiss="modal">Close</button>
                          <form action="{{route('posts.destroy', $post->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger toastClicker btnP">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
    
@endsection