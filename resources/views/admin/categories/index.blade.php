@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista dei post</div>
                <div class="card-body">
                  <div class="new-post">
                    <button type="button" class="btn btn-success mb-3"><a class="text-white" href="{{route('posts.create')}}">New post</a></button>
                  </div>
                    <div class="posts">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($categories as $category)

                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                      <button type="button" class="btn btn-info"><a class="text-white" href="{{route('categories.show', $category->id)}}">View</a></button>
                                      {{-- <button type="button" class="btn btn-warning"><a class="text-white" href="{{route('categorys.edit', $category->slug)}}">Edit</a></button>
                                      <button type="button" class="btn btn-danger mt-1 btnToggle btnP" data-toggle="modal" data-target="#exampleModal" data-slug="{{$category->slug}}">Delete</button> --}}
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{-- <!-- Modal -->
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
                                  <form action="{{route('posts.destroy', $post->slug)}}" method="POST" class="my_form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger toastClicker my_button btnP">Delete</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Toast -->
                          <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 9999; right: 0; top: 60px;">
                            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                              <div class="toast-body">
                                Post successfully deleted! 🗑
                              </div>
                            </div>
                          </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection