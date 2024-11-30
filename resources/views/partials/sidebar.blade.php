<div class="d-flex flex-column bg-light border-right vh-100 sticky-sidebar" id="sidebar-wrapper">
    <div class="sidebar-heading py-4 text-center bg-primary text-white">
        <i class="fas fa-passport fa-lg"></i>
        <span class="ml-2 font-weight-bold">Visitor Pass</span>
    </div>
    <ul class="nav flex-column list-group list-group-flush">
        <!-- Dashboard -->
        <li class="list-group-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <!-- Profile -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-user mr-2"></i> Profile
            </a>
        </li>
        <!-- Departments -->
        <li class="list-group-item">
            <a href="{{ route('departments.index') }}" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-layer-group mr-2"></i> Departments
            </a>
        </li>
        <!-- Employees -->
        <li class="list-group-item">
            <a href="{{ route('employees.index') }}" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-users mr-2"></i> Employees
            </a>
        </li>
        <!-- Designation -->
        <li class="list-group-item">
            <a href="{{ route('designations.index') }}" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-briefcase mr-2"></i> Designation
            </a>
        </li>
        <!-- Administration -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-shield-alt mr-2"></i> Administration
            </a>
        </li>
        <!-- Attendance -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-calendar-check mr-2"></i> Attendance
            </a>
        </li>
        <!-- Visitors -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-walking mr-2"></i> Visitors
            </a>
        </li>
        <!-- Pre-registers -->
        <li class="list-group-item">
            <a href="{{ route('pre-registers.index') }}" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-clipboard-list mr-2"></i> Pre-registers
            </a>
        </li>
        <!-- Reports -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-file-alt mr-2"></i> Reports
            </a>
        </li>
        <!-- Settings -->
        <li class="list-group-item">
            <a href="#" class="nav-link text-dark d-flex align-items-center">
                <i class="fas fa-cog mr-2"></i> Settings
            </a>
        </li>
    </ul>
</div>
