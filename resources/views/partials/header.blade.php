<div class="d-flex justify-content-between align-items-center p-3 bg-primary text-white">
    <!-- Left Section: Visitor ID and CheckOut -->
    <div>
        <input type="text" class="form-control d-inline-block" placeholder="Enter Visitor ID" style="width: 200px;">
        <button class="btn btn-success ml-2">CheckOut</button>
    </div>

    <!-- Right Section: Language Switcher and User Menu -->
    <div class="text-right">
        <!-- Language Switcher -->
        <div class="dropdown d-inline-block">
            <a class="text-white dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }} <!-- Current Language -->
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{ route('language.switch', ['locale' => 'en']) }}">English</a>
                <a class="dropdown-item" href="{{ route('language.switch', ['locale' => 'sw']) }}">Swahili</a>
                <!-- Add more languages as needed -->
            </div>
        </div>
        |

        <!-- User Dropdown Menu -->
        <div class="dropdown d-inline-block">
            <a class="text-white dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i> Hi, {{ auth()->user()->first_name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.update') }}">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
