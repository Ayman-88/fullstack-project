const updateModel = document.querySelectorAll(".update-modal");
const openModal = document.querySelectorAll(".openmodal");
const closeBtn = document.querySelectorAll(".close-btn");
const cancelBtn = document.querySelectorAll(".cancel");
const mbody = document.querySelectorAll(".mbody input");
var overlay = document.querySelector("#overlay");
const openDeleteModal = document.querySelectorAll(".opendm");
const deleteModal = document.querySelectorAll(".delete-modal");
const updateModelSpan = document.querySelector(".update-modal span");
var updateForm = document.querySelectorAll(".updateForm");
const dashboardRightSide = document.getElementById("dashboard-rightside");
const dashboardLeftSide = document.getElementById("dashboard-leftside");
var parent = document.querySelectorAll(".parent");

closeBtn.forEach((x) => {
    x.addEventListener("click", () => {
        updateModel.forEach((x) => {
            x.style.display = "none";
            overlay.style.display = "none ";
            document.body.style.height = "auto";
        });
        deleteModal.forEach((y) => {
            y.style.display = "none";
            overlay.style.display = "none ";
            document.body.style.height = "auto";
        });
    });
});

cancelBtn.forEach((a) => {
    a.addEventListener("click", () => {
        updateModel.forEach((x) => {
            x.style.display = "none";
            overlay.style.display = "none";
            document.body.style.height = "auto";
        });
        deleteModal.forEach((y) => {
            y.style.display = "none";
            overlay.style.display = "none ";
            document.body.style.height = "auto";
        });
    });
});

openModal.forEach((x, y) => {
    x.addEventListener("click", () => {
        updateModel[y].style.display = "block";
        overlay.style.display = "block";
        overlay.style.height = document.body.offsetHeight + "px";
    });
});

openDeleteModal.forEach((x, y) => {
    x.addEventListener("click", () => {
        deleteModal[y].style.display = "block";
        overlay.style.display = "block";
        overlay.style.height = document.body.offsetHeight + "px";
    });
});

overlay.onclick = function () {
    updateModel.forEach((x) => {
        x.style.display = "none";
        overlay.style.display = "none";
    });
    deleteModal.forEach((x) => {
        x.style.display = "none";
        overlay.style.display = "none";
    });
};

updateModel.forEach((x, _y) => {
    if (x.contains(updateModelSpan)) {
        x.style.display = "block";
        overlay.style.display = "block ";
    }
    overlay.style.height = document.body.offsetHeight + "px";
});

const addProductBtn = document.getElementById("addProductBtn");
const showProductBtn = document.getElementById("showProductBtn");
const showCartBtn = document.getElementById("showCartBtn");
const addProduct = document.getElementById("addProduct");
const showProduct = document.getElementById("showProduct");
const showCart = document.getElementById("showCart");
const usersTable = document.getElementById("usersTable");
const showUsersBtn = document.getElementById("showUsersBtn");
const showUserBtn = document.getElementById("showUserBtn");
const myCartBtn = document.getElementById("myCartBtn");
const myCart = document.getElementById("myCart");
const userTable = document.getElementById("userTable");
let addCategoryBtn = document.getElementById("addCategoryBtn");
let addBrandBtn = document.getElementById("addBrandBtn");
let addCategory = document.getElementById("addCategory");
let catdisplay = document.getElementById("catdisplay");

if (myCartBtn != null) {
    myCartBtn.addEventListener("click", () => {
        myCart.style.display = "block";
        userTable.style.display = "none";
    });
    showUserBtn.addEventListener("click", () => {
        userTable.style.display = "inline-table";
        myCart.style.display = "none";
    });
}

if (showUsersBtn != null) {
    showUsersBtn.addEventListener("click", () => {
        usersTable.style.display = "inline-table";
        addProduct.style.display = "none";
        showProduct.style.display = "none";
        showCart.style.display = "none";
        addCategory.style.display = "none";
        catdisplay.style.display = "none";
    });
}
if (addProductBtn != null) {
    addProductBtn.addEventListener("click", () => {
        usersTable.style.display = "none";
        showProduct.style.display = "none";
        addProduct.style.display = "block";
        addCategory.style.display = "none";
        catdisplay.style.display = "none";
        showCart.style.display = "none";
    });
}
if (showProductBtn != null) {
    showProductBtn.addEventListener("click", () => {
        addProduct.style.display = "none";
        usersTable.style.display = "none";
        showCart.style.display = "none";
        showProduct.style.display = "block";
        addCategory.style.display = "none";
        catdisplay.style.display = "none";
    });
}
if (showCartBtn != null) {
    showCartBtn.addEventListener("click", () => {
        usersTable.style.display = "none";
        addProduct.style.display = "none";
        showProduct.style.display = "none";
        showCart.style.display = "block";
        addCategory.style.display = "none";
        catdisplay.style.display = "none";
    });
}

if (addCategoryBtn != null) {
    addCategoryBtn.addEventListener("click", () => {
        usersTable.style.display = "none";
        addProduct.style.display = "none";
        showProduct.style.display = "none";
        showCart.style.display = "none";
        catdisplay.style.display = "none";
        addCategory.style.display = "block";
    });
}
if (addBrandBtn != null) {
    addBrandBtn.addEventListener("click", () => {
        usersTable.style.display = "none";
        addProduct.style.display = "none";
        showProduct.style.display = "none";
        showCart.style.display = "none";
        catdisplay.style.display = "block";
        addCategory.style.display = "none";
    });
}
let addbr = document.getElementById("addbr");
let add = document.getElementById("add");
let addpr = document.getElementById("addpr");

if (add != null) {
    add.addEventListener("click", () => {
        add.innerText = "adding...";
    });
}
if (addbr != null) {
    addbr.addEventListener("click", () => {
        addbr.innerText = "adding...";
    });
}
if (addpr != null) {
    addpr.addEventListener("click", () => {
        addpr.innerText = "adding...";
    });
}

let yes = document.getElementById("yes");
let no = document.getElementById("no");
let discount = document.querySelector(".discount");
let before = document.getElementById("before");
if (yes != null) {
    yes.addEventListener("click", () => {
        discount.style.display = "none";
        before.style.display = "block";
    });
}

if (no != null) {
    no.onclick = function () {
        discount.style.display = "none";
    };
}

// ---------------------------call brands data with ajax----------------------------------
$(document).ready(function () {
    $("#categorySelect").change(function () {
        let id = $(this).val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        //call brand on category selected

        $.ajax({
            dataType: "json",
            url: "/getBrand/" + id,
            type: "GET",
            success: function (brands) {
                $('select[name="brand_id"]').empty();

                $.each(brands, function (index, element) {
                    $('select[name="brand_id"]').append(
                        '<option value="' +
                            element.id +
                            '">' +
                            element.brand_name +
                            "</option>"
                    );
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});

const fakeBtn = document.querySelectorAll(".fakeBtn");
const tr1 = document.querySelectorAll(".tr1");
const tr2 = document.querySelectorAll(".tr2");
const cUpCart = document.querySelectorAll(".cUpCart");
if (fakeBtn != null) {
    fakeBtn.forEach((x, y) => {
        x.addEventListener("click", () => {
            tr1.forEach((r) => {
                r.style.display = "none";
            });
            tr2[y].style.display = "table-row";
        });
    });
}
if (cUpCart != null) {
    cUpCart.forEach((x, y) => {
        x.addEventListener("click", () => {
            tr2.forEach((h) => {
                h.style.display = "none";
            });
            tr1.forEach((s) => {
                s.style.display = "table-row";
            });
        });
    });
}
