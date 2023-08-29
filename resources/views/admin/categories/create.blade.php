@extends('admin.layouts.master')

@section('head-tag')
    <title>categories-create</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Create Category</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ...">
                </div>

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    @endsection
