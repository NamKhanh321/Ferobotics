let progress = document.getElementById("progressbar");
let totalHeight = document.body.scrollHeight - window.innerHeight;
window.onscroll = function () {
    let progressHeight = (window.pageYOffset / totalHeight) * 100;
    progress.style.height = progressHeight + "%";
};

let thispage = 1;
let limit = 12;
let list = document.querySelectorAll(".showcase-items .item");

function loadItem() {
    let begin = (thispage - 1) * limit;
    let end = thispage * limit;
    list.forEach((item, index) => {

        if (index >= begin && index < end) {
            item.style.display = "block";

        } else {
            item.style.display = "none";
        }
    })
    listPage();
}

loadItem();

function listPage() {
    let count = Math.ceil(list.length / limit);
    document.querySelector('.listPage').innerHTML = '';
    for (let i = 1; i <= count; i++) {
        let li = document.createElement('li');
        li.innerText = i;
        if (i == thispage) {
            li.classList.add('active');
        }
        li.setAttribute('onclick', 'changePage(' + i + ')');
        document.querySelector('.listPage').appendChild(li);
    }
}

function changePage(page) {
    thispage = page;
    loadItem();
}

