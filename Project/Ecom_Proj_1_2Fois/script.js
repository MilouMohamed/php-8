
console.log("11111111");

window.onload=function() {

 var rang= document.querySelector("input[type='range']");
 
label=rang.parentElement.querySelector("label");

rang.addEventListener('change',()=>{ 
 
label.innerHTML="Disc :"+rang.value;
})

};