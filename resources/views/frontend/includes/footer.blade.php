<nav class="header-about-us-parent-for-mobile">
  <span class="close-icon" onclick="toggleMobileMenu()">✖</span>
  <div class="header-nav-text header-about-us" id="aboutUsText">
    <a href="{{ route('frontend.page.about-us') }}">About us</a>
  </div>
  <div class="header-nav-text header-product" id="productText">
    <a href="{{ route('frontend.page.product') }}">Product</a>
  </div>
  <div class="header-nav-text header-career" id="careerText">
    <a href="{{ route('frontend.page.career') }}">Career</a>
  </div>
  @guest
      <div class="header-nav-text header-member-area" id="memberAreaText">
          <a href="{{ route('frontend.auth.login') }}">Member Area</a>
      </div>
  @else
      <div class="header-nav-text header-member-area" id="memberAreaText">
          <a href="{{ route(homeRoute()) }}">Member Area</a>
      </div>
      <div class="header-nav-text header-member-area" id="memberAreaText">
          <a href="{{ route('frontend.auth.logout') }}">Logout</a>
      </div>
  @endguest

</nav>

<footer class="footer">
  <div class="row w-100">
    <div class="col-md-6">
      <div class="footer-nav-section">
        <div class="help-footer-text">Help</div>
        <div class="footer-faq-help-center-container">
          <a class="footer_link" href="{{ route('frontend.member.help-center') }}">
            <p class="faq-footer-text">FAQ</p>
          </a>
          <a class="footer_link" href="{{ route('frontend.member.help-center') }}">
            <p class="help-center-footer-text">Help Center</p>
          </a>
          <a class="footer_link" href="{{ route('frontend.member.contact-us.index') }}">
          <p class="maintenance-fee-footer-text">Maintenance Fee</p>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="footer-disclaimer-trading-forex-carri-wrapper">
        <div class="footer-disclaimer-trading-forex-container">
          <p class="footer-disclaimer">
            <b>Disclaimer</b>
          </p>
          <p class="footer-trading-forex-carries">
            Trading Forex carries a high level of risk, before deciding to
            trade forex you should carefully
          </p>
          <p class="footer-consider-your-investment">
            consider your investment objectives, level of experience, and risk
            appetite.
          </p>
          <p class="footer-dayton-does-not">
            Dayton does not force users to make transactions.
          </p>
          <p class="footer-all-decisions-with">
            All decisions with your digital money assets are your own decision
            and do not depend on any party.
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>