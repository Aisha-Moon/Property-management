 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('user/dashboard') }}" @if(Request::segment(2)=='dashboard') @else collapsed @endif">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('user/book_service/add') }}" @if(Request::segment(2)=='book_service') @else collapsed @endif">
          <i class="bi bi-person"></i>
          <span>Book a Service</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>Maintenance Agreement</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Edit Profile</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('logout') }}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside>
