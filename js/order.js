
function minus() {
    var num = Number(document.getElementsByClassName("total")[0].innerHTML);
    
    if(num >1) {
        document.getElementsByClassName("total")[0].innerHTML = num-1;
    }
}

function plus() {
    var num = Number(document.getElementsByClassName("total")[0].innerHTML);
    document.getElementsByClassName("total")[0].innerHTML = num+1;
}

//var orderPopUp = document.getElementsByClassName("order-pop-up")[0];

  document.addEventListener('click', (e)=> {
    //alert(e.target.className);
    if(e.target.className == "order-pop-up") {
        document.getElementsByClassName("order-pop-up")[0].style.display = "none";
    } 
})

function showOrderForm() {
    document.getElementsByClassName("order-pop-up")[0].style.display = "flex";
}


function makeOrder(user) {
    if(user != '') {
    var location = document.getElementById("destination").value;
    var tel = document.getElementById("tel").value;
    var price = document.getElementById("price").value;
    var number = document.getElementsByClassName("total")[0].innerHTML; 
    
    var product = document.getElementById("product").value;
    var buyerName = document.getElementById("buyername").value;
    var sellerEmail = document.getElementById("selleremail").value;

    //alert(location + tel + number + product + buyerName);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    }
    xhr.open("GET", "manageOrders.php?location="+location+"&tel="+tel+"&number="+number+"&product="+product+"&buyerName="+buyerName+"&price="+price+"&seller_email="+sellerEmail);
    xhr.send();
}else {
    alert("Please sign in to order");
}
}