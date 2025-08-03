// products
const products = [
    {
        img: "./img/home_page/01-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/03-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/03-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/21N-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/23C-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/25N-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
    {
        img: "./img/home_page/27N-Weyoung.jpg",
        title: "Weyoung",
        price: "$22"
    },
];

let productList = "";
for (let i = 0; i < products.length; i++) {
    productList += `<div class="col-6 col-md-4 mb-4">
          <div class="card" style="width: 100%;">
            <img src="${products[i].img}" class="card-img-top rounded-top"
              alt="${products[i].title}">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h2 class="h5 card-title mb-0">${products[i].title}</h2>
                <p class="card-text mb-0">${products[i].price}</p>
              </div>
              <div>
                <a href="#" class="btn btn-brown" aria-label="Buy Now">Buy Now</a>
              </div>
            </div>
          </div>
        </div>`;
}
document.getElementById("product-list").innerHTML = productList;

//Extra Accessories
const extraAccessories = [
    {
        img: "./img/home_page/Ex-makeupBag.png",
        title: "Weyoung Bag",
        price: "$15"
    },
    {
        img: "./img/home_page/Ex-makeupPuff.png",
        title: "Weyoung Makeup Puff",
        price: "$8"
    },
]

let extraList = "";
for (let i = 0; i < extraAccessories.length; i++) {
    extraList += `<div class="col-6 col-md-4 mb-4">
          <div class="card" style="width: 100%;">
            <img src="${extraAccessories[i].img}" class="card-img-top rounded-top"
              alt="${extraAccessories[i].title}">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h2 class="h5 card-title mb-0">${extraAccessories[i].title}</h2>
                <p class="card-text mb-0">${extraAccessories[i].price}</p>
              </div>
              <div>
                <a href="#" class="btn btn-brown" aria-label="Buy Now">Buy Now</a>
              </div>
            </div>
          </div>
        </div>`;
}
document.getElementById("extra-list").innerHTML = extraList;