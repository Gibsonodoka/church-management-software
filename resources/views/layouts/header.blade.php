<header class="header">
    <div class="header-content">
        <button class="sidebar-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        
        <div class="user-profile">
            <div class="user-avatar" data-tooltip="View Profile">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="user-info">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <span class="user-role">
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                        @if(!$loop->last), @endif
                    @endforeach
                </span>
            </div>
        </div>
    </div>
</header>