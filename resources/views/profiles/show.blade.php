@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        {{ $profileUser->name }}
                        <small>Since {{  $profileUser->created_at->diffForHumans() }}</small>
                    </div>

                    @foreach($threads as $thread)
                        <div class="card">
                            <div class="card-header">
                                <div class="level">
                                    <span class="flex">
                                        <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted:
                                        <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                                    </span>

                                    <span>{{ $thread->created_at_diffForHumans() }}</span>
                                </div>
                            </div>

                            <div class="card-body">

                            </div>
                        </div>
                    @endforeach
                    {{ $threads->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection