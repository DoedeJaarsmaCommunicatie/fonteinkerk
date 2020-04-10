export default {
  init() {
    // Javascript that fires on all pages.
  },

  finalize() {
    // Javascript that fires on all pages. after page specific JS is fires.
    menuOpener();
  },
};

const menuOpener = () => {
  const button = document.querySelector('.js-menu-button');
  const openMenu = (e) => {
    document.querySelector('.nav').classList.toggle('active');
  }


  button.addEventListener('click', openMenu);
}
