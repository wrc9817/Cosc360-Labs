

var main = document.getElementById('mainForm');
main.addEventListener('submit', function(e){
  var title = document.getElementsByName('title').value;
  var desc = document.getElementsByName('description').value;
  var license = document.getElementsByName('accept').checked;
  if(title == "" || desc == "" || license == false){
    alert("please fill the required fields");
    e.preventDefault();
  }
});
