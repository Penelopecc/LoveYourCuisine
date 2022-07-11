function lancement()
{
  var liens=document.getElementsByClassName("liens");
  for (var i=0 ; i<liens.length;i++)
  {
    liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
    liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
  }
}
