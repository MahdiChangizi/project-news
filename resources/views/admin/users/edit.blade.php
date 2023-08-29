@extends('admin.layouts.master')

@section('head-tag')
    <title>Edit User</title>
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit User</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.user.update' , $user->id) }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
                </div>
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  value="{{ old('email', $user->email) }}">
                </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password ...">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="permission">permission</label>
                    <select name="permission" id="permission" class="form-control" required autofocus>
                        <option value="0" @if (old('permission', $user->permission) == 0) selected @endif>User</option>
                        <option value="1" @if (old('permission', $user->permission) == 1) selected @endif>Admin</option>
                    </select>
                </div>
                @error('permission')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>

        </section>
    </section>
@endsection
