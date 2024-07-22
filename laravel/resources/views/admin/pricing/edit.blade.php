@extends('layouts.admin.master')
@section('title', 'Edit ' . $pricing->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Pricing - {{ $pricing->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('pricing.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('pricing.update', $pricing->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9 mb-4">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $pricing->name) }}" placeholder="Enter Name">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Price Prefix:
                                        ($)</label>
                                    <input class="form-control @error('priceprefix') is-invalid @enderror" type="text"
                                        name="priceprefix" value="{{ old('priceprefix', $pricing->priceprefix ?? '') }}">
                                    @error('priceprefix')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Price </label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="text"
                                        name="price" value="{{ old('price', $pricing->price ?? '') }}">
                                    @error('price')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Per Price</label>
                                    <input class="form-control @error('priceper') is-invalid @enderror" type="text"
                                        name="priceper" value="{{ old('priceper', $pricing->priceper ?? '') }}">
                                    @error('priceper')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $pricing->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($pricing->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($pricing->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $pricing->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                        @include('admin.pricing.includes.services')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
