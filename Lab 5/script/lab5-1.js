window.addEventListener('load', function(){
  var main = document.getElementsByTagName('form')[0];
  var title = document.getElementsByName("title")[0];
  var desc = document.getElementsByName("description")[0];
  var license = document.getElementsByName("accept")[0];
  main.addEventListener('submit', function(e){
    if(title.value == "" || desc.value =="" ||license.checked == false){
    if(title.value == ""){
      highlight(title);
    }
    if(desc.value ==""){
      highlight(desc);
    }
    if(license.checked == false){
      highlight(license);
    }
    e.preventDefault();
    alert("please fill the required fields");
  }
  });
  title.addEventListener('change',function(){
    if(title !=""){
      cleanHighlight(title);
    }
  });
  desc.addEventListener('change',function(){
    if(desc != ""){
      cleanHighlight(desc);
    }
  });
  license.addEventListener('change',function(){
    if(license == true){
      cleanHighlight(license);
    }
  });
  
});

function highlight(e){
  e.style.backgroundColor = "red";
}
function cleanHighlight(e){
  e.style.backgroundColor = "white";
}
