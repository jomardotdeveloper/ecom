@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Users', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Users" description="You have {{ count($users) }} users"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('users.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Full Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($users as $user)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            {{ $user->full_name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $user->email }}
                        </td>
                        <x-datatable-action :items="[
                            array('name' => 'Edit', 'url' => route('users.edit', $user), 'icon'=> 'icon ni ni-pen'),
                            array('name' => 'Delete', 
                                  'onclick' => 'deleteRecord(' . '`' . route('users.destroy', ['user' => $user]) . '`' .')', 
                                  'icon'=> 'icon ni ni-trash'),
                        ]"/>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- END OF DATATABLE --}}
</div>
@endsection