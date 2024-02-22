    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/buku*') ? 'active' : '' }}" href="/dashboard/buku">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Data Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
              <span data-feather="list" class="align-text-bottom"></span>
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/penerbit*') ? 'active' : '' }}" href="/dashboard/penerbit">
              <span data-feather="trello" class="align-text-bottom"></span>
              Penerbit
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
              <span data-feather="user" class="align-text-bottom"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">
              <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
              Homepage
            </a>
          </li>
        </ul>
      </div>
    </nav>
