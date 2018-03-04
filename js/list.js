
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    ul.style.visibility = "visible";
    ul.style.display = "block";

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function hide(){
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    ul.style.visibility = "hidden";
    ul.style.direction = "none";
}

function setsearch(med){
    document.getElementById("myInput").value = med;
}


function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("myInput").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myUL").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "list.php?q=" + str, true);
        xmlhttp.send();
    }
}
