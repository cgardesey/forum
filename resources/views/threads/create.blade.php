@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Threads</div>

                    <div class="card-body">
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="channel_id">Choose a Channel:</label>
                                <select id="channel_id" name="channel_id" class="form-control" required>
                                    <option value="">Choose One...</option>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text"class="form-control" id="title" name="title" value="{{ old('title') }}"  required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="8" {{ old('body') }}  required></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
