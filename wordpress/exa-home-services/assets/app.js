const servicePricing = exaSettings.pricing;
const formatPrice = price => [exaSettings.currency, price.toLocaleString('en')].filter(Boolean).join(' ');

    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      const scrollContainer = document.getElementById('main-scroll');
      if (menu.classList.contains('opacity-0')) {
        menu.classList.remove('opacity-0', 'pointer-events-none');
        menu.classList.add('opacity-100', 'pointer-events-auto');
        if (scrollContainer) scrollContainer.style.overflow = 'hidden';
      } else {
        menu.classList.add('opacity-0', 'pointer-events-none');
        menu.classList.remove('opacity-100', 'pointer-events-auto');
        if (scrollContainer) scrollContainer.style.overflow = '';
      }
    }
    const PHONE = exaSettings.phone;
    const openWA = (name) => {
      const msg = encodeURIComponent(`Hi, I want to book ${name}`);
      window.open(`https://wa.me/${PHONE}?text=${msg}`, '_blank');
    };

    function setNav(id) {
      ['home', 'search', 'orders', 'profile'].forEach(n => {
        const el = document.getElementById('nav-' + n);
        if (el) {
          el.classList.remove('nav-active');
          el.classList.add('text-gray-400');
        }
      });
      const active = document.getElementById('nav-' + id);
      if (active) {
        active.classList.add('nav-active');
        active.classList.remove('text-gray-400');
      }
    }

    // ── Data ──
    // ── Categories ──
    const ICONS = {
      aircon: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="9" rx="2"/><path d="M6 16v3M12 16v3M18 16v3M6 11h12M10 11V9M12 11V8M14 11V9"/></svg>`,
      cleaning: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21l7-7m6-11l5 5-9.5 9.5-5-5L17 3z"/><path d="M10 14l-4 4"/><path d="M18 8l-2-2"/></svg>`,
      handyman: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>`,
      packers: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>`,
      dehumidifier: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z"/><path d="M9.5 14.5h5M9.5 17.5h3"/></svg>`,
      pest: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20c-3.3 0-6-2.7-6-6v-3a6 6 0 0112 0v3c0 3.3-2.7 6-6 6z"/><path d="M6 13H2M22 13h-4M6 17l-2 2M18 17l2 2M6 9l-2-2M18 9l2-2M10 7a2 2 0 004 0"/></svg>`,
      appliance: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="2" width="18" height="20" rx="2"/><circle cx="12" cy="13" r="4"/><path d="M7 6h.01M11 6h3"/></svg>`,
      construction: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20h20M4 20V10M20 20V10M4 10l8-8 8 8M10 20v-5h4v5"/></svg>`,
      gardening: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22V12M12 12C12 7 7 4 3 5c1 4 4 7 9 7zM12 12c0-5 5-8 9-7-1 4-4 7-9 7z"/></svg>`,
      renovation: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 17h20M6 17V9M18 17V9M10 17v-4h4v4M6 9l6-6 6 6"/><circle cx="19" cy="5" r="2"/><path d="M19 7v10"/></svg>`,
      pool: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c1.5 2 3.5 2 5 0s3.5-2 5 0 3.5 2 5 0M2 17c1.5 2 3.5 2 5 0s3.5-2 5 0 3.5 2 5 0"/><circle cx="12" cy="4" r="2"/><path d="M12 6v5M9 8l3 3 3-3"/></svg>`,
      petcare: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="4.5" cy="7" r="2"/><circle cx="9" cy="4" r="2"/><circle cx="15" cy="4" r="2"/><circle cx="19.5" cy="7" r="2"/><path d="M12 22c-3.9 0-7-3.1-7-7 0-1.5 1.1-3 2.8-3.5L12 10l4.2 1.5C17.9 12 19 13.5 19 15c0 3.9-3.1 7-7 7z"/></svg>`,
      personalcare: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l2 7H4L6 3zM4 10c0 4.4 3.6 8 8 8s8-3.6 8-8"/><path d="M10 15l2 2 2-2"/></svg>`,
      babysitter: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="6" r="3"/><path d="M9 12H8a2 2 0 00-2 2v6h12v-6a2 2 0 00-2-2h-1M9 12v8M15 12v8"/><path d="M12 9v3"/></svg>`,
      eldercare: `<svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="5" r="3"/><path d="M9 10h6M12 10v5M10 22l-1-7M14 22l1-7"/><path d="M8 14l-1 3M16 14l1 3M14 16l3 6M10 16l-3 6"/></svg>`,
    };

    // ── Categories ──
    const categories = [
      { id: 'aircon', name: 'Aircon' },
      { id: 'cleaning', name: 'Cleaning' },
      { id: 'handyman', name: 'Handyman' },
      { id: 'packers', name: 'Packers &\nMovers' },
      { id: 'dehumidifier', name: 'Dehumidifier' },
      { id: 'pest', name: 'Pest Control' },
      { id: 'appliance', name: 'Appliance &\nRepairs' },
      { id: 'construction', name: 'Minor\nConstructions' },
      { id: 'gardening', name: 'Gardening' },
      { id: 'renovation', name: 'Interior\nRenovation' },
      { id: 'pool', name: 'Swimming Pool\nMaint.' },
      { id: 'petcare', name: 'Pet Care' },
      { id: 'personalcare', name: 'Personal Care' },
      { id: 'babysitter', name: 'Baby Sitter' },
      { id: 'eldercare', name: 'Elder Care' },
    ];

    // ── All Services (categorised) ──
    const allServices = [
      { cat: 'aircon', name: 'Aircon Service', sub: 'Install & Repair', img: `${exaSettings.assets}images/services/Category Aircon.jpg`, badge: '⭐ 4.8', time: 'Same Day', offer: '20% OFF' },
      { cat: 'aircon', name: 'AC Deep Clean', sub: 'Full Servicing', img: `${exaSettings.assets}images/services/Category Aircon.jpg`, badge: '⭐ 4.7', time: '2 hrs', offer: '15% OFF' },
      { cat: 'aircon', name: 'AC Gas Refill', sub: 'All Brands', img: `${exaSettings.assets}images/services/Category Aircon.jpg`, badge: '⭐ 4.6', time: '1 hr', offer: '₹799' },
      { cat: 'cleaning', name: 'Deep Cleaning', sub: 'Full Home Clean', img: `${exaSettings.assets}images/services/generated/deep-cleaning.webp`, badge: '⭐ 4.8', time: '3 hrs', offer: 'FLAT ₹999' },
      { cat: 'cleaning', name: 'Kitchen Cleaning', sub: 'Degreasing & Scrub', img: `${exaSettings.assets}images/services/generated/kitchen-cleaning.webp`, badge: '⭐ 4.7', time: '2 hrs', offer: '₹499' },
      { cat: 'cleaning', name: 'Bathroom Clean', sub: 'Deep Sanitisation', img: `${exaSettings.assets}images/services/generated/bathroom-cleaning.webp`, badge: '⭐ 4.8', time: '1 hr', offer: '₹299' },
      { cat: 'cleaning', name: 'Sofa Cleaning', sub: 'Dry & Wet Cleaning', img: `${exaSettings.assets}images/services/generated/sofa-cleaning.webp`, badge: '⭐ 4.6', time: '2 hrs', offer: '20% OFF' },
      { cat: 'handyman', name: 'Handyman', sub: 'General Fixes', img: `${exaSettings.assets}images/services/Category Handyman.jpg`, badge: '⭐ 4.7', time: '2 hrs', offer: 'FREE Visit' },
      { cat: 'handyman', name: 'Wall Drilling', sub: 'Mounting & Fixing', img: `${exaSettings.assets}images/services/Category Handyman.jpg`, badge: '⭐ 4.6', time: '1 hr', offer: '₹199' },
      { cat: 'handyman', name: 'Furniture Assem.', sub: 'Assembly & Setup', img: `${exaSettings.assets}images/services/Category Handyman.jpg`, badge: '⭐ 4.7', time: '2 hrs', offer: '₹399' },
      { cat: 'packers', name: 'Home Relocation', sub: 'Full Shifting', img: `${exaSettings.assets}images/services/Category Packers & movers.jpg`, badge: '⭐ 4.8', time: 'Schedule', offer: 'ASSURED' },
      { cat: 'packers', name: 'Office Shifting', sub: 'Corporate Move', img: `${exaSettings.assets}images/services/Category Packers & movers.jpg`, badge: '⭐ 4.7', time: 'Schedule', offer: '25% OFF' },
      { cat: 'packers', name: 'Loading & Unloading', sub: 'Labour Support', img: `${exaSettings.assets}images/services/Category Packers & movers.jpg`, badge: '⭐ 4.6', time: 'Schedule', offer: '₹999' },
      { cat: 'dehumidifier', name: 'Dehumidifier Install', sub: 'Moisture Control', img: `${exaSettings.assets}images/services/Category Dehumidifier.jpg`, badge: '⭐ 4.7', time: 'Today', offer: 'PREMIUM' },
      { cat: 'dehumidifier', name: 'Dehumidifier Service', sub: 'Maintenance & Repair', img: `${exaSettings.assets}images/services/Category Dehumidifier.jpg`, badge: '⭐ 4.6', time: 'Today', offer: '10% OFF' },
      { cat: 'pest', name: 'Pest Control', sub: 'Safe & Effective', img: `${exaSettings.assets}images/services/generated/pest-general.webp`, badge: '⭐ 4.6', time: '2 hrs', offer: '50% OFF' },
      { cat: 'pest', name: 'Termite Treatment', sub: 'Deep Protection', img: `${exaSettings.assets}images/services/generated/pest-termite.webp`, badge: '⭐ 4.7', time: '3 hrs', offer: '₹1299' },
      { cat: 'pest', name: 'Cockroach Control', sub: 'Kitchen & Bathroom', img: `${exaSettings.assets}images/services/generated/pest-cockroach.webp`, badge: '⭐ 4.5', time: '1 hr', offer: '₹499' },
      { cat: 'pest', name: 'Bed Bug Control', sub: 'Full Room Treatment', img: `${exaSettings.assets}images/services/generated/pest-bedbug.webp`, badge: '⭐ 4.6', time: '2 hrs', offer: '₹799' },
      { cat: 'appliance', name: 'Appliance Repair', sub: 'All Brands', img: `${exaSettings.assets}images/services/Category Appliance repair.jpg`, badge: '⭐ 4.6', time: '3 hrs', offer: 'Free Diag.' },
      { cat: 'appliance', name: 'Washing Machine', sub: 'Repair & Service', img: `${exaSettings.assets}images/services/Category Appliance repair.jpg`, badge: '⭐ 4.7', time: '2 hrs', offer: '₹299 Fix' },
      { cat: 'appliance', name: 'Refrigerator Fix', sub: 'Repair & Gas Fill', img: `${exaSettings.assets}images/services/Category Appliance repair.jpg`, badge: '⭐ 4.5', time: '2 hrs', offer: '₹349' },
      { cat: 'appliance', name: 'Microwave Repair', sub: 'All Models', img: `${exaSettings.assets}images/services/Category Appliance repair.jpg`, badge: '⭐ 4.6', time: '1 hr', offer: '₹199' },
      { cat: 'construction', name: 'Minor Construction', sub: 'Repairs & Builds', img: `${exaSettings.assets}images/services/Category Minor construction.jpg`, badge: '⭐ 4.5', time: 'Quote', offer: '10% OFF' },
      { cat: 'construction', name: 'Wall Repair', sub: 'Cracks & Patchwork', img: `${exaSettings.assets}images/services/Category Minor construction.jpg`, badge: '⭐ 4.6', time: '2 hrs', offer: '₹499' },
      { cat: 'construction', name: 'Tile Fixing', sub: 'Floor & Wall Tiles', img: `${exaSettings.assets}images/services/Category Minor construction.jpg`, badge: '⭐ 4.5', time: '3 hrs', offer: '₹699' },
      { cat: 'gardening', name: 'Gardening', sub: 'Lawn & Landscape', img: `${exaSettings.assets}images/services/Category Gardening.jpg`, badge: '⭐ 4.8', time: '2 hrs', offer: '₹499 Flat' },
      { cat: 'gardening', name: 'Lawn Mowing', sub: 'Regular Trim', img: `${exaSettings.assets}images/services/Category Gardening.jpg`, badge: '⭐ 4.7', time: '1 hr', offer: '₹299' },
      { cat: 'gardening', name: 'Tree Trimming', sub: 'Branch Cutting', img: `${exaSettings.assets}images/services/Category Gardening.jpg`, badge: '⭐ 4.6', time: '2 hrs', offer: '₹599' },
      { cat: 'renovation', name: 'Full Renovation', sub: 'Interior Makeover', img: `${exaSettings.assets}images/services/Category Interior renovation.jpg`, badge: '⭐ 4.9', time: 'Quote', offer: '25% OFF' },
      { cat: 'renovation', name: 'Interior Painting', sub: 'Walls & Ceiling', img: `${exaSettings.assets}images/services/Category Interior renovation.jpg`, badge: '⭐ 4.8', time: 'Quote', offer: '₹8/sqft' },
      { cat: 'renovation', name: 'Carpentry Works', sub: 'Custom Woodwork', img: `${exaSettings.assets}images/services/Category Interior renovation.jpg`, badge: '⭐ 4.7', time: 'Quote', offer: '10% OFF' },
      { cat: 'pool', name: 'Pool Maintenance', sub: 'Cleaning & Repair', img: `${exaSettings.assets}images/services/Category Swimming pool maintenance .jpg`, badge: '⭐ 4.4', time: 'Same Day', offer: '15% OFF' },
      { cat: 'pool', name: 'Pool Construction', sub: 'New Build', img: `${exaSettings.assets}images/services/Category Swimming pool maintenance .jpg`, badge: '⭐ 4.5', time: 'Quote', offer: 'Get Quote' },
      { cat: 'pool', name: 'Pool Chemical Care', sub: 'Water Treatment', img: `${exaSettings.assets}images/services/Category Swimming pool maintenance .jpg`, badge: '⭐ 4.6', time: '1 hr', offer: '₹999' },
      { cat: 'petcare', name: 'Pet Care', sub: 'Walking & Grooming', img: `${exaSettings.assets}images/services/Category Pet care.jpg`, badge: '⭐ 4.7', time: 'Today', offer: 'LOVING' },
      { cat: 'petcare', name: 'Pet Grooming', sub: 'Bath & Trim', img: `${exaSettings.assets}images/services/Category Pet care.jpg`, badge: '⭐ 4.8', time: '2 hrs', offer: '₹499' },
      { cat: 'petcare', name: 'Dog Walking', sub: 'Daily Walks', img: `${exaSettings.assets}images/services/Category Pet care.jpg`, badge: '⭐ 4.7', time: '1 hr', offer: '₹199' },
      { cat: 'personalcare', name: 'Personal Care', sub: 'At Home Service', img: `${exaSettings.assets}images/services/Category Personal care.jpg`, badge: '⭐ 4.8', time: 'Schedule', offer: 'ELITE' },
      { cat: 'personalcare', name: 'Home Salon', sub: 'Beauty at Home', img: `${exaSettings.assets}images/services/Category Personal care.jpg`, badge: '⭐ 4.8', time: '2 hrs', offer: '20% OFF' },
      { cat: 'personalcare', name: 'Massage Therapy', sub: 'Relaxation at Home', img: `${exaSettings.assets}images/services/Category Personal care.jpg`, badge: '⭐ 4.7', time: '1 hr', offer: '₹699' },
      { cat: 'babysitter', name: 'Babysitting', sub: 'Safe & Caring', img: `${exaSettings.assets}images/services/Category Baby sitter.jpg`, badge: '⭐ 4.8', time: 'Schedule', offer: 'TRUSTED' },
      { cat: 'babysitter', name: 'Day Care', sub: 'Full Day Support', img: `${exaSettings.assets}images/services/Category Baby sitter.jpg`, badge: '⭐ 4.7', time: 'Schedule', offer: '₹999/day' },
      { cat: 'eldercare', name: 'Elder Care', sub: 'Professional Support', img: `${exaSettings.assets}images/services/Category Elder care.jpg`, badge: '⭐ 4.9', time: 'Schedule', offer: 'PREMIUM' },
      { cat: 'eldercare', name: 'Medical Escort', sub: 'Hospital Visits', img: `${exaSettings.assets}images/services/Category Elder care.jpg`, badge: '⭐ 4.8', time: 'Schedule', offer: '₹499' },
      { cat: 'eldercare', name: 'Daily Assistance', sub: 'Home Care', img: `${exaSettings.assets}images/services/Category Elder care.jpg`, badge: '⭐ 4.7', time: 'Schedule', offer: '₹799/day' },
    ];

    function servicePhoto(name, category) {
      if (category === 'aircon') {
        if (/Installation/i.test(name)) return 'aircon-installation';
        if (/Overhaul/i.test(name)) return 'aircon-overhaul';
        if (/Gas/i.test(name)) return 'aircon-gas';
        if (/CU Cleaning/i.test(name)) return 'aircon-condenser';
      }
      if (/furniture/i.test(name)) return 'furniture-assembly';
      if (/TV Brackets|Shelves|Mirrors|Curtain rod/i.test(name)) return 'wall-mounting';
      if (category === 'plumbing' || /Plumbing|Water Heater|Bathroom|sealant/i.test(name)) return 'plumbing';
      if (category === 'electrical' || /Electrical|Lighting|fan|CCTV/i.test(name)) return 'electrical';
      if (category === 'painting' || /painting|Tile and grout/i.test(name)) return 'painting';
      return null;
    }

    // Replace the sample cards with the supplied service catalogue.
    allServices.splice(0, allServices.length, ...allServices.filter(s => !['aircon', 'handyman'].includes(s.cat)));
    servicePricing.forEach(group => group.services.forEach(service => {
      const price = service.prices[0];
      const photo = servicePhoto(service.name, group.id);
      allServices.push({ cat: group.id, name: service.name, sub: service.section || group.name,
        img: photo ? `${exaSettings.assets}images/services/generated/${photo}.webp` : `${exaSettings.assets}images/services/Category ${group.id === 'aircon' ? 'Aircon' : 'Handyman'}.jpg`,
        badge: '', time: 'Request booking', offer: price === null ? 'Request quote' : `Price: ${formatPrice(price)}`,
        pricing: service });
    }));

    // Default top picks (one from each major category)
    const defaultServices = allServices.filter(s =>
      ['aircon', 'cleaning', 'handyman', 'pest', 'appliance', 'gardening', 'renovation', 'pool'].includes(s.cat)
    ).filter((s, i, arr) => arr.findIndex(x => x.cat === s.cat) === i);




    // ── Render horizontal service card ──
    function serviceCard(item, isPremium = false) {
      const div = document.createElement('div');
      div.className = `swiper-slide w-[136px] lift cursor-pointer`;
      const rating = item.badge.replace('⭐ ', '');

      div.innerHTML = `
      <div class="relative w-full h-43 rounded-2xl overflow-hidden shadow-sm">
        <img loading="lazy" decoding="async" src="${item.img}" alt="${item.name}" class="w-full h-full object-contain"/>
        
        <!-- Top Right Heart -->
        <button class="absolute top-2 right-2 text-white/90 transition-transform">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
        </button>

        <!-- Bottom Offer Text -->
        <div class="absolute bottom-2 left-2 right-2">
          <p class="text-white text-[13px] font-bold leading-tight" style="text-shadow: 0 1px 2px rgba(0,0,0,0.5)">${item.offer}</p>
        </div>
      </div>
      <div class="pt-2.5 px-0.5">
        <h3 class="font-serif text-[15px] font-bold text-[#1a1a2e] leading-tight truncate">${item.name}</h3>
        <div class="flex items-center gap-1 mt-1">
          <div class="w-4 h-4 rounded-full bg-green-700 flex items-center justify-center text-white text-[9px]">★</div>
          <span class="text-[12px] font-bold text-[#1a1a2e]">${item.pricing ? item.offer : `${rating} • ${item.time}`}</span>
        </div>
        <p class="text-[12px] text-gray-500 truncate mt-0.5">${item.sub}</p>
      </div>`;
      div.addEventListener('click', () => {
        if (item.pricing) {
          document.getElementById('pricing').scrollIntoView({ behavior: 'smooth' });
          document.querySelectorAll('.price-group').forEach((group, index) => { group.open = servicePricing[index].id === item.cat; });
        } else openWA(item.name);
      });
      return div;
    }






    function openPopup(title, services) {
      document.getElementById('popup-title').textContent = title;
      const body = document.getElementById('popup-body');
      body.innerHTML = '';
      services.forEach(s => {
        const rating = s.badge.replace('\u2b50 ', '');
        const row = document.createElement('div');
        row.className = 'svc-row';
        row.innerHTML = `
        <img class="svc-row-img" src="${s.img}" alt="${s.name}"/>
        <div style="flex:1;min-width:0">
          <p style="font-weight:700;font-size:14px;color:#1a1a2e;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${s.name}</p>
          <p style="font-size:11.5px;color:#888;margin-top:2px">${s.sub}</p>
          <div style="display:flex;align-items:center;gap:4px;margin-top:4px">
            <span style="background:#2e7d5e;color:#fff;font-size:9px;font-weight:700;padding:2px 5px;border-radius:20px">&#9733; ${rating}</span>
            <span style="font-size:11px;color:#BC6587;font-weight:700">${s.offer}</span>
            <span style="font-size:10px;color:#aaa;margin-left:2px">&bull; ${s.time}</span>
          </div>
        </div>
        <button class="svc-row-book" onclick="event.stopPropagation();openWA('${s.name}')">Book</button>`;
        row.addEventListener('click', () => openWA(s.name));
        body.appendChild(row);
      });
      document.getElementById('svc-popup-overlay').classList.add('open');
      document.getElementById('svc-popup').classList.add('open');
      document.getElementById('main-scroll').style.overflow = 'hidden';
    }

    function closePopup() {
      document.getElementById('svc-popup-overlay').classList.remove('open');
      document.getElementById('svc-popup').classList.remove('open');
      document.querySelectorAll('.cat-item').forEach(i => i.classList.remove('active'));
      document.getElementById('main-scroll').style.overflow = '';
    }

    // ── Swiper config helper ──
    const swiperOpts = {
      enabled: !window.matchMedia('(min-width: 900px)').matches,
      slidesPerView: 'auto',
      spaceBetween: 14,
      freeMode: true,
      slidesOffsetBefore: 16,
      slidesOffsetAfter: 16,
      breakpoints: { 900: { enabled: false, slidesOffsetBefore: 0, slidesOffsetAfter: 0, spaceBetween: 0 } },
    };

    // ── Category card renderer (for per-category sections) ──
    function catServiceCard(item, accentColor) {
      const rating = item.badge.replace('⭐ ', '');
      const div = document.createElement('div');
      div.className = 'swiper-slide cat-section-slide lift';
      div.style.width = '150px';
      div.innerHTML = `
        <div style="overflow:hidden">
          <img loading="lazy" decoding="async" class="cat-slide-img" src="${item.img}" alt="${item.name}" />
        </div>
        <div class="cat-slide-body">
          <p class="cat-slide-title">${item.name}</p>
          <p class="cat-slide-sub">${item.sub}</p>
          <div class="cat-slide-rating" style="margin-top:6px">
            <span class="star-dot">★</span>
            <span>${item.pricing ? item.offer : `${rating} · ${item.time}`}</span>
          </div>
        </div>`;
      div.addEventListener('click', () => {
        if (item.pricing) {
          document.getElementById('pricing').scrollIntoView({ behavior: 'smooth' });
          document.querySelectorAll('.price-group').forEach((group, index) => { group.open = servicePricing[index].id === item.cat; });
        } else openWA(item.name);
      });
      return div;
    }

    // ── Helper: get services by category ──
    function getServicesByCat(catId) {
      return allServices.filter(s => s.cat === catId);
    }

    // ── Top Services row (default picks) ──
    function loadServiceSwiper(services) {
      const wrapper = document.getElementById('row1');
      wrapper.innerHTML = '';
      services.forEach(s => wrapper.appendChild(serviceCard(s)));
      new Swiper('.services-swiper', swiperOpts);
    }

    // ── Load each category section ──
    function loadCatSection(rowId, swiperClass, catId, accentColor) {
      const wrapper = document.getElementById(rowId);
      if (!wrapper) return;
      wrapper.innerHTML = '';
      getServicesByCat(catId).forEach(s => wrapper.appendChild(catServiceCard(s, accentColor)));
      new Swiper('.' + swiperClass, swiperOpts);
    }

    servicePricing.forEach((group, index) => {
      const details = document.createElement('details');
      details.className = 'price-group';
      details.open = index === 0;
      details.innerHTML = `<summary>${group.name} · ${group.services.length} services</summary>
        <div class="price-table-scroll" role="region" aria-label="${group.name} prices" tabindex="0">
          <table class="price-table"><caption class="sr-only">${group.name} service prices</caption><thead><tr><th scope="col">Service</th>
          ${group.id === 'aircon' ? [1,2,3,4,5].map(n => `<th scope="col">${n} ${n === 1 ? 'unit' : 'units'}</th>`).join('') : '<th scope="col">Price</th>'}
          </tr></thead><tbody></tbody></table></div>`;
      const body = details.querySelector('tbody');
      let section = '';
      group.services.forEach(service => {
        if (service.section && service.section !== section) {
          section = service.section;
          const heading = body.insertRow();
          heading.className = 'price-subheading';
          heading.innerHTML = `<th colspan="2" scope="rowgroup">${section}</th>`;
        }
        const row = body.insertRow();
        const label = document.createElement('th');
        label.scope = 'row';
        label.textContent = service.name;
        row.appendChild(label);
        service.prices.forEach((price, unitIndex) => {
          const cell = row.insertCell();
          const button = document.createElement('button');
          button.type = 'button';
          button.textContent = price === null ? 'Request quote' : formatPrice(price);
          const units = group.id === 'aircon' ? ` (${unitIndex + 1} ${unitIndex === 0 ? 'unit' : 'units'})` : '';
          button.setAttribute('aria-label', `${service.name}${units}: ${button.textContent}`);
          button.addEventListener('click', () => openWA(`${service.name}${units}${price === null ? ' — please provide a quote' : ` — listed price ${price}`}`));
          cell.appendChild(button);
        });
      });
      document.getElementById('price-groups').appendChild(details);
    });

    loadServiceSwiper(defaultServices);

    // ── Init per-category sections ──
    loadCatSection('row-aircon',   'aircon-swiper',   'aircon',   '#0284c7');
    loadCatSection('row-cleaning', 'cleaning-swiper', 'cleaning', '#059669');
    loadCatSection('row-handyman', 'handyman-swiper', 'handyman', '#d97706');
    loadCatSection('row-pest',     'pest-swiper',     'pest',     '#7c3aed');
    loadCatSection('row-plumbing', 'plumbing-swiper', 'plumbing', '#0284c7');
    loadCatSection('row-electrical', 'electrical-swiper', 'electrical', '#d97706');
    loadCatSection('row-painting', 'painting-swiper', 'painting', '#BC6587');

    // ── Init Hero Swiper ──
    const swiper = new Swiper('.hero-swiper', {
      loop: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
    });

    const testimonialsSwiper = new Swiper('.testimonials-swiper', {
      loop: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.testimonials-pagination',
        clickable: true,
      },
    });

    // ── Dynamic Footer Year ──
    document.getElementById('current-year').textContent = new Date().getFullYear();
  