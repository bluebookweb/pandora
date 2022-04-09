@extends('admin.layouts.app')
@section('title', 'Edit door division')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            {!! Form::open(['route' => ['door-division.update', $doorDivision], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            @method('put')
            <div class="card card-body mt-4">
                <h6 class="mb-0" style="text-align: center;">New door division</h6>
                <hr class="horizontal dark my-3">
                <label for="image" class="form-label">Image of division</label>
                <div class="form-control mb-4">
                    <img src="{{ Storage::url($doorDivision->image) }}" alt="" width="200px">
                    <input type="file"
                           name="image"
                           id="image">
                </div>
                <label for="divide" class="form-label">Divisions number</label>
                <input type="number"
                       class="form-control"
                       name="divide"
                       value="{{ old('divide') ? old('divide') : $doorDivision->divide }}"
                       id="divide">
                @error('divide')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
