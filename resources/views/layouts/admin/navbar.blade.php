<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="user-panel d-flex">
                <div class="info">
                    <a href="{{ route('profile.edit') }}"
                        class="d-block text-white">{{ Str::limit(auth()->user()->name, 15) }}</a>
                </div>
                <div class="image">
                    @if (Auth::user()->foto_user != null)
                        <img src="{{ asset('assets/profile/' . Auth::user()->foto_user) }}"
                            class="img-circle elevation-2" alt="User Image"
                            style="width: 35px; height: 35px; object-fit: cover; object-position: center; border-radius: 50%;">
                    @else
                        <img src="{{ asset('assets/profile/default.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    @endif
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
