@extends('layouts.app')

@section('title')
    Add New Product
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></div>
                <div class="breadcrumb-item">Create New Product</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create New Product</h2>

            <p class="section-lead">
                On this page you can create a new product and fill in all fields.
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Basic Info</h4>
                            </div>
                            <div class="card-body">
                                <form class=""
                                      action="{{ route('admin.products.store') }}"
                                      method="post"
                                      id="storeProduct">
                                    @csrf
                                    {{--                                    Basic form fields here --}}
                                    <div class="form-group mb-3">
                                        <label class="col-form-label"
                                               for='name'>Name</label>
                                        <input type="text"
                                               name="name"
                                               id='name'
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for='description'
                                               class="col-form-label">
                                            Description
                                        </label>

                                        <textarea name="description"
                                                  id='description'
                                                  rows="8"
                                                  cols="80"
          {{ stimulus_controller('ckeditor') }}>{{ old('description') }}</textarea>

                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Media</h4>
                            </div>
                            <div class="card-body">
                                {{--                            Media form fields here --}}
                                <div class="form-group"
                                     data-controller="filepond"
                                     data-filepond-process-value="{{ route('admin.images.store') }}"
                                     data-filepond-restore-value="{{ route('admin.images.show') }}"
                                     data-filepond-revert-value="{{ route('admin.images.destroy') }}"
                                     data-filepond-current-value="{{ json_encode(old('images', [])) }}">

                                    <input type="file"
                                           data-filepond-target="input">
                                </div>



                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Pricing</h4>
                            </div>
                            <div class="card-body">
                                {{--                            pricing form fields here --}}
                            </div>
                        </div>

                        <div class="card rounded-lg"
                             data-controller="inventory">
                            <div class="card-header">
                                <h4>Inventory</h4>
                            </div>
                            <div class="card-body">
                                {{--         Inventory fields here,  quantity sku and what not                   --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Variants</h4>
                            </div>
                            <div class="card-body">
                                {{--             Product variation fields here, color and stuff              --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Search Engine Optimization</h4>
                            </div>
                            <div class="card-body">
                                {{--              SEO Fields here              --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Product status</h4>
                            </div>
                            <div class="card-body">
                                {{--           product status fields here                --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Product organization</h4>
                            </div>
                            <div class="card-body">
                                {{-- product organization fields here, category, collections, tags, etc --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-right">
                            <input type="submit"
                                   class="btn btn-primary btn-lg"
                                   value="Save"
                                   form="storeProduct">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

