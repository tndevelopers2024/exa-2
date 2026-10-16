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
        <a href="#sec-aircon">Aircon</a><a href="#sec-cleaning">Cleaning</a><a href="#sec-handyman">Handyman</a><a href="#pricing">Plumbing</a><a href="#pricing">Electrical</a><a href="#pricing">Painting</a>
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

      
      <section id="sec-pest" class="mt-6 fade-up" style="animation-delay:.22s">
        <div class="flex items-center justify-between px-4 mb-3">
          <h2 class="font-serif text-[17px] text-[#4E0636]"> Pest Control</h2>
          
        </div>
        <div class="swiper pest-swiper pb-4">
          <div id="row-pest" class="swiper-wrapper"></div>
        </div>
      </section>


      
      



      <section id="pricing" class="mt-6 mx-4 mb-6">
        <h2 class="font-serif text-[20px] text-[#4E0636]">Service prices</h2>
        <p class="pricing-note">Browse services and select a price to request a booking. <?php if (!get_option('exa_currency')) : ?>Currency is to be confirmed.<?php endif; ?></p>
        <div id="price-groups"></div>
      </section>

      
      <section id="testimonials" class="mt-4 mx-4 mb-2 rounded-3xl overflow-hidden fade-up relative"
        style="animation-delay:.35s; background: linear-gradient(135deg,#4E0636,#5c0740)">
        <div class="swiper testimonials-swiper">
          <div class="swiper-wrapper">
            
            <div class="swiper-slide pt-5 px-5 pb-8">
              <p class="text-[#E297B3] text-[10px] font-bold uppercase tracking-widest mb-1">What Clients Say</p>
              <p class="font-serif text-white text-sm italic leading-snug">"Exa provided excellent service for my
                apartment. Professional, punctual, and outstanding quality!"</p>
              <div class="flex items-center gap-2 mt-3">
                <img src="https://plus.unsplash.com/premium_photo-1682089846950-974c7c7d5e91?fm=jpg&q=60&w=200"
                  alt="Testimonial Author" class="w-8 h-8 rounded-full object-cover border-2 border-[#BC6587]" />
                <div>
                  <p class="text-white font-semibold text-xs">Priya Sharma</p>
                  <p class="text-white/50 text-[10px]">Business Owner, Bangalore</p>
                </div>
                <div class="ml-auto flex gap-0.5">
                  <span class="text-[#E297B3] text-xs">★★★★★</span>
                </div>
              </div>
            </div>
            
            <div class="swiper-slide pt-5 px-5 pb-8">
              <p class="text-[#E297B3] text-[10px] font-bold uppercase tracking-widest mb-1">What Clients Say</p>
              <p class="font-serif text-white text-sm italic leading-snug">"The deep cleaning team was incredibly
                thorough. My home feels brand new! Highly recommended."</p>
              <div class="flex items-center gap-2 mt-3">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?fm=jpg&q=60&w=200"
                  alt="Testimonial Author" class="w-8 h-8 rounded-full object-cover border-2 border-[#BC6587]" />
                <div>
                  <p class="text-white font-semibold text-xs">Rahul Verma</p>
                  <p class="text-white/50 text-[10px]">Homeowner, Mumbai</p>
                </div>
                <div class="ml-auto flex gap-0.5">
                  <span class="text-[#E297B3] text-xs">★★★★★</span>
                </div>
              </div>
            </div>
            
            <div class="swiper-slide pt-5 px-5 pb-8">
              <p class="text-[#E297B3] text-[10px] font-bold uppercase tracking-widest mb-1">What Clients Say</p>
              <p class="font-serif text-white text-sm italic leading-snug">"Fast, reliable, and very affordable plumbing
                fix. They arrived within the hour!"</p>
              <div class="flex items-center gap-2 mt-3">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?fm=jpg&q=60&w=200"
                  alt="Testimonial Author" class="w-8 h-8 rounded-full object-cover border-2 border-[#BC6587]" />
                <div>
                  <p class="text-white font-semibold text-xs">Anjali Desai</p>
                  <p class="text-white/50 text-[10px]">Architect, Delhi</p>
                </div>
                <div class="ml-auto flex gap-0.5">
                  <span class="text-[#E297B3] text-xs">★★★★★</span>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination testimonials-pagination !bottom-2"></div>
        </div>
      </section>

      
      <div class="emergency-section mx-4 mt-4 mb-6 fade-up" style="animation-delay:.4s">
        <div class="emergency-panel rounded-3xl p-5 relative overflow-hidden">
          <div class="absolute -right-8 -top-8 w-36 h-36 rounded-full" style="background:rgba(188,101,135,.15)"></div>
          <p class="emergency-eyebrow text-[10px] font-bold uppercase tracking-widest mb-1 relative z-10">24/7 Available
          </p>
          <h3 class="font-serif text-black text-lg leading-tight relative z-10">Need Emergency<br />Home Service?</h3>
          <p class="emergency-description text-xs mt-1 mb-3 relative z-10">Our experts are ready round the clock</p>
          <a href="<?php echo esc_url('tel:+' . exa_phone()); ?>"
            class="gold-badge text-[#4E0636] text-xs font-bold px-5 py-2.5 rounded-xl relative z-10">Call Now: <?php echo esc_html('+' . exa_phone()); ?></a>
        </div>
      </div>

      
      <footer class="mt-8 px-6 pb-24 pt-10 bg-[#4E0636] rounded-t-[40px] text-center flex flex-col items-center">
        <h3 class="font-serif text-3xl text-[#E297B3] mb-2 tracking-wide">Exa</h3>
        <p class="text-white/60 text-xs mb-8 max-w-[250px] leading-relaxed">Premium Home Services Delivered with
          Excellence.</p>

        <div class="flex gap-6 mb-8">
          <a href="#hero" class="text-white/80 hover:text-[#E297B3] text-sm font-medium transition-colors">Home</a>
          <a href="#services"
            class="text-white/80 hover:text-[#E297B3] text-sm font-medium transition-colors">Services</a>
          <a href="#testimonials"
            class="text-white/80 hover:text-[#E297B3] text-sm font-medium transition-colors">Reviews</a>
        </div>

        <div class="flex gap-4 mb-8">
          
          <a href="#"
            class="w-10 h-10 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-white/80 hover:bg-white/20 hover:text-white transition-all">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
            </svg>
          </a>
          
          <a href="#"
            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white/80 hover:bg-white/20 hover:text-white transition-all">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>
        </div>

        <div class="w-full h-px bg-white/10 mb-6"></div>

        <p class="text-white/40 text-[11px] font-medium tracking-wide">© <span id="current-year"></span> Exa Home
          Services. All rights reserved.</p>
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
