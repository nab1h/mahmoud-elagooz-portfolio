<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li class="active"><a href="{{route('admin.dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> Edite Content
                page</a></li>
        <li><a href="{{route('experiences.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Cv</a></li>
        <li><a href="{{route('admin.linkes') }}"><em class="fa fa-toggle-off">&nbsp;</em> Linkes</a></li>
        <li><a href="{{route('projects.index') }}"><em class="fa fa-clone">&nbsp;</em> Projects &amp; Works</a></li>
        <li><a href="{{route('statistics.index') }}"><em class="fa fa-calendar">&nbsp;</em> My Clients</a></li>
        <li><a href="{{route('password.form') }}"><em class="fa fa-power-off">&nbsp;</em> Change Password</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #e74c3c;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        " onmouseover="this.style.background='#c0392b'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)';"
                    onmouseout="this.style.background='#e74c3c'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div><!--/.sidebar-->