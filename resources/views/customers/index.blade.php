@extends('layouts.admin.base')

@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Customers')</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Filter"><span class="me-2"><img src="{{ asset('assets/img/icons/filter-icon.svg') }}"
                                        alt="filter"></span>Filter
                            </a>
                        </li>
                        @can('customers.create')
                            <li>
                                <a class="btn btn-primary" href="{{ route('customers.create') }}" onclick=" loading_show();"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Customers')</a>
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
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Phone')</th>
                                        <th>@lang('Balance')</th>
                                        <th>@lang('Total Invoice')</th>
                                        <th>@lang('Created')</th>
                                        <th>@lang('Status')</th>
                                        <th class="no-sort">@lang('Actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $item)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    @php
                                                        $condicion = isset($item->avatar)
                                                            ? asset(Storage::url('customer/avatar/' . $item->avatar))
                                                            : asset('assets/img/avatar.png');
                                                    @endphp
                                                    <a class="avatar avatar-md me-2"><img class="avatar-img rounded-circle"
                                                            src="{{ $condicion }}" alt="customer Image"></a>
                                                    <a>{{ $item->name }}
                                                        <span><span class="__cf_email__"
                                                                data-cfemail="0a606562644a6f726b677a666f24696567">{{ $item->email }}</span></span></a>
                                                </h2>
                                            </td>
                                            <td>{{ $item->phone }}</td>
                                            <td>$4,220</td>
                                            <td>2</td>
                                            <td>{{ $item->created_at->format('j F, Y, g:i A') }}</td>
                                            <td><span class="badge"
                                                    style="background-color: #E1FFED !important;
                                            color: {{ $item->Idstatus->color }} !important;">{{ $item->Idstatus->name }}</span>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a href="add-invoice.html" class="btn btn-greys me-2"><i
                                                        class="fa fa-plus-circle me-1"></i> Invoice</a>
                                                <a href="customers-ledger.html" class="btn btn-greys me-2"><i
                                                        class="fa-regular fa-eye me-1"></i> Ledger</a>
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('customers.edit', $item) }}"><i
                                                                        class="far fa-edit me-2"></i>@lang('Edit')</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                                        class="far fa-trash-alt me-2"></i>@lang('Delete')</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('customers.show', $item) }}"><i
                                                                        class="far fa-eye me-2"></i>@lang('View')</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('customers.activar', $item) }}"
                                                                    onclick="loading_show();"><i
                                                                        class="fa-solid fa-power-off me-2"></i>@lang('Activate')</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('customers.desactivar', $item) }}"
                                                                    onclick="loading_show();"><i
                                                                        class="far fa-bell-slash me-2"></i>@lang('Deactivate')</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    @include('customers.js')
@endsection --}}
