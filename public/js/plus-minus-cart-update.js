function updateCart(id)
{
    $.get('http://127.0.0.1:8000/update-bar', function(response){ 
      console.log(response.cart);
      for( cart in response.cart)
      {
      	  $qty= 
      }
});

}
