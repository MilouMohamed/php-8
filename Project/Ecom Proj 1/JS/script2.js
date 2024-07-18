console.log("file ");

//   <button   class="btn btn-catg btn-moins" id="btn-m<?= $id_p   ?>" >-</button>
//   <input type="text" name="id"  value="<?= $id_p   ?>">
//   <input type="number" class="counter" id="qtt<?= $id_p   ?>" min="0"  value="0">
//   <button class="btn btn-catg  btn-plus" id="btn-p<?= $id_p   ?>">+</button>

  window.addEventListener("load",function(){

let buttons = document.getElementsByClassName("btn-catg");

console.log(buttons.length);
console.log("-------------");

for (var btn of buttons) {
  btn_nm = document.getElementById(btn.id);

  btn_nm.onclick = (e) => {
    let cntr = e.target.parentNode.getElementsByClassName("counter")[0];

    let vall = parseInt(cntr.value);

    console.log(typeof vall);
    if (e.target.classList.contains("btn-moins")) {
      vall = vall > 0 ? --vall : 0;
    } else if (e.target.classList.contains("btn-plus")) {
      vall++;
    }

    cntr.value = vall;
  };
}

})
