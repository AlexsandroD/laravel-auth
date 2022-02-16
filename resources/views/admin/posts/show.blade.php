@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">
                    <div>
                        <strong>Stato:</strong>
                        @if ($post->published)
                        <span class="badge badge-success m-3">Pubblicato</span>
                        @else
                        <span class="badge badge-secondary m-3">Bozza</span>
                        @endif
                    </div>
                   {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
