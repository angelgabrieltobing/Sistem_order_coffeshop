<nav x-data="{ open: false }" class="bg-dark shadow">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center py-3">

            <!-- Logo -->
            <div>

                <a href="{{ route('admin.dashboard') }}"
                   class="text-white text-decoration-none fw-bold fs-4">

                    ☕ Coffee Shop

                </a>

            </div>

            <!-- Desktop Menu -->
            <div class="d-none d-md-flex align-items-center gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="text-white text-decoration-none">

                    Dashboard

                </a>

                @if(Route::has('menu'))

                    <a href="{{ route('menu') }}"
                       class="text-white text-decoration-none">

                        Menu

                    </a>

                @endif

                @if(Auth::check())

                    <span class="text-warning">

                        {{ Auth::user()->name }}

                    </span>

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm">

                            Logout

                        </button>

                    </form>

                @endif

            </div>

            <!-- Mobile Button -->
            <button
                class="btn btn-outline-light d-md-none"
                @click="open = ! open">

                ☰

            </button>

        </div>

        <!-- Mobile Menu -->
        <div
            x-show="open"
            x-transition
            class="pb-3 d-md-none">

            <a
                href="{{ route('admin.dashboard') }}"
                class="d-block text-white text-decoration-none py-2">

                Dashboard

            </a>

            @if(Route::has('menu'))

                <a
                    href="{{ route('menu') }}"
                    class="d-block text-white text-decoration-none py-2">

                    Menu

                </a>

            @endif

            @if(Auth::check())

                <div class="text-warning py-2">

                    {{ Auth::user()->name }}

                </div>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger w-100">

                        Logout

                    </button>

                </form>

            @endif

        </div>

    </div>

</nav>