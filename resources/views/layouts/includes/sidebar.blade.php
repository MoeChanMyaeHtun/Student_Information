<nav class="col-2 bg-light pe-3">
    <h1 class="h4 py-3 text-center text-primary">
        <i class="fas fa-ghost me-2"></i>
        <span class="d-none d-md-inline">SRS Admin</span>
    </h1>
    <div class="list-group text-center text-lg-start">
        <span class="list-group-item disabled d-none d-lg-block">
            <small>CONTROLS</small>
        </span>

        <a href="{{ route('dashboard') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span class="d-none d-lg-inline">Dashboard</span>
        </a>

        <a href="{{ route('students.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('students.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span class="d-none d-lg-inline">Students</span>
        </a>

        <a href="{{ route('departments.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('departments.*') ? 'active' : '' }}">
            <i class="fa-solid fa-building"></i>
            <span class="d-none d-lg-inline">Departments</span>
        </a>

        <a href="{{ route('gpa.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('gpa.*') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i>
            <span class="d-none d-lg-inline">GPA</span>
        </a>
    </div>
</nav>
