document.getElementById('next').onclick = function(){
    let list = document.querySelectorAll('.item');
    document.getElementById('slide').appendChild(list[0]);
}
document.getElementById('prev').onclick = function(){
    let list = document.querySelectorAll('.item');
    document.getElementById('slide').prepend(list[list.length -1]);
}

// let loadMoreBtn = document.querySelector('#Loadmore');
// let curremtItem = 5;
// loadMoreBtn.onclick =() =>{
//     let boxes = [...document.querySelectorAll('.product_category .pro-full')];
//     for (var i = curremtItem; i < curremtItem.length +5 ; i++ ) {
//         boxes[i].style.display = 'inline-block';
        
//     }
//     curremtItem += 5;
//     if (curremtItem >= boxes.length) {
//         loadMoreBtn.style.display = 'none';
//     }
// }