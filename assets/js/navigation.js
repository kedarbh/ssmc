(function () {
  var toggle = document.getElementById('mobile-menu-toggle');
  var mobileMenu = document.getElementById('mobile-menu');

  if (toggle && mobileMenu) {
    toggle.addEventListener('click', function () {
      var isExpanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!isExpanded));

      if (isExpanded) {
        mobileMenu.classList.add('hidden');
        mobileMenu.setAttribute('hidden', 'hidden');
      } else {
        mobileMenu.classList.remove('hidden');
        mobileMenu.removeAttribute('hidden');
      }
    });
  }

  var submenuToggles = document.querySelectorAll('.mobile-submenu-toggle');

  submenuToggles.forEach(function (button) {
    button.addEventListener('click', function () {
      var targetId = button.getAttribute('aria-controls');
      if (!targetId) {
        return;
      }

      var submenu = document.getElementById(targetId);
      if (!submenu) {
        return;
      }

      var isExpanded = button.getAttribute('aria-expanded') === 'true';
      button.setAttribute('aria-expanded', String(!isExpanded));

      if (isExpanded) {
        submenu.classList.add('hidden');
      } else {
        submenu.classList.remove('hidden');
      }
    });
  });
})();
