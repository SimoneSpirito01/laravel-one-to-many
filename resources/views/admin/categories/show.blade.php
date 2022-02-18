@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-uppercase mb-0">{{ $category->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="post">
                            <p class="mb-4"><strong>Slug: </strong>{{ $category->slug }}</p>
                            @if (count($category->posts) > 0)
                                <div class="posts">
                                    <h6 class="my-4">Post list:</h6>
                                    <ul>
                                        @foreach ($category->posts as $post)
                                            <li>{{ $post->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="buttons mt-4">
                            <button type="button" class="btn btn-primary"><a class="text-white"  href="{{ route('categories.index') }}">Back to the list</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
