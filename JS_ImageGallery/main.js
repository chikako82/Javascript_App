'use strict';

const panels = document.querySelectorAll('.panel');
    function toggleOpen() {
      this.classList.toggle('open');
    }

    function toggleActive(e) {
      console.log(e.propertyName);
      // transitionが終わった後に複数の動作が発生するためトリガーを指定する
      if(e.propertyName.includes('flex')) {
        this.classList.toggle('open-active');
      }
    }

    panels.forEach(panel => panel.addEventListener('click', toggleOpen));
    panels.forEach(panel => panel.addEventListener('transitionend', toggleActive));