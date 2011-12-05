function show(id){
  var elements = id.split(";");
  for (var i=0;i<elements.length;i++){
    if (elements[i] != ""){
      el = document.getElementById(elements[i]);
      el.style.visibility = "visible";
    }
  }
}

function hide(id){
  var elements = id.split(";");
  for (var i=0;i<elements.length;i++){
    if (elements[i] != ""){
      el = document.getElementById(elements[i]);
      el.style.visibility = "hidden";
    }
  }
}

function showIds(variable,delimitor){
  var elements = variable.split(delimitor);
  //alert(variable);
  for (var i=0;i<elements.length;i++){
    document.getElementById(elements[i]).style.visibility = "visible";
    document.getElementById(elements[i]).style.display = "block";
  }
}

function hideIds(variable,delimitor){
  var elements = variable.split(delimitor);
  //alert(variable);
  for (var i=0;i<elements.length;i++){
    document.getElementById(elements[i]).style.visibility = "collapse";
  }
}

function test(){
  alert("test function has been fired!!!");
}