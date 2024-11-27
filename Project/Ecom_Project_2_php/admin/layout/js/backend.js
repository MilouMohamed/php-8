console.log("backend 22 ");

window.onload = () => {
  console.log("Is Load");

  var inputs_requerd = document.querySelectorAll(
    "input.form-control[required]"
  );

  inputs_requerd.forEach((input_requerd) => {
    var span_etoile = document.createElement("span");
    span_etoile.className = "my-etoile";
    span_etoile.innerHTML = "*";
    // input_requerd.insertAdjacentElement("afterend",span_etoile);
    input_requerd.after(span_etoile);
  });

  var show_pass = document.querySelector(".password .password-show");
  if (show_pass != null) {
    show_pass.addEventListener("mouseover", () => {
      show_pass.parentElement
        .querySelector("input")
        .setAttribute("type", "text");
    });

    show_pass.addEventListener("mouseout", () => {
      show_pass.parentElement
        .querySelector("input")
        .setAttribute("type", "password");
    });
  }

  //Confirme For delette

  var btns_delete = document.querySelectorAll(".confirm");

  btns_delete.forEach((btn_delt) => {
    btn_delt.addEventListener("click", (event) => {
      if (!confirm("You wantte To delete This ")) {
        event.preventDefault();
      }
    });
  });

  var ful_clsc = document.querySelector(".categores-manage .ful-clsc");

  console.log(ful_clsc);

  var ful = ful_clsc.querySelector("span[data-name='full']");
  var cls = ful_clsc.querySelector("span[data-name='classic']");

  ful.addEventListener("click", (event) => {
    console.log("tes Oui ful");
  });

  cls.addEventListener("click", (event) => {
    console.log("tes Oui cls");
  });
};
console.log("oii");
