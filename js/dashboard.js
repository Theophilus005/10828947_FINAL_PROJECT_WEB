/*mobile menu */
const menuButton = document.getElementById('menu');
const mobileMenu = document.getElementsByClassName('mobile-menu')[0];
menuButton.addEventListener('click', ()=> {
    mobileMenu.classList.toggle('toggleMenu');
})


/*Tabs */
/*Get The Tabs */
const productsTab = document.getElementsByClassName('products-tab')[0];
const ordersTab = document.getElementsByClassName('orders-tab')[0];

/*Get The Tab Contents */
const productsTabContent = document.getElementsByClassName('products-section')[0];
const ordersTabContent = document.getElementsByClassName('orders-content')[0];

/*Get The Icons */
const productsTabIcon = document.querySelector('.products-tab div img');
const ordersTabIcon = document.querySelector('.orders-tab div img');

/*Remove orders content and enable products content, also alternate between the img srcs*/
productsTab.addEventListener('click', ()=> {
    tl.reverse();
    productsTab.style.color ="#f53607";
    ordersTab.style.color ="#706F6F";
    productsTabIcon.src = "../icons/categorize-blue.png";
    ordersTabIcon.src = "../icons/order-grey.png";
    ordersTabContent.classList.remove('orders-selected');
    productsTabContent.classList.add('products-selected');
})

/*Remove products content and enable orders content,  also alternate between the img srcs*/
ordersTab.addEventListener('click', ()=> {
    tl.play(0);
    ordersTab.style.color ="#f53607";
    productsTab.style.color ="#706F6F";
    productsTabIcon.src = "../icons/categorize-grey.png";
    ordersTabIcon.src = "../icons/order-blue.png";
    productsTabContent.classList.remove('products-selected');
    ordersTabContent.classList.add('orders-selected');
})

/* GSAP Animations */
const tabsDiv = document.getElementsByClassName('tabs')[0];
const tabsDivWidth = tabsDiv.clientWidth;

const slider = document.getElementById('slider');
const sliderWidth = slider.clientWidth;
console.log("slider: " + sliderWidth);

/*Get the slider */
const tl = gsap.timeline({paused: true});
 tl.to(productsTab, {
     borderRight: "0px solid #f53607",
 })
 .to('#slider', {
     width: '100%'
 }, "-=0.3")
 .to('#slider', {
    left:"50%",
    width: '50%',
 }).to(ordersTab, {
    borderLeft: "3px solid #f53607", 
 }, "-=0.3")

productsTabContent.classList.add("products-selected");

/* Hovering For the Add Button */
const addButton = document.getElementById('add-link');
const addButtonMobile = document.getElementById('add-link-mobile');
const addButtonImage = document.querySelector('.add-button-div img');
const addButtonDiv = document.querySelector('.add-button-div');

/*moouseover*/
addButton.addEventListener('mouseover', ()=> {
    addButtonDiv.style.backgroundColor = "#00BB13";
    addButtonImage.src="../icons/plus-white.png";
})

/*mouseout*/
addButton.addEventListener('mouseout', ()=> {
    addButtonDiv.style.backgroundColor = "#ffffff";
    addButtonImage.src="../icons/plus-green.png";
})

console.log(window.screen.availWidth);

var locationLottie = bodymovin.loadAnimation({
    container: document.getElementById('location-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/location-pin.json'
  })

  var orderDetailsLottie = bodymovin.loadAnimation({
    container: document.getElementById('order-details-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/box-open.json'
  })

  var buyerInfoLottie = bodymovin.loadAnimation({
    container: document.getElementById('buyer-info-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/profile.json'
  })

  var buyerInfoLottieMobile = bodymovin.loadAnimation({
    container: document.getElementById('buyer-info-lottie-mobile'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/profile-mobile.json'
  })

  var orderDetailsMobile = bodymovin.loadAnimation({
    container: document.getElementById('order-details-lottie-mobile'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/box-open.json'
  })

  var userLottieMobile = bodymovin.loadAnimation({
    container: document.getElementById('location-lottie-mobile'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/location-pin.json'
  })

  var clockLottie = bodymovin.loadAnimation({
    container: document.getElementById('clock-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/clock.json'
  })

  var clockLottieMobile = bodymovin.loadAnimation({
    container: document.getElementById('clock-lottie-mobile'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/clock.json'
  })

  var menuLottie = bodymovin.loadAnimation({
    container: document.getElementById('menu'),
    renderer: 'svg',
    loop: true,
    autoplay: false,
    path: '../lottie/menuLottie.json'
  })

  var popUp = document.getElementsByClassName("pop-up")[0];

  document.addEventListener('click', (e)=> {
    //alert(e.target.className);
    if(e.target.className == "pop-up") {
      popUp.style.display = "none";
    } 

  var addBtn = document.getElementById("add-link");
  addBtn.addEventListener('click', ()=> {
    popUp.style.display = "flex";
  })

  var addBtnMobile = document.getElementById("add-link-mobile");
  addBtnMobile.addEventListener('click', ()=> {
    popUp.style.display = "flex";
  })
})

function addProduct() {
  var form = document.getElementsByClassName("inner-form")[0];
  var imgFile = document.getElementById("file");
  var formData = new FormData(form);
  formData.append("file", imgFile);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      alert(response);
    }
  }
  xhr.open("POST", "manageShop.php");
  xhr.send(formData);
}

//Send request to pause product
function pauseProduct(product_id, product_name) {
  var proceed = confirm("Pausing this product will make it unavailable for purchase untill you set it active again");
    if(proceed) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        alert(xhr.responseText);
      }
    }
    xhr.open("GET", "manageShop.php?pause_id=" + product_id + "&&pause_name=" + product_name);
    xhr.send();
  }
}

//Preview function
function previewProduct(product_id) {
  window.location = "details.php?product_id="+product_id;
}

//Send request to delete file
function deleteProduct(product_id, product_name) {
  var confirm_delete = confirm("Are you sure you want to delete this product");
  if(confirm_delete) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        alert(xhr.responseText);
      }
    }
    xhr.open("GET", "manageShop.php?delete_id=" + product_id + "&&delete_name=" + product_name);
    xhr.send();
  }
}

//Complete order
function completeOrder(order_id) {
  var confirm_complete = confirm("Have you delivered this product?");
  if(confirm_complete) { 
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
      alert(xhr.responseText);
    }
  }
  xhr.open("GET", "deleteOrder.php?delete_id="+order_id);
  xhr.send();
}
}



