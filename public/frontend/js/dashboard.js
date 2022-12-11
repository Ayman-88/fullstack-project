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
let firstName = document.getElementById('firstname');
let lastName = document.getElementById('lastname');
let email = document.getElementById('email');
let password = document.getElementById('password');
let role = document.getElementById('role');

closeBtn.forEach((x) => {
    x.addEventListener("click", () => {
        updateModel.forEach((x) => {
            x.style.display = "none";
            overlay.style.display = "none ";
            document.body.style.height = "auto";
            firstName.value = null;
            lastName.value = null;
            email.value = null;
            password.value = null;
            role.options[0].selected ='selected';
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
            firstName.value = null;
            lastName.value = null;
            email.value = null;
            password.value = null;
            role.options[0].selected ='selected';
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
       
    });
});

openDeleteModal.forEach((x, y) => {
    x.addEventListener("click", () => {
        deleteModal[y].style.display = "block";
        overlay.style.display = "block";
      
    });
});

overlay.onclick = function () {
    updateModel.forEach((x) => {
        x.style.display = "none";
        overlay.style.display = "none";
        firstName.value = null;
        lastName.value = null;
        email.value = null;
        password.value = null;
        role.options[0].selected ='selected';
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
let catInput = document.getElementById('catinput');
let brandName = document.getElementById('brandname')
let showCat = document.getElementById('showcat');
//
let categorySelect = document.getElementById('categorySelect'); //done
let brand = document.getElementById('brand');//done
let pname = document.getElementById('pname');//done
let pdesc = document.getElementById('pdesc');//done
let pbefore = document.getElementById('pbefore'); 
//..uploadProductImage..////done
// icon appear again //done
//..uploadBtn..////done
//clear value//done
//..discount..////done
//div appear again//done
//...yes no ...// //done
// clear radio value//done
//pbefore clear value//done
//price clear price value
let price = document.getElementById('price');
//quantity clear quantity value
let quantity = document.getElementById('quantity');


if (myCartBtn != null) {
    myCartBtn.addEventListener("click", () => {
        myCart.style.display = "block";
        userTable.style.display = "none";
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
        categorySelect.options[0].selected = 'selected';
        brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
        uploadBtn.value = null;
        yes.checked = false;
        no.checked = false;
       discount.style.display= 'block';
       before.style.display='none';
       pbefore.value = null;
       price.value = null;
       quantity.value = null;
        
    });
    showUserBtn.addEventListener("click", () => {
        userTable.style.display = "inline-table";
        myCart.style.display = "none";
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
       yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

       
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
        yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

    
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
         yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

       
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
        yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

   
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
       yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

       
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
      yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

      
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
        catInput.value=null;
        showCat.options[0].selected = 'selected';
        brandName.value = null;
         categorySelect.options[0].selected = 'selected';
           brand.options[0].selected = "selected";
        pname.value = null;
        pdesc.value = null;
         uploadBtn.value = null;
          yes.checked = false;
        no.checked = false;
        discount.style.display= 'block';
        before.style.display='none';
           pbefore.value = null;
             price.value = null;
       quantity.value = null;

      
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
let uploadProductImage = document.getElementById('uploadProductImage');
let uploadBtn = document.getElementById('upload-btn');
let yes = document.getElementById("yes");
let no = document.getElementById("no");
let discount = document.querySelector(".discount");
let before = document.getElementById("before");
uploadProductImage.onclick = function(){
    uploadBtn.click();
}
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
