// Toggle mobile menu
const navToggle = document.querySelector('#navToggle');
const navLinks = document.querySelector('#navLinks');

if (navToggle) {
  navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });
}

// Simple smooth scroll for anchor links
const anchors = document.querySelectorAll('a[href^="#"]');
anchors.forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const targetId = this.getAttribute('href').substring(1);
    const target = document.getElementById(targetId);
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// Auto-scroll partner slider (simple continuous scroll)
const slider = document.querySelector('.partner-slider');
if (slider) {
  let scrollAmount = 0;
  setInterval(() => {
    if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
      scrollAmount = 0;
    } else {
      scrollAmount += 1;
    }
    slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
  }, 30);
}
