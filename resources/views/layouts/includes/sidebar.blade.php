<nav class="col-2 bg-light pe-3">
    <h1 class="h4 py-3 text-center text-primary">
        <i class="fas fa-ghost me-2"></i>
        <span class="d-none d-md-inline">SIS Admin</span>
    </h1>
    <div class="list-group text-center text-lg-start">
        <span class="list-group-item disabled d-none d-lg-block">
            <small>CONTROLS</small>
        </span>

        <a href="{{ route('dashboard') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span class="d-none d-lg-inline">Dashboard</span>
        </a>

        <a href="{{ route('students.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('students.*') ? 'active' : '' }}">
            <i class="fas fa-user-graduate"></i>
            <span class="d-none d-lg-inline">Students</span>
        </a>

        <a href="{{ route('departments.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('departments.*') ? 'active' : '' }}">
            <i class="fas fa-building-columns"></i>
            <span class="d-none d-lg-inline">Departments</span>
        </a>
        
        <a href="{{ route('teachers.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span class="d-none d-lg-inline">Teachers</span>
        </a>

        <a href="{{ route('courses.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('courses.*') ? 'active' : '' }}">
            <i class="fas fa-book"></i>
            <span class="d-none d-lg-inline">Courses</span>
        </a>

        <a href="{{ route('attendance.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('attendance.*') ? 'active' : '' }}">
            <i class="fas fa-calendar-check"></i>
            <span class="d-none d-lg-inline">Attendances</span>
        </a>

        <a href="{{ route('gpas.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('gpa.*') ? 'active' : '' }}">
            <i class="fas fa-graduation-cap"></i>
            <span class="d-none d-lg-inline">GPA</span>
        </a>
    </div>
</nav>
