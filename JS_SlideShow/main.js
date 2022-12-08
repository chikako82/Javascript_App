'use strict';

const image = ['img/comida1.JPG', 'img/comida2.JPG', 'img/comida3.JPG', 'img/comida4.jpg', 'img/comida5.jpg', 'img/comida6.JPG', 'img/comida7.JPG', 'img/comida8.JPG', 'img/comida9.JPG', 'img/comida10.JPG', 'img/comida11.JPG', 'img/comida12.JPG'];
let current = 0;

function slideShow(num) {
    if(current + num >= 0 && current + num < image.length) {
        current += num;
        document.getElementById('main_image').src = image[current];
        page();
    }
};

function page() {
    document.getElementById('page').textContent = `${current + 1}/${image.length}`;
}

page();

document.getElementById('prev').onclick = function() {
    slideShow(-1);
}
document.getElementById('next').onclick = function() {
    slideShow(1);
}