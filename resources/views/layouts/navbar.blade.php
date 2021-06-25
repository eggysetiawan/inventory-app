<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('images/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8" width="50">
            <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
                <li class="nav-item{{ request()->is('products') ? ' active' : '' }}">
                    <a href="{{ route('products.index') }}" class="nav-link">{{ __('Product') }}</a>
                </li>
                <li class="nav-item{{ request()->is('activities') ? ' active' : '' }}">
                    <a href="{{ route('activities.index') }}" class="nav-link">{{ __('Activities') }}</a>
                </li>

            </ul>

            <div class="dropdown ml-auto">
                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" type="button">
                    <img src="{{ asset('images/' . auth()->user()->lang . '.png') }}"
                        alt="{{ auth()->user()->lang }}" width="25" class="img-thumbnail">
                    &nbsp; {{ strtoupper(auth()->user()->lang) }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <form action="{{ route('lang') }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="dropdown-item" value="id" name="lang">
                            <img src="{{ asset('images/id.png') }}" class="img-thumbnail" alt="id" width="25">
                            Bahasa Indonesia
                        </button>
                        <button type="submit" class="dropdown-item" value="en" name="lang">
                            <img src="{{ asset('images/en.png') }}" alt="en" width="25" class="img-thumbnail">
                            English
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</nav>
