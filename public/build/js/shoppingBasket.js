function startApp(){addProductBtn()}function addProductBtn(){document.querySelector(".basket-add").addEventListener("click",()=>{addProductToBasket()})}async function addProductToBasket(){const t=new FormData,o=document.querySelector(".user-id").dataset.userid,e=document.querySelector(".product").dataset.productid;if(""!==o){t.append("productId",e);try{await fetch("http://localhost:3000/api/basket",{method:"POST",body:t});Swal.fire({position:"top-end",icon:"success",title:"Product added to your shopping basket",showCancelButton:!0,cancelButtonText:"Close",cancelButtonColor:"#504835",confirmButtonText:"My basket",confirmButtonColor:"#a1f25f",timer:4e3,timerProgressBar:!0,progressBar:!0,showClass:{popup:"\n      animate__animated\n      animate__faster\n      animate__backInRight\n    "},hideClass:{popup:"\n      animate__animated\n      animate__backOutRight\n    "}}).then(t=>{t.isConfirmed&&(location="http://localhost:3000/account#shopping-basket")})}catch(t){Swal.fire({title:"Something went wrong...",text:"Try again later",icon:"error"}).then(()=>{location.reload()})}}else Swal.fire({title:"You're not logged in!",icon:"warning",showCancelButton:!0,cancelButtonText:"Close",cancelButtonColor:"#504835",confirmButtonText:"Log in",confirmButtonColor:"#a1f25f"}).then(t=>{t.isConfirmed&&(location="http://localhost:3000/login")})}window.addEventListener("DOMContentLoaded",()=>{startApp()});