<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class=" d-flex justify-content-start align-items-center">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/logo.png') }}" width="" height="80px" alt="Logo">
        </a>
        <ul class="navbar-nav text-bold d-flex">
            <li class="nav-item me-3">
                <a href="{{route('home')}}" class="nav-link fs-4">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="{{route('course')}}" class="nav-link fs-4">Kursus</a>
            </li>
        </ul>
    </div>
</nav>
