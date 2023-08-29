<nav class="col-md-2 d-none d-md-block pt-3 bg-sidebar sidebar px-0">
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home"></i> Home</a>
    @if (auth()->user()->permission == 1)
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.category.index') }}"><i class="fas fa-clipboard-list"></i> Category</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.post.index') }}"><i class="fas fa-newspaper"></i> Post</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.banner.index') }}"><i class="fas fa-image"></i> Banner</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.comment.index') }}"><i class="fas fa-comments"></i> Comment</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.menu.index') }}"><i class="fas fa-bars"></i> Menus</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> User</a>
    <a class="text-decoration-none d-block py-1 px-2 mt-1" href="{{ route('admin.setting.index') }}"><i class=" fas fa-tools"></i> Web Setting</a>
    @endif
</nav>
