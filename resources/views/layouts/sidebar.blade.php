<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <a href="{{ route('jobs.create') }}" class="btn btn-success btn-block">New Job
          <i class="mdi mdi-plus"></i>
        </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('jobs.index') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Jobs</span>
      </a>
    </li>

  </ul>
</nav>