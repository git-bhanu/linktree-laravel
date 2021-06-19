@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-body">
                <h2 class="card-title">
                    Editing Link
                </h2>

                <form action="/dashboard/links/{{ $link->id }}" method="post">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Link Name</label>
                                <input type="text" id="name" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="My Youtube Channel" value="{{ $link->name }}">
                                @if($errors->first('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="link">Link URL</label>
                                <input type="text" id="link" name="link" class="form-control {{ $errors->first('link') ? 'is-invalid' : '' }}" placeholder="https://www.youtube.com/watch?v=30qk04BG9G4" value="{{ $link->link }}">
                                @if($errors->first('link'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('link') }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary"> Save Link </button>
                                <button type="button" class="btn btn-secondary"
                                onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
                                    Delete Link
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="/dashboard/links/{{ $link->id  }}" method="post" id="delete-form">
                    @csrf
                    @method('DELETE')
                </form>

            </div>
        </div>
    </div>
@endsection
