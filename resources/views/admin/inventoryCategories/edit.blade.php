@extends('admin.layouts.app')
@section('title', 'Edit position')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            {!! Form::open(['route' => ['inventory-category.update', $inventoryCategory], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            @method('put')
            <div class="card card-body mt-4">
                <h6 class="mb-0" style="text-align: center;">New inventory category page</h6>
                <hr class="horizontal dark my-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                       class="form-control"
                       value="{{ old('name') ? old('name') : $inventoryCategory->name }}"
                       name="name"
                       id="name">
                @error('name')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <div id="gable_position_block" class="mt-3 mb-3">
                    <label for="gable_position">Type of inventory</label>
                    <select name="type" id="gable_position" class="form-control" required>
                        <option selected disabled value="">Select the type of inventory</option>
                        <option @if($inventoryCategory->type == 'vertical') selected @endif value="vertical">vertical</option>
                        <option @if($inventoryCategory->type == 'horizontal') selected @endif value="horizontal">horizontal</option>
                    </select>
                </div>
                <label for="thumb" class="mt-2 form-label">Thumbnail of category</label>
                <div class="form-control">
                    <img src="{{ Storage::url($inventoryCategory->thumb) }}" width="200px" alt="">
                    <input type="file" name="thumb" id="thumb">
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="is_img">
                                Snap to floor
                            </label>
                            <p class="form-text text-muted text-xs ms-1">
                                Click to switch the value.
                            </p>
                            <div class="form-check form-switch ms-1">
                                <input class="form-check-input" name="snap_floor"
                                       @if($inventoryCategory->snap_floor) checked @endif
                                       type="checkbox" id="snap_floor">
                                <label class="form-check-label" for="snap_floor"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="is_mirror">
                                Has top view
                            </label>
                            <p class="form-text text-muted text-xs ms-1">
                                Click to switch the value.
                            </p>
                            <div class="form-check form-switch ms-1">
                                <input class="form-check-input" name="top_view"
                                       @if($inventoryCategory->top_view) checked @endif
                                       type="checkbox" id="top_view">
                                <label class="form-check-label" for="top_view"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="available">Span to categories</label>
                <div class="row">
                    <div class="col-2 d-flex">
                        @foreach($categories as $categoryItem)
                            @if ($categoryItem->name !== $inventoryCategory->name)
                                <input type="checkbox" name="snap_to_category[]"
                                       @if (in_array($categoryItem->name, $inventoryCategory->snap_to_category))
                                       checked
                                       @endif
                                       value="{{ $categoryItem->name }}"
                                       id="{{ $categoryItem->name }}">
                                <label for="{{ $categoryItem->name }}">{{ $categoryItem->name }}</label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
