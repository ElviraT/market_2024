@extends('layouts.admin.base')

@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Products / Services')</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Filter"><span class="me-2"><img src="{{ asset('assets/img/icons/filter-icon.svg') }}"
                                        alt="filter"></span>Filter
                            </a>
                        </li>
                        @can('products.store')
                            <li>
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('products.store') }}" data-bs-target="#add_user"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Products')</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('filtros')
@endsection
{{-- @section('modal')
    @include('modales.user')
    @include('modales.eliminar')
@endsection
@section('js')
    @include('products.js')
@endsection --}}
