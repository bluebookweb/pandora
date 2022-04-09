@extends('admin.layouts.app')
@section('title', 'Edit position')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            {!! Form::open(['route' => ['inventory.update', $inventory], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            @method('put')
            <div class="card card-body mt-4">
                <h6 class="mb-0" style="text-align: center;">New inventory page</h6>
                <hr class="horizontal dark my-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                       class="form-control"
                       value="{{ old('name') ? old('name') : $inventory->name }}"
                       name="name"
                       id="name">
                @error('name')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <div class="row mt-2">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input name="price"
                                   value="{{ old('price') ? old('price') : $inventory->price }}"
                                   type="number"
                                   id="price"
                                   class="form-control">
                        </div>
                        @error('price')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="width">Width (mm)</label>
                            <input name="width"
                                   value="{{ old('width') ? old('width') : $inventory->width }}"
                                   type="number"
                                   id="width"
                                   class="form-control">
                        </div>
                        @error('width')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="height">Height (mm)</label>
                            <input name="height"
                                   value="{{ old('height') ? old('height') : $inventory->height }}"
                                   type="number"
                                   id="height"
                                   class="form-control">
                        </div>
                        @error('height')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="depth">Depth (mm)</label>
                            <input name="depth"
                                   value="{{ old('depth') ? old('depth') : $inventory->depth }}"
                                   type="number"
                                   id="depth"
                                   class="form-control">
                        </div>
                        @error('depth')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <label for="thumb" class="mt-2 form-label">Thumbnail of inventory</label>
                <div class="form-control">
                    <img src="{{ Storage::url($inventory->thumb) }}" width="200px" alt="">
                    <input type="file" name="thumb" id="thumb">
                </div>
                <label for="front" class="mt-2 form-label">Image of front</label>
                <div class="form-control">
                    <img src="{{ Storage::url($inventory->front) }}" width="200px" alt="">
                    <input type="file" name="front" id="front">
                </div>
                <label for="top" class="mt-2 form-label">Image of top</label>
                <div class="form-control">
                    <img src="{{ Storage::url($inventory->top) }}" width="200px" alt="">
                    <input type="file" name="top" id="top">
                </div>

                <label for="product_code" class="mt-4 form-label">Product code</label>
                <input type="text"
                       value="{{ old('product_code') ? old('product_code') : $inventory->product_code }}"
                       class="form-control"
                       name="product_code"
                       id="product_code">
                @error('product_code')
                <div class="error-msg">{{ $message }}</div>
                @enderror
                <div id="gable_position_block" class="mt-3 mb-3">
                    <label for="gable_position">Category</label>
                    <select name="category_id" id="gable_position" class="form-control">
                        <option selected disabled value="">Select the inventory category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if ($inventory->category_id == $category->id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="available">Products fits to</label>
                <div class="row">
                    <div class="col-2 d-flex">
                        @foreach($products as $product)
                            @if ($product->name !== $inventory->name)
                            <input type="checkbox"
                                   name="fits_in[]"
                                   @if (in_array($product->name, $inventory->fits_in))
                                   checked
                                   @endif
                                   value="{{ $product->name }}"
                                   id="{{ $product->name }}">
                            <label for="{{ $product->name }}">{{ $product->name }}</label>
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
