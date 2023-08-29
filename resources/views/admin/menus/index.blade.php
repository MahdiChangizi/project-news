@extends('admin.layouts.master')

@section('head-tag')
    <title>Menus</title>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i>Menus</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="{{ route('admin.menu.create') }}" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of menus</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>url</th>
                <th>parent ID</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($menus as $key => $menu)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->url }}</td>
                @if ($menu->parent_id == null)
                <td>ندارد</td>
                @else
                <td>{{ $menu->parent->name }}</td>
                @endif

                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.menu.edit', $menu->id) }}">edit</a>

                    <form class="d-inline" action="{{ route('admin.menu.destroy', $menu->id) }}" method="post">
                        @csrf
                        @method('delete')
                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach


            </tbody>
            </table>
            </section>

@endsection

@section('script')
@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete']);
@endsection
