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
                {{-- manage meal start --}}
                {{-- @if(Auth::user()->usertype !=='member') --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Meal
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/meal')?'show':'' }}" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'meal.view')?'active':'' }}" href="{{ route('meal.view') }}">View Meal</a>
                </div>
                {{-- @endif --}}
                {{-- manage meal end --}}
                {{-- manage meal cost start --}}
                {{-- @if(Auth::user()->usertype !=='member') --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Meal Cost
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/mealcost')?'show':'' }}" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ ($route == 'bazer.view')?'active':'' }}" href="{{ route('bazer.view') }}">Bazer Cost</a>

                        <a class="nav-link {{ ($route == 'other.view')?'active':'' }}" href="{{ route('other.view') }}">Other's Cost</a>
                </div>
                {{-- @endif --}}
                {{-- manage meal cost end --}}
                {{-- manage member Depost start --}}
                {{-- @if(Auth::user()->usertype !=='member') --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Member's Deposit
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/membermoney')?'show':'' }}" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'membermoney.view')?'active':'' }}" href="{{ route('membermoney.view') }}">View Deposit</a>
                </div>
                {{-- @endif --}}
                {{-- manage member Depost end --}}

                {{-- manage presentMonth start --}}
                {{-- @if(Auth::user()->usertype !=='member') --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Present Month
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/present')?'show':'' }}" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ ($route == 'presentmonth.view')?'active':'' }}" href="{{ route('presentmonth.view') }}">View Details</a>

                        <a class="nav-link {{ ($route == 'other.view')?'active':'' }}" href="{{ route('other.view') }}">Other's Cost</a>
                </div>
                {{-- @endif --}}
                {{-- manage presentMonth end --}}
                
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