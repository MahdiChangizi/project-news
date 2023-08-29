@extends('admin.layouts.master')

@section('head-tag')
    <title>banners</title>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-image"></i> Banner</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of banners</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>url</th>
                    <th>image</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $key => $banner)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $banner->url }}</td>
                        <td><img style="width: 80px;" src="{{ asset($banner->image['indexArray']['medium']) }}" alt="{{ $banner->id }}"></td>
                        <td>
                            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.banner.edit' , $banner->id) }}">edit</a>

                            <form class="d-inline" action="{{ route('admin.banner.destroy' , $banner->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection

@section('script')
@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
