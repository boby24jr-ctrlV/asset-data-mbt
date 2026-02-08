<section class="navbar-area navbar-nine">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{ route('fe.dashboard') }}">
        <img src="{{ asset('fe-asset/images/white-logo.svg') }}" alt="Logo">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine">
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNine">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="page-scroll {{ request()->routeIs('fe.dashboard') ? 'active' : '' }}" href="{{ route('fe.dashboard') }}">
              🏠 Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pemeliharaan.*') ? 'active' : '' }}" href="{{ route('pemeliharaan.index') }}">
              🔧 Pemeliharaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('perbaikan.*') ? 'active' : '' }}" href="{{ route('perbaikan.index') }}">
              🛠️ Perbaikan
            </a>
          </li>
          <li class="nav-item">
            <a class="page-scroll" href="#contact">
              📞 Contact
            </a>
          </li>
        </ul>

        {{-- USER INFO & LOGOUT BUTTON --}}
        <div class="navbar-nav ms-auto d-flex align-items-center">
          {{-- Tampilkan nama user yang login --}}
          <span class="navbar-text me-3 text-white d-none d-lg-block">
            <i class="bi bi-person-circle"></i> 
            <strong>{{ Auth::guard('student')->user()->name ?? 'Guest' }}</strong>
          </span>

          {{-- Tombol Logout --}}
          <form action="{{ route('logout') }}" method="POST" class="d-inline" id="logoutForm">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm btn-logout">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</section>

{{-- CUSTOM STYLES --}}
<style>
  /* Navbar Background */
  .navbar-area {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    padding: 15px 0;
    position: sticky;
    top: 0;
    z-index: 999;
  }

  /* Navbar Brand */
  .navbar-brand img {
    height: 40px;
    transition: transform 0.3s ease;
  }

  .navbar-brand:hover img {
    transform: scale(1.05);
  }

  /* Nav Links */
  .navbar-nav .nav-link,
  .navbar-nav .page-scroll {
    color: #fff !important;
    padding: 10px 18px;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 0 5px;
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .page-scroll:hover {
    color: #ffd700 !important;
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
  }

  .navbar-nav .nav-link.active,
  .navbar-nav .page-scroll.active {
    color: #ffd700 !important;
    background: rgba(255, 255, 255, 0.15);
    font-weight: 600;
  }

  /* User Info Text */
  .navbar-text {
    font-size: 14px;
    font-weight: 500;
    padding: 8px 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
  }

  .navbar-text i {
    font-size: 18px;
    vertical-align: middle;
    margin-right: 5px;
  }

  /* Logout Button */
  .btn-logout {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
  }

  .btn-logout:hover {
    background: linear-gradient(135deg, #ee5a6f 0%, #c82333 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(220, 53, 69, 0.4);
  }

  .btn-logout:active {
    transform: translateY(0);
  }

  /* Navbar Toggler */
  .navbar-toggler {
    border: none;
    padding: 0;
  }

  .navbar-toggler:focus {
    box-shadow: none;
  }

  .toggler-icon {
    display: block;
    width: 25px;
    height: 3px;
    background: #fff;
    margin: 5px 0;
    border-radius: 2px;
    transition: all 0.3s ease;
  }

  /* Responsive Styles */
  @media (max-width: 991px) {
    .navbar-nav.ms-auto {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,0.2);
    }

    .navbar-text {
      display: block !important;
      margin-bottom: 15px;
      text-align: center;
    }

    .btn-logout {
      width: 100%;
      padding: 12px;
    }

    .navbar-nav .nav-link,
    .navbar-nav .page-scroll {
      text-align: center;
      margin: 5px 0;
    }
  }

  @media (max-width: 576px) {
    .navbar-brand img {
      height: 30px;
    }

    .navbar-nav .nav-link,
    .navbar-nav .page-scroll {
      font-size: 14px;
      padding: 8px 15px;
    }
  }

  /* Loading Animation on Logout */
  .btn-logout.loading {
    pointer-events: none;
    opacity: 0.7;
  }

  .btn-logout.loading::after {
    content: "";
    display: inline-block;
    width: 14px;
    height: 14px;
    margin-left: 8px;
    border: 2px solid #fff;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spinner 0.6s linear infinite;
  }

  @keyframes spinner {
    to { transform: rotate(360deg); }
  }
</style>

{{-- JAVASCRIPT FOR SMOOTH INTERACTIONS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll untuk anchor links
    document.querySelectorAll('a.page-scroll').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Close mobile menu after click
                    const navbarCollapse = document.getElementById('navbarNine');
                    if (navbarCollapse.classList.contains('show')) {
                        navbarCollapse.classList.remove('show');
                    }
                }
            }
        });
    });

    // Konfirmasi logout dengan loading animation
    const logoutForm = document.getElementById('logoutForm');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (confirm('🔒 Yakin ingin logout?')) {
                const btn = this.querySelector('.btn-logout');
                btn.classList.add('loading');
                btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Logging out...';
                
                // Submit form after animation
                setTimeout(() => {
                    this.submit();
                }, 500);
            }
        });
    }

    // Highlight active menu on scroll (optional)
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPos = window.pageYOffset + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                document.querySelectorAll('.page-scroll').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });
});
</script>