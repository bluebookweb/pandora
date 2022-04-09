@extends('admin.layouts.app')
@section('title', 'Edit position')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            {!! Form::open(['route' => ['fillings.update', $filling], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            @method('put')
            <div class="card card-body mt-4">
                <h6 class="mb-0" style="text-align: center;">Edit filling page: <span style="color: #cb0c9f">{{ $filling->name }}</span></h6>
                <hr class="horizontal dark my-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                       class="form-control"
                       name="name"
                       value="{{ old('name') ? old('name') : $filling->name }}"
                       id="name">
                @error('name')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <label for="background" class="mt-4 form-label">Background of filling</label>
                <div class="form-control">
                    <img src="{{ Storage::url($filling->background) }}" alt="" width="200px">
                    <input type="file"
                           name="background"
                           id="background">
                </div>
                @error('background')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <label for="thumb" class="mt-4 form-label">Thumbnail of filling</label>
                <div class="form-control">
                    <img src="{{ Storage::url($filling->thumb) }}" alt="" width="200px">
                    <input type="file"
                           name="thumb"
                           id="thumb">
                </div>
                @error('thumb')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <div class="row mt-4">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="is_img">
                                Is Image
                            </label>
                            <p class="form-text text-muted text-xs ms-1">
                                Click to switch the value.
                            </p>
                            <div class="form-check form-switch ms-1">
                                <input class="form-check-input" name="is_img" type="checkbox"
                                       @if ($filling->is_img)
                                       checked
                                       @endif
                                       id="is_img">
                                <label class="form-check-label" for="is_img"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="is_mirror">
                                Is Mirror
                            </label>
                            <p class="form-text text-muted text-xs ms-1">
                                Click to switch the value.
                            </p>
                            <div class="form-check form-switch ms-1">
                                <input class="form-check-input" name="is_mirror" type="checkbox"
                                       @if ($filling->is_mirror)
                                       checked
                                       @endif
                                       id="is_mirror">
                                <label class="form-check-label" for="is_mirror"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="available">Available for</label>
                <div class="row">
                    <div class="col-2 d-flex">
                        <input type="checkbox" name="available_for[]" value="doors" id="doors"
                               @if (in_array('doors', $filling->available_for))
                                checked
                               @endif
                               >
                        <label for="doors">doors</label>
                    </div>
                    <div class="col-2 d-flex">
                        <input type="checkbox" name="available_for[]" value="gable" id="gable"
                               @if (in_array('gable', $filling->available_for))
                               checked
                               @endif
                               >
                        <label for="gable">gable</label>
                    </div>
                    <div class="col-2 d-flex">
                        <input type="checkbox" name="available_for[]" value="impact" id="impact"
                               @if (in_array('impact', $filling->available_for))
                               checked
                               @endif
                               >
                        <label for="impact">impact</label>
                    </div>
                </div>
                @error('available_for')
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

@section('extra-js')
    <script src="{{ asset('js/admin/jquery-3.3.1.min.js') }}"></script>
    <script>
        $(function(){
            var requiredCheckboxes = $('.row :checkbox[required]');
            requiredCheckboxes.change(function(){
                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });
    </script>
@endsection
