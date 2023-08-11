@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form action="/product/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Enter your Name....">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="4" value="{{ old('description') }}"
                                placeholder="Enter your Description.... "></textarea>

                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
