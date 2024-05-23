@extends('layouts.admin.base')

@section('content')
    <div class="card mb-0">
        <div class="card-body">

            <div class="page-header">
                <div class="content-page-header">
                    <h5>@lang('Add Customer')</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-item">
                            <h5 class="form-title">@lang('Basic Details')</h5>
                            <div class="profile-picture">
                                <div class="upload-profile">
                                    <div class="profile-img">
                                        <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg"
                                            alt="profile-img">
                                    </div>
                                    <div class="add-profile">
                                        <h5>@lang('Upload a New Photo')</h5>
                                    </div>
                                </div>
                                <div class="img-upload">
                                    <label class="btn btn-upload">
                                        @lang('Upload') <input type="file" name="avatar">
                                    </label>
                                    <a class="btn btn-remove">@lang('Remove')</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Name') <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Email') <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Phone') <span class="text-danger">*</span></label>
                                        <input type="text" id="mobile_code" name="phone" class="form-control"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block ">
                                        <label>@lang('Status')</label>
                                        <select class="form-control form-small select" name="id_status" id="id_status">
                                            <option>Select Status</option>
                                            @foreach ($status as $st)
                                                <option value="{{ $st->id }}">{{ $st->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Website')</label>
                                        <input type="text" name="website" class="form-control"
                                            placeholder="Enter Website Address">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Notes')</label>
                                        <input type="text" name="notes" class="form-control"
                                            placeholder="Enter Your Notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-item">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <div class="billing-btn mb-2">
                                        <h5 class="form-title">@lang('Billing Address')</h5>
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Name')</label>
                                        <input type="text" name="nameb" id="nameb" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Address Line 1')</label>
                                        <input type="text" name="address1" id="address1" class="form-control"
                                            placeholder="Enter Address 1">
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Address Line 2')</label>
                                        <input type="text" name="address2" id="address2" class="form-control"
                                            placeholder="Enter Address 2">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Country')</label>
                                                <select class="form-control form-small select" name="id_country"
                                                    id="id_country">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($countries as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>@lang('City')</label>
                                                <select class="form-control form-small select" name="id_city"
                                                    id="id_city">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($cities as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('State')</label>
                                                <select class="form-control form-small select" name="id_state"
                                                    id="id_state">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($states as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>@lang('Pincode')</label>
                                                <input type="text" name="pincode" id="pincode" class="form-control"
                                                    placeholder="Enter Pincode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="billing-btn">
                                        <h5 class="form-title mb-0">@lang('Shipping Address')</h5>
                                        <button type="button" class="btn btn-primary"
                                            onclick="copiar();">@lang('Copy from Billing')</button>
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Name')</label>
                                        <input type="text" name="names" id="names" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Address Line 1')</label>
                                        <input type="text" name="address1s" id="address1s" class="form-control"
                                            placeholder="Enter Address 1">
                                    </div>
                                    <div class="input-block mb-3">
                                        <label>@lang('Address Line 2')</label>
                                        <input type="text" name="address2s" id="address2s" class="form-control"
                                            placeholder="Enter Address 2">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Country')</label>
                                                <select class="form-control form-small select" name="id_countrys"
                                                    id="id_countrys">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($countries as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>@lang('City')</label>
                                                <select class="form-control form-small select" name="id_citys"
                                                    id="id_citys">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($cities as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('State')</label>
                                                <select class="form-control form-small select" name="id_states"
                                                    id="id_states">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($states as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>@lang('Pincode')</label>
                                                <input type="text" name="pincodes" id="pincodes"
                                                    class="form-control" placeholder="Enter Pincode">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-customer customer-additional-form">
                            <div class="row">
                                <h5 class="form-title">Bank Details</h5>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Bank Name')</label>
                                        <input type="text" name="name_bank" class="form-control"
                                            placeholder="Enter Bank Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Branch')</label>
                                        <input type="text" name="branch" class="form-control"
                                            placeholder="Enter Branch Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Account Holder Name')</label>
                                        <input type="text" name="titular" class="form-control"
                                            placeholder="Enter Account Holder Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('Account Number')</label>
                                        <input type="text" name="account" class="form-control"
                                            placeholder="Enter Account Number">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>@lang('IFSC')</label>
                                        <input type="text" name="ifsc" class="form-control"
                                            placeholder="Enter IFSC Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-customer-btns text-end">
                            <a href="customers.html" class="btn customer-btn-cancel mb-1">@lang('Cancel')</a>
                            <button type="submit" class="btn customer-btn-save mb-1">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('modal')
    @include('modales.user')
    @include('modales.eliminar')
@endsection --}}
@section('js')
    @include('customers.js')
@endsection
