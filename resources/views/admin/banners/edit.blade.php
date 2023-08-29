@extends('admin.layouts.master')

@section('head-tag')
    <title>edit Banner</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">edit Banner</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.banner.update' , $banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..."
                        required autofocus value="{{ old('url' , $banner->url) }}">
                </div>
                @error('url')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control-file" required autofocus>
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>
@endsection
