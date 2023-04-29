@guest
        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="/">CourseraMessanger</a>
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/login">Register</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
@endguest 
@auth
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">CourseraMessanger</a>
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/sendMessage">sendMessage</a>
            </li>
          </ul>
        </div>
      </div>
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="nav-link" style="margin-right: 15px" href="/messages">
            <span><i class="fas fa-envelope-open-text"></i></span>
            @isset($count)
                @if ($count>0)
                <span class="badge rounded-pill badge-notification bg-danger">{{ $count }}</span>
                @endif
            @endisset($count)            

        </a>
        <ul class="navbar-nav">
          <form action="/logout" method="post">
            @csrf
            <li class="nav-item">
              <button type="submit" class="btn btn-light btn-rounded">logout</a>
            </li>
          </form>
        </ul>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  @endauth