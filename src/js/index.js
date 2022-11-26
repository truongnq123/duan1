
document.getElementById('next').onclick = function next() {
  let lists = document.querySelectorAll('.item');
  document.querySelector('.slide_show').appendChild(lists[0]);
}
document.getElementById('prev').onclick = function prev() {
  let lists = document.querySelectorAll('.item');
  document.querySelector('.slide_show').prepend(lists[lists.length-1]);
}

document.getElementById('truoc').onclick = function next() {
  let lists = document.querySelectorAll('.snip1583');
  document.querySelector('.list_product_popular').appendChild(lists[0]);
}
document.getElementById('sau').onclick = function prev() {
  let lists = document.querySelectorAll('.snip1583');
  document.querySelector('.list_product_popular').prepend(lists[lists.length-1]);
}
/* Demo purposes only */
var snippet = [].slice.call(document.querySelectorAll('.hover'));
if (snippet.length) {
  snippet.forEach(function (snippet) {
    snippet.addEventListener('mouseout', function (event) {
      if (event.target.parentNode.tagName === 'figure') {
        event.target.parentNode.classList.remove('hover')
      } else {
        event.target.parentNode.classList.remove('hover')
      }
    });
  });
}