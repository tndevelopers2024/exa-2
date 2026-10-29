<?php
if (!defined('ABSPATH')) { exit; }
get_header();
?>


  <div class="site-shell mx-auto bg-[#f8f6f2] min-h-screen flex flex-col relative"
    style="font-family:'Inter',sans-serif">

    
    <header id="main-header" class="banner-bg px-5 pt-5 pb-1 bg-white/40 backdrop-blur-sm">
      
      <div class="flex items-center justify-between mb-5 relative z-10">
        <div class="flex items-center gap-3">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/logo/logo-3.png')); ?>" alt="Exa" class="h-9 object-contain drop-shadow-lg" />
        </div>
        <nav class="desktop-nav" aria-label="Main navigation">
          <a href="#services">Our services</a>
          <a href="#pricing">Pricing</a>
          <a href="#testimonials">Customer stories</a>
          <a class="nav-cta" href="#pricing">Find your service ↗</a>
        </nav>
        <div class="flex items-center gap-2.5">
          <button onclick="toggleMenu()" class="w-9 h-9 rounded-full flex items-center justify-center"
            style="background:rgba(188,101,135,.25); border:1px solid rgba(188,101,135,.4)">
            <svg class="w-5 h-5 text-[#4E0636]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      
      

      
      

      
      
    </header>

    
    <main class="flex-1 overflow-y-auto" id="main-scroll">

      
      

      
      <div id="hero" class=" mt-4 overflow-hidden relative lift fade-up" style="animation-delay:.05s">
        <div class="hero-copy">
          <p class="hero-eyebrow">A little care. A better home.</p>
          <h1>Good homes<br>deserve great care.</h1>
          <p>From everyday fixes to a fresh start. Find the right service for your home, all in one place.</p>
          <div class="hero-actions"><a class="hero-primary" href="#services">Explore services ↗</a><a class="hero-secondary" href="#pricing">View service prices</a></div>
        </div>
        <div class="swiper hero-swiper h-42 bg-[#f8f6f2]">
          <div class="swiper-wrapper">
            <div class="swiper-slide cursor-pointer" onclick="openWA('Exa Featured Service')">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/banner/BannersArtboard 1.avif')); ?>" alt="Banner 0"
                class="w-full h-full object-contain object-center" />
            </div>
            <div class="swiper-slide cursor-pointer" onclick="openWA('Exa Featured Service')">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/banner/BannersArtboard 2.avif')); ?>" alt="Banner 0"
                class="w-full h-full object-contain object-center" />
            </div>
            <div class="swiper-slide cursor-pointer" onclick="openWA('Exa Featured Service')">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/banner/BannersArtboard 3.avif')); ?>" alt="Banner 0"
                class="w-full h-full object-contain object-center" />
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      
      <nav class="desktop-categories" aria-label="Browse services">
        <a href="#sec-aircon">Aircon</a><a href="#sec-cleaning">Cleaning</a><a href="#sec-handyman">Handyman</a><a href="#sec-plumbing">Plumbing</a><a href="#sec-electrical">Electrical</a><a href="#sec-painting">Painting</a>
      </nav>
      <section id="services" class="mt-6 fade-up" style="animation-delay:.1s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]">Top Services </h2>
        </div>
        <div class="swiper services-swiper pb-4">
          <div id="row1" class="swiper-wrapper"></div>
        </div>
      </section>

            
      <section id="sec-aircon" class="mt-6 fade-up" style="animation-delay:.13s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]"> Aircon</h2>
          
        </div>
        <div class="swiper aircon-swiper pb-4">
          <div id="row-aircon" class="swiper-wrapper"></div>
        </div>
      </section>

      
      <section id="sec-cleaning" class="mt-6 fade-up" style="animation-delay:.16s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]"> Cleaning</h2>
          
        </div>
        <div class="swiper cleaning-swiper pb-4">
          <div id="row-cleaning" class="swiper-wrapper"></div>
        </div>
      </section>

      
      <section id="sec-handyman" class="mt-6 fade-up" style="animation-delay:.19s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]"> Handyman</h2>
          
        </div>
        <div class="swiper handyman-swiper pb-4">
          <div id="row-handyman" class="swiper-wrapper"></div>
        </div>
      </section>

      
      <section id="sec-plumbing" class="mt-6 fade-up">
        <div class="flex items-center justify-between px-4 mb-3"><h2 class="font-serif text-[17px] text-[#4E0636]">Plumbing</h2></div>
        <div class="swiper catalogue-swiper plumbing-swiper pb-4"><div id="row-plumbing" class="swiper-wrapper"></div></div>
      </section>
      <section id="sec-electrical" class="mt-6 fade-up">
        <div class="flex items-center justify-between px-4 mb-3"><h2 class="font-serif text-[17px] text-[#4E0636]">Electrical</h2></div>
        <div class="swiper catalogue-swiper electrical-swiper pb-4"><div id="row-electrical" class="swiper-wrapper"></div></div>
      </section>
      <section id="sec-painting" class="mt-6 fade-up">
        <div class="flex items-center justify-between px-4 mb-3"><h2 class="font-serif text-[17px] text-[#4E0636]">Painting</h2></div>
        <div class="swiper catalogue-swiper painting-swiper pb-4"><div id="row-painting" class="swiper-wrapper"></div></div>
      </section>
      <section id="sec-pest" class="mt-6 fade-up" style="animation-delay:.22s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]"> Pest Control</h2>
          
        </div>
        <div class="swiper pest-swiper pb-4">
          <div id="row-pest" class="swiper-wrapper"></div>
        </div>
      </section>


      
      




      <section id="pricing" aria-labelledby="pricing-title">
        <div class="pricing-heading"><p class="section-kicker">A SIMPLE PRICE GUIDE</p><h2 id="pricing-title">Choose a service.<br>Find your price.</h2><p>Pick a category, explore the services, and book when you’re ready.</p></div>
        <div id="pricing-categories" class="pricing-categories" role="group" aria-label="Service category"></div>
        <div class="pricing-workspace">
          <div class="pricing-catalogue">
            <div class="pricing-toolbar"><div><h3 id="pricing-category-title">Aircon</h3><p id="pricing-result-count" aria-live="polite"></p></div><label class="pricing-search"><svg aria-hidden="true" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/></svg><input id="pricing-search" type="search" aria-label="Search services in the selected category" placeholder="Find a service"></label></div>
            <div id="pricing-unit-control" class="pricing-unit-control"><div><p class="pricing-unit-label">How many aircon units?</p><p>Prices below are for your selected number of units.</p></div><div id="pricing-units" class="pricing-units" role="group" aria-label="Number of aircon units"></div></div>
            <div id="pricing-list" class="pricing-list" aria-label="Available services"></div>
            <p class="pricing-currency-note">All prices are in Singapore dollars (SGD).</p>
          </div>
          <aside class="pricing-help"><span class="pricing-help-icon" aria-hidden="true">↗</span><p class="section-kicker">HERE TO HELP</p><h3>Not sure what<br>you need?</h3><p>Tell us what’s happening at home. Our team can help you choose the right service.</p><a href="<?php echo esc_url('https://wa.me/' . exa_phone()); ?>" target="_blank" rel="noopener noreferrer">Chat with our team <span aria-hidden="true">↗</span></a><div class="pricing-help-note"><span aria-hidden="true">✓</span><p>Choose your service.<br>Confirm the details with our team.</p></div></aside>
        </div>
      </section>



      <section id="testimonials" class="reviews-section">
        <div class="reviews-heading"><div><p class="section-kicker">CUSTOMER STORIES</p><h2>A little care.<br>A lasting difference.</h2></div><p>From everyday repairs to a home that feels new again. Here’s what our customers have to say.</p></div>
        <div class="reviews-grid"><article class="review-card"><div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“Exa provided excellent service for my apartment. Professional, punctual, and outstanding quality!”</blockquote><div class="review-person"><span class="review-avatar" aria-hidden="true">PS</span><div><p>Priya Sharma</p><span>Business Owner, Bangalore</span></div></div></article><article class="review-card"><div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“The deep cleaning team was incredibly thorough. My home feels brand new! Highly recommended.”</blockquote><div class="review-person"><span class="review-avatar" aria-hidden="true">RV</span><div><p>Rahul Verma</p><span>Homeowner, Mumbai</span></div></div></article><article class="review-card"><div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“Fast, reliable, and very affordable plumbing fix. They arrived within the hour!”</blockquote><div class="review-person"><span class="review-avatar" aria-hidden="true">AD</span><div><p>Anjali Desai</p><span>Architect, Delhi</span></div></div></article></div>
      </section>

      <section class="contact-feature" id="contact" aria-labelledby="contact-heading">
        <div class="contact-feature-copy"><p class="contact-availability"><span></span>24/7 AVAILABLE</p><h2 id="contact-heading">Home needs help?<br>We’re a call away.</h2><p>For urgent fixes and everyday maintenance, talk to our team and find the right service for your home.</p><div class="contact-feature-actions"><a class="contact-call" href="<?php echo esc_url('tel:+' . exa_phone()); ?>"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M7 3H4a1 1 0 0 0-1 1c0 9.4 7.6 17 17 17a1 1 0 0 0 1-1v-3l-5-2-2 2a14 14 0 0 1-7-7l2-2-2-5Z"/></svg>Call our team ↗</a><a class="contact-message" href="<?php echo esc_url('https://wa.me/' . exa_phone()); ?>" target="_blank" rel="noopener noreferrer">Chat on WhatsApp ↗</a></div><a class="contact-phone" href="<?php echo esc_url('tel:+' . exa_phone()); ?>"><?php echo esc_html('+' . exa_phone()); ?></a></div>
        <div class="contact-feature-image"><img loading="lazy" src="<?php echo esc_url(get_theme_file_uri('assets/images/services/generated/handyman-full-day.webp')); ?>" alt="Home maintenance professional preparing his tools"><span>Small fixes. Better living.</span></div>
      </section>

      <footer class="site-footer">
        <div class="footer-main">
          <div class="footer-brand"><a href="#hero" class="footer-logo" aria-label="Exa home"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/logo/logo-3.png')); ?>" alt="Exa M&E Pte Ltd"></a><p>Thoughtful care for<br>the place you call home.</p><span>Repairs, maintenance, and a fresh start.<br>All in one place.</span></div>
          <nav aria-label="Footer services"><h3>Our services</h3><a href="#sec-aircon">Aircon care</a><a href="#sec-cleaning">Home cleaning</a><a href="#sec-handyman">Handyman</a><a href="#sec-plumbing">Plumbing</a><a href="#sec-electrical">Electrical</a><a href="#sec-painting">Painting</a></nav>
          <nav aria-label="Footer navigation"><h3>Explore Exa</h3><a href="#hero">Home</a><a href="#services">Browse services</a><a href="#pricing">Service prices</a><a href="#testimonials">Customer stories</a></nav>
          <div class="footer-contact"><h3>Let’s talk</h3><p>Tell us what your home needs.</p><a href="<?php echo esc_url('tel:+' . exa_phone()); ?>" class="footer-phone"><?php echo esc_html('+' . exa_phone()); ?></a><a href="<?php echo esc_url('https://wa.me/' . exa_phone()); ?>" class="footer-chat" target="_blank" rel="noopener noreferrer">Message our team <span aria-hidden="true">↗</span></a></div>
        </div>
        <div class="footer-bottom"><p>© <span id="current-year"></span> Exa Home Services. All rights reserved.</p><a href="#hero">Back to top ↑</a></div>
      </footer>


    </main>

    
    

    
    <div class="floating-actions fixed z-[60] flex flex-col gap-3">
      
      <a href="<?php echo esc_url('https://wa.me/' . exa_phone()); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp"
        class="w-12 h-12 rounded-full flex items-center justify-center glass-btn text-[#25D366] transition-transform active:scale-95">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
        </svg>
      </a>
      
      <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"
        class="w-12 h-12 rounded-full flex items-center justify-center glass-btn text-[#E1306C] transition-transform active:scale-95">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
        </svg>
      </a>
      
      <button aria-label="Back to top" onclick="window.scrollTo({top:0, behavior:'smooth'})"
        class="w-12 h-12 rounded-full flex items-center justify-center glass-btn text-[#4E0636] transition-transform active:scale-95">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    </div>

    
    <div id="svc-popup-overlay" onclick="closePopup()"></div>
    <div id="svc-popup" role="dialog" aria-modal="true">
      <div class="popup-handle"></div>
      <div class="popup-header">
        <h3 id="popup-title" class="font-serif text-[17px] text-[#4E0636] font-bold"></h3>
        <button onclick="closePopup()" class="w-8 h-8 rounded-full flex items-center justify-center"
          style="background:rgba(78,6,54,.08)">
          <svg class="w-4 h-4 text-[#4E0636]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="popup-body" id="popup-body"></div>
    </div>

    
    <div id="mobile-menu"
      class="fixed inset-0 bg-[#4E0636]/95 backdrop-blur-md z-[100] opacity-0 pointer-events-none transition-opacity duration-300 flex flex-col items-center pt-6 px-6">
      <div class="w-full max-w-[420px] flex justify-end mb-10 relative z-[110]">
        <button onclick="toggleMenu()" class="text-white/80 hover:text-white p-2" aria-label="Close Menu">
          <svg class="w-8 h-8 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex flex-col items-center gap-8 text-2xl font-serif text-white w-full max-w-[420px]">
        <a href="#hero" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Home</a>
        <a href="#services" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Top Services</a>
        <a href="#trending" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Trending</a>
        <a href="#premium" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Premium Picks</a>
        <a href="#quickfix" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Quick Fixes</a>
        <a href="#pricing" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Service Prices</a>
        <a href="#testimonials" onclick="toggleMenu()" class="hover:text-[#E297B3] transition-colors">Reviews</a>
      </div>

      <div class="mt-auto mb-12 w-full max-w-[420px] flex flex-col items-center">
        <p class="text-[#E297B3] text-sm font-bold uppercase tracking-widest mb-4">Contact Us</p>
        <a href="<?php echo esc_url('tel:+' . exa_phone()); ?>"
          class="flex items-center gap-3 text-white text-lg mb-4 hover:text-[#E297B3] transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
          <?php echo esc_html('+' . exa_phone()); ?>
        </a>
        <a href="<?php echo esc_url('https://wa.me/' . exa_phone()); ?>" target="_blank"
          class="flex items-center gap-3 text-white text-lg hover:text-[#E297B3] transition-colors">
          <svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
          </svg>
          WhatsApp
        </a>
      </div>
    </div>

  </div>

  
<?php get_footer(); ?>
