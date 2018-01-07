/* eslint-disable */
var jQuery = require("jquery");
import Slideout from'../libraries/slideout';

export default {
  init() {
    // JavaScript to be fired on all pages
    var slideout = new Slideout({
      'panel': document.getElementById('panel'),
      'menu': document.getElementById('menu-mobile'),
      'padding': 256,
      'tolerance': 70,
      'easing': 'ease-in',
      'side': 'right'
    });

    document.querySelector('.toggle-button').addEventListener('click', function() {
      slideout.toggle();
    });

    $('.Hero-off').removeClass('Hero-off');

   
   
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
