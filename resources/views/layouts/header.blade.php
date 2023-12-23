<style>
    .container a {
        color: #991f35;
        transition: background-color 0.3s ease;
    }
    .container a:hover {
        color: #6c6a6a;
    }
    .navbar-nav {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .brand-text {
        display: flex;
        align-items: center;
    }
    .brand-text img {
        max-width: 100%;
        width: auto;
        height: 65px;
        margin-right: 10px;
    }
</style>
<nav class="main-header navbar navbar-expand-md" style="background-color: #8dada9">
    <div class="container" style="font-size: 18px;">
        <a href="{{ route('index') }}" class="navbar-brand">
            <span class="brand-text">
                <img src="{{ asset('dist/img/logo.png') }}" alt="Logo">
                 <b>QRLink </b>&nbsp;<b class="" style="color: #afcfcf">PORTAL</b>
            </span>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('web.link') }}" class="nav-link @if(request()->routeIs('web.link')) active @endif">URL Shorter & QR Code Generator</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle @if(request()->routeIs('web.about-project') || request()->routeIs('web.about-us')) active @endif">Others</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('web.about-project') }}" class="dropdown-item @if(request()->routeIs('web.about-project')) active @endif">About This Project</a></li>
                        <li><a href="{{ route('web.about-us') }}" class="dropdown-item @if(request()->routeIs('web.about-us')) active @endif">About Us (Cuialy) </a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-submenu dropdown-hover"></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
