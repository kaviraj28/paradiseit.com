@extends('layouts.frontend.master')

@section('content')
    @include('frontend.global.banner', [
        'name' => 'Client Registration',
        'banner' => null,
        'parentname' => '',
        'parentlink' => '',
    ])
    <div class="contact-form-area pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form mw-100">
                        <form method="POST" action="{{ route('clientregistration') }}">
                            @csrf
                            <div class="step-one">
                                <span><i>(Note: <span class="text-danger">*</span>Denotes Mandatory field)</i></span>
                                <div class="card shadow-lg">
                                    <div class="card-header btn-bg-two text-white p-12">COMPANY DETAILS </div>
                                    <div class="card-body">
                                        <div class="row mx-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="cname">Company Name <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="cname"
                                                        name="cname" type="text"
                                                        value="{{ old('cname', $content->cname ?? '') }}">
                                                    @error('cname')
                                                        <span class="text-danger">
                                                            <small id="cname-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="caddress">Registered Address <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="caddress"
                                                        name="caddress" type="text"value="{{ old('caddress') }}">
                                                    @error('caddress')
                                                        <span class="text-danger">
                                                            <small id="caddress-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="cnumber">Phone Number <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="cnumber"
                                                        type="text"value="{{ old('cnumber') }}" name="cnumber">
                                                    @error('cnumber')
                                                        <span class="text-danger">
                                                            <small id="cnumber-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="company_fax_no">Fax Number</label>
                                                    <input class="form-control form-control-sm" id="cfax"
                                                        type="text"value="{{ old('cfax') }}" name="cfax">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="cmail">Official Email <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="cmail"
                                                        type="email"value="{{ old('cmail') }}" name="cmail">
                                                    @error('cmail')
                                                        <span class="text-danger">
                                                            <small id="cmail-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="company_website">Website</label>
                                                    <input class="form-control form-control-sm" id="curl"
                                                        type="text"value="{{ old('curl') }}" name="curl">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="company_registration_no">Registration
                                                        Number</label>
                                                    <input class="form-control form-control-sm" id="cregistration"
                                                        type="text"value="{{ old('cregistration') }}"
                                                        name="cregistration">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-24">
                                                <div class="form-group">
                                                    <label class="form-label" for="company_pan_no">PAN Number <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="cpan"
                                                        type="text"value="{{ old('cpan') }}" name="cpan">
                                                    @error('cpan')
                                                        <span class="text-danger">
                                                            <small id="cpan-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-two mt-4">
                                <div class="card shadow-lg">
                                    <div class="card-header btn-bg-two text-white p-12">CONTACT PERSON DETAILS</div>
                                    <div class="card-body">
                                        <div class="row gap-24-row mt-8 mx-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name"> Name <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="name"
                                                        type="text"value="{{ old('name') }}" name="name">
                                                    @error('name')
                                                        <span class="text-danger">
                                                            <small id="name-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="phone"
                                                        type="text" value="{{ old('phone') }}"name="phone">
                                                    @error('phone')
                                                        <span class="text-danger">
                                                            <small id="phone-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="email"
                                                        type="email"value="{{ old('email') }}" name="email">
                                                    @error('email')
                                                        <span class="text-danger">
                                                            <small id="email-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="designation">Designation <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" id="designation"
                                                        type="text"value="{{ old('designation') }}"
                                                        name="designation">
                                                    @error('designation')
                                                        <span class="text-danger">
                                                            <small id="designation-error">
                                                                *{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-three my-4">
                                <div class="card shadow-lg">
                                    <div class="card-header btn-bg-two text-white p-12">Agreement</div>
                                    <div class="card-body">
                                        <div class="row gap-24-row mt-8 mx-0">
                                            <div class="col-md-12">
                                                <div class="form-group mb-0">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="agreement"
                                                            type="checkbox" name="status" value="1">
                                                        <label class="custom-control-label mb-0 required"
                                                            for="agreement">I
                                                            have read and agree to the <a data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"
                                                                href="#">agreement.</a><span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <br />
                                                        @error('status')
                                                            <span class="text-danger">
                                                                <small id="status-error">
                                                                    *The agreement field is required.</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="cid" value="{{ $content->slug ?? '' }}">

                            <div class="d-flex justify-content-center mt-3">
                                <button class="default-btn btn-bg-two border-radius-50" type="submit"> SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Agreement</h2>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="agreement">
                        {!! $content->agreement
                            ? $content->agreement
                            : ($setting['default_agreement']
                                ? $setting['default_agreement']
                                : '') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
