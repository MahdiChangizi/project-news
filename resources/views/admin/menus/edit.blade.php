@extends('admin.layouts.master')

@section('head-tag')
    <title>Edit Menu</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit Menu</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="{{ route('admin.menu.update' , $menu->id) }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name' , $menu->name) }}" placeholder="Enter name ..."
                        required>
                </div>

                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url' , $menu->url) }}" placeholder="Enter url ..."
                        required>
                </div>

                <div class="form-group">
                    <label for="parent_id">parent ID</label>
                    <select name="parent_id" id="parent_id" class="form-control" autofocus>
                        <option value="">انتخاب کنید</option>
                        @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? "delected" : '' }}>{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>
@endsection
