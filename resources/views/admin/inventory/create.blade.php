@extends('admin.layouts.app')
@section('title', 'New inventory')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body mt-4">
                    <h6 class="mb-0" style="text-align: center;">New inventory page</h6>
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
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price"
                                       type="number"
                                       id="price"
                                       value="{{ old('price') }}"
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
                                       type="number"
                                       id="width"
                                       value="{{ old('width') }}"
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
                                       type="number"
                                       id="height"
                                       value="{{ old('height') }}"
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
                                       type="number"
                                       id="depth"
                                       value="{{ old('depth') }}"
                                       class="form-control">
                            </div>
                            @error('depth')
                            <div class="error-msg">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="thumb" class="mt-2 form-label">Thumbnail of inventory</label>
                    <div class="form-control">
                        <input type="file"
                               name="thumb"
                               id="thumb">
                    </div>
                    @error('thumb')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <label for="front" class="mt-2 form-label">Image of front</label>
                    <div class="form-control">
                        <input type="file"
                               name="front"
                               id="front">
                    </div>
                    @error('front')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <label for="top" class="mt-2 form-label">Image of top</label>
                    <div class="form-control">
                        <input type="file"
                               name="top"
                               id="top">
                    </div>
                    @error('top')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror

                    <label for="product_code" class="mt-4 form-label">Product code</label>
                    <input type="text"
                           class="form-control"
                           name="product_code"
                           value="{{ old('product_code') }}"
                           id="product_code">
                    @error('product_code')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror

                    <div id="gable_position_block" class="mt-3 mb-3">
                        <label for="gable_position">Category</label>
                        <select name="category_id"
                                id="gable_position"
                                class="form-control">
                            <option selected disabled value="">Select the inventory category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <label for="available">Products fits to</label>
                    <div class="row">
                        <div class="col-2 d-flex">
                            @foreach($products as $product)
                            <input type="checkbox" name="fits_in[]" value="{{ $product->name }}" id="{{ $product->name }}">
                            <label for="{{ $product->name }}">{{ $product->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
