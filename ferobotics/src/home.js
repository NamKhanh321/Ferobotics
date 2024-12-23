let progress = document.getElementById("progressbar");
let totalHeight = document.body.scrollHeight - window.innerHeight;
window.onscroll = function () {
  let progressHeight = (window.pageYOffset / totalHeight) * 100;
  progress.style.height = progressHeight + "%";
};
const listItem = [
  {
    title: "Black Friday",
    describe:
      "Giảm Giá Black Friday 70%! " +
        "Black Friday Siêu Sốc – Giảm Giá Lên Đến 70%! Mua Sắm Tất Cả Những Gì Bạn Yêu Thích Với Mức Giá Không Thể Tốt Hơn, Chỉ Duy Nhất Trong Dịp Siêu Sale Cuối Năm – Đừng Bỏ Lỡ Cơ Hội Vàng!",
    image: "../img/bd.jpg",
    bgColor:"black",
    bg: "../img/bd.jpg",
  },
  {
    title: "Spring Sale",
    describe:
      "Giảm Giá Lên Đến 50% Cho Các Loài Robotic!\n" +
        "\n" +
        "Chào Đón Mùa Xuân Rộn Ràng! Giảm Giá 50% Cho Tất Cả Các Sản Phẩm Robotics – Cơ Hội Để Bạn Sở Hữu Những Thiết Bị Công Nghệ Hiện Đại Với Giá Tốt Nhất Trong Năm! Nhanh Tay Mua Sắm Ngay!",
    image: "../img/robotloai1.png",
    bgColor:"black",
    bg: "../img/background2.jpg",
  },
  {
    title: "Online Shipping",
    describe:
        "Đặt Hàng Online Tiện Lợi Cho Sản Phẩm Robotics – Mua Sắm Các Thiết Bị Công Nghệ Hiện Đại Ngay Tại Nhà, Tiết Kiệm Thời Gian và Công Sức!",
    image: "../img/robotlaunha.png",
    bgColor:"black",
    bg: "../img/bd.jpg",
  },
];

const backgroundWrapper = document.querySelector(".carousel-bg-wrapper");
for (let i = 0; i < listItem.length; i++) {
  backgroundWrapper.innerHTML += `<img src="${listItem[i].bg}" alt="" class="carousel-bg">`;
}

const contentWrapper = document.querySelector(".content-wrapper");
for (let i = 0; i < listItem.length; i++) {
  contentWrapper.innerHTML += `
    <div class="content">
        <h1 class="name oswald-bold" style="--i: 0; font-size: 32px">${listItem[i].title}</h1>
        <div class="describe roboto-medium" style="--i: 1;  font-size: 20px">
            <p style="text-align: justify">${listItem[i].describe}</p>
        </div>
        <a href="shop.php"><button class="roboto-medium" style="--i: 3">ORDER</button></a>
    </div>
    `;
}
const slide = document.querySelector(".slide-wrapper .slide");
for (let i = 0; i < listItem.length; i++) {
  slide.innerHTML += `
                <div class="item-wrapper">
                    <div class="item" style="--bg: ${listItem[i].bgColor}">
                        <img src="${listItem[i].image}" alt="" />
                    </div>
                </div>
                `;
}
const backgrounds = document.querySelectorAll(".carousel-bg");
const indicatorNumbers = document.querySelectorAll(
  ".carousel-indicators .number"
);
const contents = document.querySelectorAll(".content");
const items = document.querySelectorAll(".slide .item-wrapper");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");

let currentIndex = 0;
const setActive = (index) => {
  currentIndex = index;
  if (currentIndex == 0) {
    prev.disabled = true;
  } else prev.disabled = false;
  if (currentIndex == listItem.length - 1) {
    next.disabled = true;
  } else next.disabled = false;
  backgrounds.forEach((background) => {
    background.classList.remove("active");
  });
  backgrounds[currentIndex].classList.add("active");

  indicatorNumbers.forEach((number) => {
    number.classList.remove("active");
  });
  indicatorNumbers[currentIndex].classList.add("active");

  contents.forEach((content) => {
    content.classList.remove("active");
  });
  contents[currentIndex].classList.add("active");

  items.forEach((item) => {
    item.classList.remove("active");
  });
  items[currentIndex].classList.add("active");
};

setActive(currentIndex);

prev.addEventListener("click", () => {
  currentIndex--;
  slide.style = `--i: ${currentIndex}`;
  setActive(currentIndex);
});
next.addEventListener("click", () => {
  currentIndex++;
  slide.style = `--i: ${currentIndex}`;
  setActive(currentIndex);
});
let thispage = 1;
let limit = 4;
let list = document.querySelectorAll(".pro-container .pro");
let list1 = document.querySelectorAll(".pro-container1 .pro");
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
  list1.forEach((item, index) => {

    if (index >= begin && index < end) {
      item.style.display = "block";

    } else {
      item.style.display = "none";
    }
  })
}

loadItem();
