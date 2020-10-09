
$( window ).unload(function() {
  return "Handler for .unload() called.";
});

  

  var icon2 = document.createElement("i");
  var icon = document.createElement("i");  

document.querySelectorAll('.productsMorille .add_to_cart_button, .single_add_to_cart_button').forEach(btn=>{
  btn.addEventListener('click',event =>{

    $( "#popUp" ).fadeIn(); 
    setTimeout(function() {
      2000;
        $('#popUp').fadeOut();
      }, 4000); 
    
        icon2.remove();
        btn.style.opacity = '0.5';
        
        icon.className = "fas fa-sync-alt fa-spin";
        btn.appendChild(icon);

      setTimeout(function(){
        btn.style.opacity = '1';
        icon.remove();
      },2000);

      setTimeout(function(){
        icon2.className = "fas fa-check";
    
        btn.appendChild(icon2);
      },2000);
    
    
  })
})
    document.querySelectorAll('.productsForfaits .add_to_cart_button,type-product').forEach(item => {
      item.addEventListener('click', event => {
        $( "#popUp" ).fadeIn(); 
        setTimeout(function() {
          2000;
            $('#popUp').fadeOut();
          }, 4000); 
        
        item.style.opacity = '0.5';
        var icon = document.createElement("i");
        icon.className = "fas fa-sync-alt fa-spin";
        
        item.appendChild(icon);
     
        setTimeout(function(){
        var x, i;
  x = document.querySelectorAll(".added_to_cart");
  for (i = 0; i < x.length; i++) {
    x[i].style.display= "block";
  }
        }, 2000);
        setTimeout(function(){ 
        
          item.style.display='none';
          
        }, 2000);
        

        setTimeout(function(){
        var x, i;
  x = document.querySelectorAll(".added_to_cart");
  for (i = 0; i < x.length; i++) {
    x[i].style.display= "block";
  }
        }, 2000);
        setTimeout(function(){ 
        
          item.style.display='none';
          
        }, 2000);
         
      });
  });
  