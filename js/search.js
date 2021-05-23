function search() {
    var keyword = document.getElementById("search-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            //alert(xhr.responseText);
            document.getElementsByClassName("top-selling-items")[0].innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "pages/search.php?keyword="+keyword);
    xhr.send();

    getSearchNumber();
}

function getSearchNumber() {
    var keyword = document.getElementById("search-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            //alert(xhr.responseText);
            document.getElementsByClassName("top-selling-text")[0].innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "pages/search.php?keyword="+keyword+"&count=true");
    xhr.send();
}