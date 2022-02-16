@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-success my-3" href="{{ route('posts.create') }}" role="button">Add Post</a>

            <div class="card">
                <div class="card-header">Lista Posts</div>

                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="table responsive text-center text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route("posts.show",$post->id) }}" role="button">Viualizza</a>
                                    </td>
                                     <td class="text-center">
                                        <a class="btn btn-info" href="{{ route("posts.edit",$post->id) }}" role="button">Edit</a>
                                    </td>
                                    <td>
                                       <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
