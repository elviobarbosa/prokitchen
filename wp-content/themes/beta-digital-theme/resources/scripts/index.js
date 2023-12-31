import $ from 'jquery';
import Carrosel from './components/carrosel';
import Accordeon from './components/accordeon';
import FormProduct from './components/form-products';
import ImageCat from './components/image-cat';
import HeaderFront from './components/text-header-front';
import ScrollingAnimation from './components/scrolling-animation';
import InputMasks from './components/input-masks';
import CF7Events from './components/cf7-events';
import Scrolling from './components/scrolling';

function domReady(fn) {
    document.addEventListener("DOMContentLoaded", fn);
    
    if (document.readyState === "interactive" || document.readyState === "complete" ) {
      new Carrosel();
      new Accordeon();
      new FormProduct();
      new ImageCat();
      new HeaderFront();
      new ScrollingAnimation();
      new InputMasks();
      new CF7Events();
      new Scrolling();
    }
}

const init = function() {
  let start = false;
  
  window.addEventListener('mousemove', e => {
    if ( !start ) {
      start = true;
      const url = window.location.host;
      const http = window.location.protocol;
    }
  });
}

window.onload = function() {
  init();
};

domReady(() => { })
