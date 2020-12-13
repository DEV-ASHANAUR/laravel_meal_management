@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                {{-- manage user start --}}
                @if(Auth::user()->usertype !=='member')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/users')?'show':'' }}" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'users.view')?'active':'' }}" href="{{ route('users.view') }}">View User</a>
                </div>
                @endif
                {{-- manage user end --}}
                
            </div>    
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in As : @php
                echo Auth::user()->usertype 
              @endphp
            </div>
        </div>
    </nav>
</div>