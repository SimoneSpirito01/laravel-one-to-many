@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input value="{{ old('title') }}" type="text"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Insert the title" name="title">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3"
                                    name="content" placeholder="Insert the content">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="custom-select @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">Select the category</option>
                                    @foreach ($categories as $category)
                                        <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <img src="" alt="" class="w-25 mb-3 my_image">
                                <label class="d-block" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Choose image</label>
                                <input type="file" id="inputGroupFile02" name="image"
                                    class="@error('image') is-invalid @enderror" onchange="previewUpload(event)">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input {{ old('published') ? 'checked' : '' }} type="checkbox"
                                    class="form-check-input @error('published') is-invalid @enderror" id="published"
                                    name="published">
                                <label class="form-check-label" for="published">Published</label>
                                @error('published')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btnP">Create</button>
                            <button type="button" class="btn btn-danger ml-2"><a class="text-white"
                                    href="{{ route('posts.index') }}">Back to the list</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
