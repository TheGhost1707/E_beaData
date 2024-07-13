document.addEventListener('DOMContentLoaded', function() {
    const menuTrigger = document.querySelector('.menu-trigger');
    const nav = document.querySelector('.main-nav .nav');
  
    menuTrigger.addEventListener('click', function() {
      this.classList.toggle('active');
      nav.classList.toggle('visible');
    });
  });
  