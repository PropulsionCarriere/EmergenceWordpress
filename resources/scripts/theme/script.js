// $(document).ready(function(){
//     $(".add_to_cart_button").click(function(){
      
//       $( "#popUp" ).fadeIn(); 
//    setTimeout(function() {
//       $( "#popUp" ).hide();
//     }, 20000);
//     $('#popUp').fadeOut();
//     });

//    //  $(".productsForfaits .add_to_cart_button").click(function(){
//    //     $( this ).replaceWith( $( this ).text("Voir le panier") );
//    //  $(".productsForfaits .add_to_cart_button").attr("href","http://localhost:8888/wordpress/cart-page/");

//    });

    

//   });

// document.getElementsByClassName("productsForfaits add_to_cart_button").addEventListener("click", function(){
//    document.getElementsByClassName("productsForfaits add_to_cart_button").innerHTML = "Voir le panier";
//  });


// document.querySelectorAll('.productsForfaits .add_to_cart_button').forEach(item => {
//    item.addEventListener('click', event => {
//    document.querySelector('.productsForfaits .add_to_cart_button').innerHTML="Voir le panier";
//      console.log(document.querySelector('.productsForfaits .add_to_cart_button'));
//    });
//  });
const buttons = document.querySelectorAll(".productsForfaits .add_to_cart_button")
for (const button of buttons) {
  button.addEventListener('click', function(event) {
   console.log(document.querySelector('.productsForfaits .add_to_cart_button'));
  })
}
