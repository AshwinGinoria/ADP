function add(){
    var x = parseInt(document.getElementById("x").value)
    var y = parseInt(document.getElementById("y").value)
    var z = String(x+y);
    document.getElementById("answer").innerHTML = z;
}
function updateTextInput() {
    var x = parseInt(document.getElementById("x").value);
    var z = String(x);    
    document.getElementById("slider_value").innerHTML = z; 
  }