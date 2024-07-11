

//   <button   class="btn btn-catg btn-moins" id="btn-m<?= $id_p   ?>" >-</button>
//   <input type="text" name="id"  value="<?= $id_p   ?>">
// <input type="number" class="counter" id="qtt<?= $id_p   ?>" min="0"  value="0">
//   <button class="btn btn-catg  btn-plus" id="btn-p<?= $id_p   ?>">+</button>

window.addEventListener("load", function () {

  let buttons = document.querySelectorAll("  .btn-catg"); 

//   console.log(buttons.length);

  for (var btn of buttons) {

    btn.addEventListener("click", (e) => { 

          e.preventDefault();

      let inpt_qtt = e.target.parentElement.querySelector(".counter");
      let vall = parseInt(inpt_qtt.value); 
      
    //   console.log(inpt_qtt.dataset.idp);

      if (e.target.classList.contains("btn-plus")) {
        vall++; 
      }
      else if (e.target.classList.contains("btn-moins")) {
        vall = vall > 0 ? --vall : 0; 
      }

      inpt_qtt.value = vall;
    });
  }
});
