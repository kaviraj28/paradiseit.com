<header>
    <div class="navbar-area">
        <div class="mobile-nav">
            <a class="logo" href="/">
                <img class="logo-one"
                    src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Paradise IT Solutions' }}">
            </a>
        </div>
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="/">
                        <img class="logo-one"
                            src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                            alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Paradise IT Solutions' }}">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        @php
                            $menus = getMenus(1);
                        @endphp
                        @if ($menus)
                            <ul class="navbar-nav m-auto">
                                @foreach ($menus as $key => $value)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $value->slug }}"
                                            target="{{ $value->target ?? '_self' }}">{{ $value->name ?? $value->title }}
                                            @if (isset($value->children))
                                                <i class="bx bx-caret-down"></i>
                                            @endif
                                        </a>
                                        @if (isset($value->children))
                                            <ul class="dropdown-menu">
                                                @foreach ($value->children as $key => $child)
                                                    @foreach ($child as $key => $data)
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ $data->slug }}"
                                                                target="{{ $data->target ?? '_self' }}">
                                                                {{ $data->name ?? $data->title }}

                                                                @if (isset($data->children))
                                                                    <i class="bx bx-caret-right"></i>
                                                                @endif
                                                            </a>
                                                            @if (isset($data->children))
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($data->children as $key => $subchild)
                                                                        @foreach ($subchild as $key => $subdata)
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    href="{{ $subdata->slug }}"
                                                                                    target="{{ $subdata->target ?? '_self' }}">
                                                                                    {{ $subdata->name ?? $subdata->title }}

                                                                                    @if (isset($subdata->children))
                                                                                        <i
                                                                                            class="bx bx-caret-right"></i>
                                                                                    @endif
                                                                                </a>
                                                                                @if (isset($subdata->children))
                                                                                    <ul class="dropdown-menu">
                                                                                        @foreach ($subdata->children as $key => $sschild)
                                                                                            @foreach ($sschild as $key => $sbdata)
                                                                                                <li class="nav-item">
                                                                                                    <a class="nav-link"
                                                                                                        href="{{ $sbdata->slug }}"
                                                                                                        target="{{ $sbdata->target ?? '_self' }}">
                                                                                                        {{ $sbdata->name ?? $sbdata->title }}
                                                                                                    </a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="nav-side d-display">
                            <div class="nav-side-item">
                                <div class="get-btn">
                                    <a class="default-btn btn-bg-two border-radius-50" href="/courses">Our Courses
                                        <i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
