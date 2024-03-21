<header class="header-rectangle-parent">
  <div class="d-flex align-items-center">
    <a href="{{ route('frontend.page.home') }}">
        <div class="header-frame-parent mr-auto">
              <img class="header-frame-item" loading="lazy" alt="" src="{{ asset('assets/frontend/img/group-2.svg') }}" />
              <img class="header-group-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/group.svg') }}" />
        </div>
    </a>
    <span class="header-nav-toggle btn btn-link" onclick="toggleMobileMenu()">☰</span>
  </div>
  <nav class="header-about-us-parent">
    <div class="header-nav-text header-about-us" id="aboutUsText">
        <a href="{{ route('frontend.page.about-us') }}">About us</a>
    </div>
    <div class="header-nav-text header-product" id="productText">
        <a href="{{ route('frontend.page.product') }}">Product</a>
    </div>
    <div class="header-nav-text header-career" id="careerText">
        <a href="{{ route('frontend.page.career') }}">Career</a>
    </div>
    <div class="header-nav-text header-member-area" id="memberAreaText">Member Area</div>
  </nav>
</header>