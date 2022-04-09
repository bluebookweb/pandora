@extends('admin.layouts.app')
@section('title', 'New door division')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <form action="{{ route('door-division.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body mt-4">
                    <h6 class="mb-0" style="text-align: center;">New door division</h6>
                    <hr class="horizontal dark my-3">
                    <label for="image" class="form-label">Image of division</label>
                    <div class="form-control mb-2">
                        <input type="file"
                               name="image"
                               id="image"
                               value="{{ old('image') }}">
                    </div>
                    @error('image')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <label for="divide" class="form-label mt-2">Divisions number</label>
                    <input type="number"
                           class="form-control"
                           name="divide"
                           id="divide"
                           value="{{ old('divide') }}">
                    @error('divide')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
