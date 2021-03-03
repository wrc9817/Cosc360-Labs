window.addEventListener('load',function(){
  document.body.querySelectorAll('*').forEach(function(node){
    if(node.nodeType != Node.TEXT_NODE){
      var tag = node.tagName;
      var child = document.createElement("p");
      child.classList.add("hoverNode");
      child.innerHTML = tag;
      node.appendChild(child);
      setStyle(child);
      child.addEventListener('click', function(){
        alert("TagName: " + tag + " ID: " + node.id + " InnerHTML: "+ node.innerHTML);
      });
    }
  });
})

function setStyle(e){
  e.style.border = "solid black";
  e.style.borderWidth = "1px";
  e.style.display = "inline";
  e.style.backgroundColor = "yellow";
  e.style.width = "min-content";
}
