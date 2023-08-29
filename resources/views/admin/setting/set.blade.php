@extends('admin.layouts.master')

@section('head-tag')
    <title>Set Setting</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Set Setting</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.setting.update', $setting->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $setting->title) }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                         value="{{ old('description', $setting->description) }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords"
                        value="{{ old('keywords', $setting->keywords) }}" autofocus>
                </div>


                <div class="form-group">

                    <img style="width: 100px;" src="" alt="">
                    <hr />

                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
                </div>

                <div class="form-group">

                    <img style="width: 100px;" src="" alt="">
                    <hr />

                    <label for="icon">Icon</label>
                    <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">set</button>
            </form>
        </section>
    </section>
@endsection
