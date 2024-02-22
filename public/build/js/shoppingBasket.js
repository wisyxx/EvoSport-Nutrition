function startApp(){addProductToBasketBtn(),removeProductFromBasketBtn()}function addProductToBasketBtn(){const t=document.querySelector(".basket-add");t&&t.addEventListener("click",()=>{addProductToBasket()})}function removeProductFromBasketBtn(){document.querySelectorAll(".delete-button").forEach(t=>{t.addEventListener("click",()=>{removeProductFromBasket()})})}async function addProductToBasket(){const t=new FormData,e=document.querySelector(".user-id").dataset.userid,o=document.querySelector(".product").dataset.productid;if(""!==e){t.append("productId",o);try{await fetch("http://localhost:3000/api/basket",{method:"POST",body:t});Swal.fire({position:"top-end",icon:"success",title:"Product added to your shopping basket",showCancelButton:!0,cancelButtonText:"Close",cancelButtonColor:"#504835",confirmButtonText:"My basket",confirmButtonColor:"#a1f25f",timer:4e3,timerProgressBar:!0,showClass:{popup:"\n      animate__animated\n      animate__faster\n      animate__backInRight\n    "},hideClass:{popup:"\n      animate__animated\n      animate__backOutRight\n    "}}).then(t=>{t.isConfirmed&&(location="http://localhost:3000/account#shopping-basket")})}catch(t){Swal.fire({title:"Something went wrong...",text:"Try again later",icon:"error"}).then(()=>{location.reload()})}}else Swal.fire({title:"You're not logged in!",icon:"warning",showCancelButton:!0,cancelButtonText:"Close",cancelButtonColor:"#504835",confirmButtonText:"Log in",confirmButtonColor:"#a1f25f"}).then(t=>{t.isConfirmed&&(location="http://localhost:3000/login")})}async function removeProductFromBasket(){const t=new FormData,e=document.querySelector(".delete-button").dataset.basketitemid;t.append("id",e);try{await fetch("http://localhost:3000/api/basket/delete",{method:"POST",body:t});Swal.fire({position:"top-end",icon:"success",title:"Product removed from your basket",confirmButtonText:"Close",confirmButtonColor:"#a1f25f",showClass:{popup:"\n      animate__animated\n      animate__faster\n      animate__backInRight\n    "},hideClass:{popup:"\n      animate__animated\n      animate__backOutRight\n    "}}).then(()=>{location.reload()})}catch(t){Swal.fire({title:"Something went wrong...",text:"Try again later",icon:"error"}).then(()=>{location.reload()})}}window.addEventListener("DOMContentLoaded",()=>{startApp()});