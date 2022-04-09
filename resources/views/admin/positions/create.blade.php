@extends('admin.layouts.app')
@section('title', 'New position')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <form action="{{ route('position.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body mt-4">
                    <h6 class="mb-0" style="text-align: center;">New position page</h6>
                    <hr class="horizontal dark my-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           value="{{ old('name') }}"
                           id="name">
                    @error('name')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <label for="image" class="mt-4 form-label">Image of position</label>
                    <div class="form-control">
                        <input type="file" name="image" id="image">
                    </div>
                    @error('image')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <div class="row mt-4">
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="has_gable">
                                    Has gable
                                </label>
                                <p class="form-text text-muted text-xs ms-1">
                                    Click to switch the value.
                                </p>
                                <div class="form-check form-switch ms-1">
                                    <input class="form-check-input" name="has_gable" type="checkbox" id="has_gable">
                                    <label class="form-check-label" for="has_gable"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="has_impact">
                                    Has impact
                                </label>
                                <p class="form-text text-muted text-xs ms-1">
                                    Click to switch the value.
                                </p>
                                <div class="form-check form-switch ms-1">
                                    <input class="form-check-input" name="has_impact" type="checkbox" id="has_impact">
                                    <label class="form-check-label" for="has_impact"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gable_position_block" style="display: none">
                        <label for="gable_position">Gable Position</label>
                        <select name="gable_position" id="gable_position" class="form-control">
                            <option value="right">Right</option>
                            <option value="left">Left</option>
                            <option value="left-right">Left-Right</option>
                        </select>
                    </div>
                    <div id="impact_position_block" style="display: none">
                        <label for="impact_position">Impact position</label>
                        <select name="impact_position" id="impact_position" class="form-control">
                            <option value="right">Right</option>
                            <option value="left">Left</option>
                            <option value="left-right">Left-Right</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('js/admin/jquery-3.3.1.min.js') }}"></script>
    <script>
        function validateGable(){
            var remember = document.getElementById('has_gable');
            if (remember.checked){
                $('#gable_position_block').css('display', 'block');
            }else{
                $('#gable_position_block').css('display', 'none');
            }
        }
        setInterval(validateGable, 500);
        function validateImpact(){
            var remember = document.getElementById('has_impact');
            if (remember.checked){
                $('#impact_position_block').css('display', 'block');
            }else{
                $('#impact_position_block').css('display', 'none');
            }
        }
        setInterval(validateImpact, 500);
    </script>
@endsection
