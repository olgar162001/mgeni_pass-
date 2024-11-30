<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <i class="fas fa-passport"></i> pass
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Have Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visitor.havebeenhere') }}">Been here Before</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Check Out</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">GB English</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        </ul>
    </div>
</nav>
