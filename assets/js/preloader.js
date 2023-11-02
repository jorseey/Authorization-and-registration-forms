window.onload = function () {
  let preloader = document.getElementById('preloader');

  preloader.addEventListener('animationend', function () {
    preloader.style.display = 'none';

    document.body.style.opacity = 1;
  });
};
