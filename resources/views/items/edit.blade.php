@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-alert/>

            <div class="row row-cards">
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Product Image') }}
                                    </h3>

                                    <img class="img-account-profile mb-2" src="{{ asset('assets/img/products/default.webp') }}" alt="" id="image-preview" />

                                    <div class="small font-italic text-muted mb-2">
                                        JPG or PNG no larger than 2 MB
                                    </div>

                                    <input
                                        type="file"
                                        accept="image/*"
                                        id="image"
                                        name="productImage"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        onchange="previewImage();">

                                    @error('productImage')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h3 class="card-title">
                                            {{ __('Add Product') }}
                                        </h3>
                                    </div>

                                    <div class="card-actions">
                                        <a href="{{ route('products.index') }}" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <x-input name="productName"
                                                     label="Product Name"
                                                     id="productName"
                                                     placeholder="Product name"
                                                     value="{{ old('productName') }}"
                                                     required="true"
                                            />
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                {{--                                                <label for="category_id" class="form-label">--}}
                                                {{--                                                    Rod Diameter--}}
                                                {{--                                                    <span class="text-danger">*</span>--}}
                                                {{--                                                </label>--}}

                                                {{--                                            @if ($categories->count() === 1)--}}
                                                {{--                                                <select name="category_id" id="category_id"--}}
                                                {{--                                                        class="form-select @error('category_id') is-invalid @enderror"--}}
                                                {{--                                                        readonly--}}
                                                {{--                                                >--}}
                                                {{--                                                    @foreach ($categories as $category)--}}
                                                {{--                                                        <option value="{{ $category->id }}" selected>--}}
                                                {{--                                                            {{ $category->name }}--}}
                                                {{--                                                        </option>--}}
                                                {{--                                                    @endforeach--}}
                                                {{--                                                </select>--}}
                                                {{--                                            @else--}}
                                                {{--                                                <select name="category_id" id="category_id"--}}
                                                {{--                                                        class="form-select @error('category_id') is-invalid @enderror"--}}
                                                {{--                                                >--}}
                                                {{--                                                    <option selected="" disabled="">--}}
                                                {{--                                                        Select a category:--}}
                                                {{--                                                    </option>--}}

                                                {{--                                                    @foreach ($categories as $category)--}}
                                                {{--                                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected="selected" @endif>--}}
                                                {{--                                                            {{ $category->name }}--}}
                                                {{--                                                        </option>--}}
                                                {{--                                                    @endforeach--}}
                                                {{--                                                </select>--}}
                                                {{--                                            @endif--}}
                                                <x-input label="Rod Diameter"
                                                         name="rodDiameter"
                                                         type="text"
                                                         id="rodDiameter"
                                                         placeholder="0"
                                                         required="true"
                                                         value="{{ old('rodDiameter') }}"
                                                />
                                                @error('rodDiameter')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                {{--                                                <label class="form-label" for="unit_id">--}}
                                                {{--                                                    {{ __('Type') }}--}}
                                                {{--                                                    <span class="text-danger">*</span>--}}
                                                {{--                                                </label>--}}

                                                {{--                                                @if ($units->count() === 1)--}}
                                                {{--                                                    <select name="category_id" id="category_id"--}}
                                                {{--                                                            class="form-select @error('category_id') is-invalid @enderror"--}}
                                                {{--                                                            readonly--}}
                                                {{--                                                    >--}}
                                                {{--                                                        @foreach ($units as $unit)--}}
                                                {{--                                                            <option value="{{ $unit->id }}" selected>--}}
                                                {{--                                                                {{ $unit->name }}--}}
                                                {{--                                                            </option>--}}
                                                {{--                                                        @endforeach--}}
                                                {{--                                                    </select>--}}
                                                {{--                                                @else--}}
                                                {{--                                                    <select name="unit_id" id="unit_id"--}}
                                                {{--                                                            class="form-select @error('unit_id') is-invalid @enderror"--}}
                                                {{--                                                    >--}}
                                                {{--                                                        <option selected="" disabled="">--}}
                                                {{--                                                            Select a unit:--}}
                                                {{--                                                        </option>--}}

                                                {{--                                                        @foreach ($units as $unit)--}}
                                                {{--                                                            <option value="{{ $unit->id }}" @if(old('unit_id') == $unit->id) selected="selected" @endif>{{ $unit->name }}</option>--}}
                                                {{--                                                        @endforeach--}}
                                                {{--                                                    </select>--}}
                                                {{--                                                @endif--}}

                                                {{--                                                @error('unit_id')--}}
                                                {{--                                                <div class="invalid-feedback">--}}
                                                {{--                                                    {{ $message }}--}}
                                                {{--                                                </div>--}}
                                                {{--                                                @enderror--}}
                                                <x-input label="Unit Weight"
                                                         name="unitWeight"
                                                         type="text"
                                                         id="unitWeight"
                                                         placeholder="0"
                                                         required="true"
                                                         value="{{ old('unitWeight') }}"
                                                />
                                                @error('unitWeight')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <x-input type="text"
                                                     label="Unit Price"
                                                     name="unitPrice"
                                                     id="unitPrice"
                                                     placeholder="0"
                                                     value="{{ old('unitPrice') }}"
                                                     required="true"
                                            />
                                            @error('unitPrice')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <x-input type="text"
                                                     label="Quantity"
                                                     name="quantity"
                                                     id="quantity"
                                                     placeholder="0"
                                                     value="{{ old('quantity') }}"
                                                     required="true"
                                            />
                                            @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <x-input type="text"
                                                     label="Total"
                                                     name="total"
                                                     id="total"
                                                     placeholder="0"
                                                     value="{{ old('total') }}"
                                            />
                                            @error('total')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>



                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label">
                                                    {{ __('Notes') }}
                                                </label>

                                                <textarea name="notes"
                                                          id="notes"
                                                          rows="5"
                                                          class="form-control @error('notes') is-invalid @enderror"
                                                          placeholder="Notes"
                                                ></textarea>

                                                @error('notes')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer text-end">
                                    <x-button.save type="submit">
                                        {{ __('Save') }}
                                    </x-button.save>

                                    <a class="btn btn-warning" href="{{ url()->previous() }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
