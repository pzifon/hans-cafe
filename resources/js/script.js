<script type="text/javascript">
	  var counter = 1;
	  setInterval(function(){
	  document.getElementById('radio' + counter).checked = true;
	  counter++;
	  if(counter > 4){
	  counter = 1;
	  }
	 }, 5000);
	 
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</script>	 
	  