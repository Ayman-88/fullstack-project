const nav = document.querySelectorAll(".nav-link");
const image = document.querySelectorAll(".slider .image img");
const slider = document.querySelectorAll(".slider");
nav.forEach((element) => {
    element.addEventListener("click", function () {
        nav.forEach((x) => {
            x.classList.remove("active");
            this.classList.add("active");
        });
    });
});
slider.forEach((i) => {
    image.forEach((j) => {
        j.style.width = i.offsetWidth + "px";
    });
});

const prev = document.getElementById("prev");
const next = document.getElementById("next");
const images = document.querySelectorAll(".slider .image img");
const img = document.querySelectorAll(".slider .image img");
let index = 0;

next.onclick = function () {
    images.forEach((img) => {
        img.style.display = "none";
    });
    index++;
    if (index > images.length - 1) {
        index = 0;
    }
    images[index].style.display = "block";
};
prev.onclick = function () {
    images.forEach((img) => {
        img.style.display = "none";
    });
    index--;
    if (index < 0) {
        index = images.length - 1;
    }
    images[index].style.display = "block";
};

let links = document.querySelectorAll(".sec3links a");

links.forEach((li, index) => {
    li.onclick = function (e) {
        e.preventDefault();
        links.forEach((x) => {
            x.classList.remove("active");
        });
        li.classList.add("active");
    };
});

let loadbtn = document.getElementById("loadmore");
let viewmore = document.getElementById("viewmore");

loadbtn.onclick = function (e) {
    e.preventDefault();
    loadbtn.style.display = "none";
    viewmore.style.display = "flex";
};

$(document).ready(function () {
    // // ---------------------------call product data with ajax----------------------------------

    // // ---------------------------call brands data with ajax----------------------------------
    $(".category").on("click", function (e) {
        let id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // call product on category selected

        $.ajax({
            dataType: "json",
            url: "/getproduct/" + id,
            type: "GET",
            success: function (product) {
                $("#sec3image .row").empty();

                $.each(product, function (index, element) {
                    if (element.pricebefore) {
                        var test =
                            '<p class="before">$' +
                            element.pricebefore +
                            "</p>";
                    } else {
                        var test = '<p class="before"></p>';
                    }

                    $("#sec3image .row").append(
                        `<div class="col-lg-3" data-id='${element.id}'>
                   <div class="image1">
                       <img src="frontend/gallery/${element.image} " alt="">
                       <div class="title">
                           <h2>${element.productname}</h2>
                       </div>
                       <div class="price">
                           ${test}
                          <p>${element.price}</p>
                      </div>
                      <div class="overlay"></div>
                      <div class="show"><a href="showCart/${element.id}" target="blank"><i class="fas fa-eye"></i></a></div>
                  </div>
              </div>`
                    );
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    /////////////////////////////////////////////display search results\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $("input[name=search]").on("input", function () {
        var searchName = $(this).val();
        $(".searchresults").empty();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var csrfVar = $('meta[name="csrf-token"]').attr('content');
      if(searchName != ''){
        $.ajax({
            dataType: "json",
            url: "/searchresults/" + searchName,
            type: "POST",
            success: function (products) {
                $.each(products, function (index, element) {
                    $(".searchresults").append(`<form method='POST' action='/displaySearchResult/${element.id}'>
                    <input name='_token' value='${csrfVar}' type='hidden'>
                    <button type='submit'>${element.productname}</button></form>`);
                });
            },
         
        });
      }

    });
});
