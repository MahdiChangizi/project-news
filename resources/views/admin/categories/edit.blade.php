@extends('admin.layouts.master')

@section('head-tag')
    <title>categories</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit Category</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form action="{{ route('admin.category.update' , $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $category->name) }}">
                    <!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>
@endsection
