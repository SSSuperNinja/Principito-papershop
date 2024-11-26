
const contacto = document.querySelector('.contacto');

contacto.addEventListener('click', (e) => {
  e.preventDefault();

  const lat = 21.478959350747775;
  const lng = -104.85313944901934;

  window.open(`https://www.google.com/maps/place/${lat},${lng}/@${lat},${lng},15z`, '_blank');
});

