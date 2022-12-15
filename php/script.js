const prodInput = document.querySelector(".product-input input");
filters = document.querySelectorAll(".filters span"),
clearAll = document.querySelector(".deletebtn"),
prodBox = document.querySelector(".product-box");

list = JSON.parse(localStorage.getItem("shopping-list"));
let editId;
let isEditprod = false;

filters.forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelector("span.active").classList.remove("active");
        btn.classList.add("active");
        showlist(btn.id);
    });
});


function showlist(filter) {
    let li = "";
       if(list){
        list.forEach((product, id) => {
            let isBought = product.status == "bought" ? "checked" : "";
            if( filter == product.status || filter == "all"){
            li += `<li class="product">
                        <label for="${id}">
                            <input onclick="updateStatus(this)" type="checkbox" id="${id}" ${isBought}>
                            <p class="${isBought}">${product.name}</p>
                        </label>
                        <div class="functions"> 
                            <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                            <ul class="product-menu">
                                <li onclick="editProd(${id}, '${product.name}')"><i class="uil uil-pen"></i> Edit</li>
                                <li onclick="deleteProd(${id}, '${filter}')"><i class="uil uil-trash"></i> Delete</li>
                            </ul>
                        </div>
                    </li>`; 
            }
    });
       }
        prodBox.innerHTML = li || `<span> There are no products here </span>`;
        let checkProd = prodBox.querySelectorAll(".product");
        !checkProd.length ? clearAll.classList.remove("active") : clearAll.classList.add("active");
        prodBox.offsetHeight >= 300 ? prodBox.classList.add("overflow") : prodBox.classList.remove("overflow");
    
    }

    showlist("all");

function showMenu(selectedProduct){
   let prodMenu = selectedProduct.parentElement.lastElementChild;
   prodMenu.classList.add("show");
   document.addEventListener("click", e => {
       if(e.target.tagName != "I" || e.target != selectedProduct){
           prodMenu.classList.remove("show");
       }
   });
}

function updateStatus(selectedProduct){
    let prodName = selectedProduct.parentElement.lastElementChild;
    if(selectedProduct.checked){
        prodName.classList.add("checked");
        list[selectedProduct.id].status = "bought";
    }else{
        prodName.classList.remove("checked");
        list[selectedProduct.id].status = "pending";
    }
    localStorage.setItem("shopping-list", JSON.stringify(list));
}

function editProd(prodId, textName) {
    editId = prodId;
    isEditprod = true;
    prodInput.value = textName;
    prodInput.focus();
    prodInput.classList.add("active");
}

function deleteProd(deleteId, filter) {
    isEditprod = false;
    list.splice(deleteId, 1);
    localStorage.setItem("shopping-list", JSON.stringify(list));
    showlist(filter);
}

clearAll.addEventListener("click", () => {
    isEditTask = false;
    list.splice(0, list.length);
    localStorage.setItem("shopping-list", JSON.stringify(list));
    showlist("all")
});

prodInput.addEventListener("keyup", e => {
    let userProd = prodInput.value.trim();
    if( e.key == "Enter" && userProd){
        if(!isEditprod){
            list = !list ? [] : list;
            let prodInfo = { name: userProd, status: "pending"};
            list.push(prodInfo); //add new product to list 
        }else{
            isEditprod = false;
            list[editId].name = userProd;
        }
        prodInput.value = "";
        localStorage.setItem("shopping-list", JSON.stringify(list));
        showlist("all");
    }
});



