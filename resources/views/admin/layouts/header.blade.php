<style>
    .btn-login {
        background-color: #00beff;
        border-color: #ff0000;
        color: #ffffff;
        padding: 5px 10px;
        font-size: 14px;
    }

    .btn-login:hover {
        background-color: #00a6d0;
        border-color: #ff0000;
    }
</style>

<nav class="navbar navbar-light bg-gradiant-green-blue nav-shadow">

    <div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-login" style="border-radius: 15px">
                <i class="fas fa-sign-in-alt mr-1"></i> LOGOUT
            </button>
        </form>
    </div>

    <div class="d-flex align-items-center mr-5">
        <a class="navbar-brand" href=""></a>
        <span class="">

            <span class="dropdown">
                <a class="dropdown-toggle text-decoration-none text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">logout</a>
                </div>
            </span>
        </span>

    </div>



</nav>
