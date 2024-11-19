<div class="navbar bg-orange-600">
    <div class="navbar-start">
        @if ($showBackButton)
            <a href="/" class="btn btn-sm btn-ghost">
                <img class="h-5" src="{{ asset('assets/back.png') }}" alt="back">
            </a>
        @endif
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl text-gray-200">{{ $pageTitle }}</a>
    </div>
    <div class="navbar-end"></div>
</div>
