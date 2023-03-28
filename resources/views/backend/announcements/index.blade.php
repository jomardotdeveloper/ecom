@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Posts', 'url' => route('announcements.index')),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Posts" description="You have {{ count($announcements) }} posts"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('announcements.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($announcements as $announcement)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            {{ $announcement->title }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $announcement->created_at->format('d M Y') }}
                        </td>
                        <x-datatable-action :items="[
                            array('name' => 'View', 'url' => route('announcements.show', $announcement), 'icon'=> 'icon ni ni-eye'),
                            array('name' => 'Edit', 'url' => route('announcements.edit', $announcement), 'icon'=> 'icon ni ni-pen'),
                            array('name' => 'Delete', 
                                  'onclick' => 'deleteRecord(' . '`' . route('announcements.destroy', ['announcement' => $announcement]) . '`' .')', 
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