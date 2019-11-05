function showResult(str) {
    var xhttp;
    var minimum = document.getElementById("min");
    var maximum = document.getElementById("max");
    var average = document.getElementById("avg");
    if (minimum.checked==true){
        document.getElementById("resultMin").innerHTML = "Correct"
    }
    
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getcustomer.php?q="+str, true);
    xhttp.send();
  }