@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Nuovo Post</h3>
                </div>

                <div class="card-body">
                    <form action="{{route("posts.store")}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Post Title" placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Write the post Here</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" placeholder="content" value="{{ old('title') }}"  placeholder rows="6"></textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group form-check">
                             <input type="checkbox" class="form-check-input"class = "form-control  @error('published') is-invalid @enderror"  name="published" id="published  " value="{{ old('published') ? 'checked' : '' }}">
                             <label class="form-check-label" for="published">Pubblica</label>
                             @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                         </div>
                         <button class="btn btn-primary" type="submit">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
