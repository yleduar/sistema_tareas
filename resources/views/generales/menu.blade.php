<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarColor02"
          aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          @auth
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="{{ route('usuarios') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tareas') }}">Tareas</a>
                </li>
              </ul>
              <div class="d-flex align-items-center">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <!-- Dropdown -->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                      data-mdb-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden ocultar">
                            @csrf
                          </form>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            
          @else
          
            <div class="d-flex align-items-center">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Dropdown -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}" id="navbarDropdownMenuLink" aria-expanded="false">
                    Registrarse
                  </a>
                </li>
              </ul>
            </div>
          @endauth
        </div>
      </div>
    </nav>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // make it as accordion for smaller screens
        if (window.innerWidth > 992) {
            document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem) {
            everyitem.addEventListener('mouseover', function(e) {
                let el_link = this.querySelector('a[data-mdb-toggle]');
                if (el_link != null) {
                let nextEl = el_link.nextElementSibling;
                el_link.classList.add('show');
                nextEl.classList.add('show');
                }
            });
            everyitem.addEventListener('mouseleave', function(e) {
                let el_link = this.querySelector('a[data-mdb-toggle]');
                if (el_link != null) {
                let nextEl = el_link.nextElementSibling;
                el_link.classList.remove('show');
                nextEl.classList.remove('show');
                }
            });
            });
        }
        });
    </script>
