function moveToDashboard(user) {
    var shop = document.getElementById("shop").value;
    
    if(user != null) {
        if(shop != "false") {
        window.location="pages/dashboard.php";
        } else {
            window.location="pages/createShop.php";
        }
    } else {
        alert("Sign In first");
    }
}

function moveToDashboard2(user) {
    var shop = document.getElementById("shop").value;
    
    if(user != null) {
        if(shop != "false") {
        window.location="../pages/dashboard.php";
        } else {
            window.location="../pages/createShop.php";
        }
    } else {
        alert("Sign In first");
    }
}

function createShop() {
    var shop_name = document.getElementById("shop_name").value;
    var momo = document.getElementById("momo").value;
    var email = document.getElementById("email").value;
    
    if(shop_name != '' && momo != '') {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if(response == "Shop created") {
                window.location = "dashboard.php?email="+email;
            } else {
                alert(response);
            }
        }
    }
    xhr.open("GET","manageShop.php?shop_name="+shop_name+"&momo="+momo);
    xhr.send();
}else {
    alert("Please fill all fields");
}
}