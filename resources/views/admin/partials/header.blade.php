<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item">
                <img src="{{ asset(Auth::user()->avatar ? 'storage/' . Auth::user()->avatar : 'adm/static/img/avatars/avatar.jpg') }}"
                    class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" />

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="button" id="btn-logout" class="btn btn-danger">
                        <i data-feather="log-out" class="align-middle me-1"></i> <span class="align-middle">{{ Auth::user()->name }}</span>
                    </button>
                </form>

            </li>
        </ul>
    </div>
</nav>
