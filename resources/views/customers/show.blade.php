@extends('layouts.admin.base')

@section('content')
    <div class="page-header">
        <div class="content-page-header">
            <h5>@lang('Customer Details')</h5>
        </div>
    </div>
    @php
        $condicion = isset($customer->avatar)
            ? asset(Storage::url('customer/avatar/' . $customer->avatar))
            : asset('assets/img/avatar.png');
    @endphp
    <div class="card customer-details-group">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-img d-inline-flex">
                                <img class="rounded-circle" src="{{ $condicion }}" alt="profile-img">
                            </span>
                            <div class="customer-details-cont">
                                <h6>{{ $customer->name }}</h6>
                                {{-- <p>{{ $customer->pincode }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-icon d-inline-flex">
                                <i class="fe fe-mail"></i>
                            </span>
                            <div class="customer-details-cont">
                                <h6>@lang('Email')</h6>
                                <p><a href="#"></a>{{ $customer->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-icon d-inline-flex">
                                <i class="fe fe-phone"></i>
                            </span>
                            <div class="customer-details-cont">
                                <h6>@lang('Phone')</h6>
                                <p>{{ $customer->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-icon d-inline-flex">
                                <i class="fe fe-airplay"></i>
                            </span>
                            <div class="customer-details-cont">
                                <h6>@lang('Company Name')</h6>
                                <p>{{ $customer->billing->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-icon d-inline-flex">
                                <i class="fe fe-globe"></i>
                            </span>
                            <div class="customer-details-cont">
                                <h6>@lang('Website')</h6>
                                <a href="{{ $customer->website }}" target="_blank" rel="noopener noreferrer">
                                    <p class="customer-mail">{{ $customer->website }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="customer-details">
                        <div class="d-flex align-items-center">
                            <span class="customer-widget-icon d-inline-flex">
                                <i class="fe fe-briefcase"></i>
                            </span>
                            <div class="customer-details-cont">
                                <h6>@lang('Company Address')</h6>
                                <p>{{ $customer->billing->address1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
