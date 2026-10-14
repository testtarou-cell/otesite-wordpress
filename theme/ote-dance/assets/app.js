const menu = document.querySelector('.menu-toggle');
const nav = document.querySelector('.nav');
function closeMenu(returnFocus = false) {
  nav?.classList.remove('open');
  menu?.setAttribute('aria-expanded', 'false');
  menu?.setAttribute('aria-label', 'メニューを開く');
  if (returnFocus) menu?.focus();
}
menu?.addEventListener('click', () => {
  const open = menu.getAttribute('aria-expanded') !== 'true';
  menu.setAttribute('aria-expanded', String(open));
  menu.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
  nav.classList.toggle('open', open);
});
nav?.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => closeMenu()));
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && menu?.getAttribute('aria-expanded') === 'true') closeMenu(true);
});
document.addEventListener('click', (e) => {
  if (!e.target.closest('.header')) closeMenu();
});
window.matchMedia('(min-width:801px)').addEventListener('change', (e) => {
  if (e.matches) closeMenu();
});

const dialog = document.querySelector('#photo-dialog');
const photos = [...document.querySelectorAll('[data-photo]')];
let photoIndex = 0,
  opener;
function showPhoto(index) {
  photoIndex = (index + photos.length) % photos.length;
  const target = photos[photoIndex];
  const img = dialog.querySelector('img');
  img.src = target.dataset.photo;
  img.alt = target.querySelector('img').alt;
  dialog.querySelector('[data-photo-caption]').textContent =
    `${photoIndex + 1} / ${photos.length}　${img.alt}`;
}
photos.forEach((b, i) =>
  b.addEventListener('click', () => {
    opener = b;
    showPhoto(i);
    dialog.showModal();
  }),
);
dialog?.querySelector('[data-close]')?.addEventListener('click', () => dialog.close());
dialog?.querySelector('[data-prev]')?.addEventListener('click', () => showPhoto(photoIndex - 1));
dialog?.querySelector('[data-next]')?.addEventListener('click', () => showPhoto(photoIndex + 1));
dialog?.addEventListener('close', () => opener?.focus());
dialog?.addEventListener('keydown', (e) => {
  if (e.key === 'ArrowLeft') {
    e.preventDefault();
    showPhoto(photoIndex - 1);
  }
  if (e.key === 'ArrowRight') {
    e.preventDefault();
    showPhoto(photoIndex + 1);
  }
});
dialog?.addEventListener('click', (e) => {
  if (e.target === dialog) {
    const r = dialog.getBoundingClientRect();
    if (e.clientX < r.left || e.clientX > r.right || e.clientY < r.top || e.clientY > r.bottom)
      dialog.close();
  }
});
