<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link mt-3" href="{{ url('/') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#search" aria-expanded="false" aria-controls="search">
                <div class="sb-nav-link-icon"><i class="fab fa-searchengin"></i></div>
                Search
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="search" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('company_search')}}">Company Search</a>
                    <a class="nav-link" href="{{url('employee_search')}}">Employee Search</a>
                    <a class="nav-link" href="{{url('country_search')}}">Country Search</a>
                    <a class="nav-link" href="{{url('fromdate_search')}}">Fromdate Search</a>
                    <a class="nav-link" href="{{url('bod_search')}}">BOD Search</a>
                    <a class="nav-link" href="{{url('depend_search')}}">Dependent Search</a>
                </nav>
            </div>
            <a class="nav-link" href="{{ url('/country') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-globe-asia"></i></div>
                Country
            </a>
            <a class="nav-link" href="{{ url('/relationship') }}">
                <div class="sb-nav-link-icon"><i class="fab fa-buffer"></i></div>
                Relationship
            </a>
            <a class="nav-link" href="{{ url('/view_position') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-vote-yea"></i></div>
                Position
            </a>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company" aria-expanded="false" aria-controls="company">
                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                Company
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="company" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('/create_company')}}">Create Company</a>
                    <a class="nav-link" href="{{url('/view_company')}}">List Company</a>
                </nav>
            </div>
            <a class="nav-link" href="{{ url('/view_employee') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                Employee
            </a>
            <a class="nav-link" href="{{ url('/view_dependent') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                Dependent
            </a>
            <a class="nav-link" href="{{url('employee_approve')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-folder"></i></div>
                Stay Permit List
            </a>
            {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#staypermit" aria-expanded="false" aria-controls="staypermit">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Stay Permit
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="staypermit" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('employee_approve')}}">Employoee Permit</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Dependent Permit</a>
                </nav>
            </div> --}}
            <div class="sb-sidenav-menu-heading">User</div>
            <a class="nav-link" href="{{url('view_user')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                User
            </a>

            {{-- <div class="sb-sidenav-menu-heading">Tables</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tableofdatatable" aria-expanded="false" aria-controls="tableofdatatable">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Tables
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="tableofdatatable" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('/country') }}">Country</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Company</a>
                    <a class="nav-link" href="layout-static.html">Employoee</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Dependent</a>
                    <a class="nav-link" href="layout-static.html">Relationship</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Position</a>
                </nav>
            </div> --}}
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as</div>
        Administration
    </div>
</nav>