function startApp(){clickImgInput(),deleteProfileImage()}function clickImgInput(){const e=document.querySelector(".img-input");document.querySelector(".image-upload").addEventListener("click",()=>{e.click()})}async function deleteProfileImage(){document.querySelector(".delete-profile-image").addEventListener("click",()=>{deletePfpImageAPI()})}async function deletePfpImageAPI(){try{(await fetch("http://localhost:3000/api/images/delete-pfp",{method:"POST"})).ok&&Swal.fire({title:"Image removed!",icon:"success",confirmButtonText:"Ok",confirmButtonColor:"#a1f25f"}).then(()=>{location="http://localhost:3000/account"})}catch(e){Swal.fire({title:"Something went wrong...",text:"Try again later",icon:"error"}).then(()=>{location.reload()})}}window.addEventListener("DOMContentLoaded",()=>{startApp()});