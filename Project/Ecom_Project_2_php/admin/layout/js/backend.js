console.log("backend 22 ");

window.onload = () => {
  // console.log("Is Load");

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

  /****START******** HIDE SHOW ELEMENTS  */

  /* cardsBody = document.querySelectorAll(".categores-manage .card-body");

  cardsBody.forEach((card_item) => {
    card_item.addEventListener("mouseenter", () => {
      showHide = card_item.querySelector(".hide-show"); 
      showHide.style.height = "max-content"; 
    });

   card_item.addEventListener("mouseleave", () => {       
      showHide = card_item.querySelector(".hide-show"); 
      showHide.style.height = "0";  
    });


  });*/

  var ful_clsc = document.querySelector(".categores-manage .ful-clsc");

  // console.log(ful_clsc);
  if (ful_clsc != null) {
    var ful = ful_clsc.querySelector("span[data-name='full']");
    var cls = ful_clsc.querySelector("span[data-name='classic']");

    hideShowAll =
      ful_clsc.parentElement.parentElement.querySelectorAll(".hide-show ");

    ful.addEventListener("click", (event) => {
      ful.classList.add("text-primary");
      cls.classList.remove("text-primary");

      hideShowAll.forEach((elemnt) => {
        elemnt.style.height = "max-content";
      });
    });

    cls.addEventListener("click", (event) => {
      ful.classList.remove("text-primary");
      cls.classList.add("text-primary");

      hideShowAll.forEach((elemnt) => {
        elemnt.style.height = "0";
      });
    });
  }

  /****END ******** HIDE SHOW ELEMENTS  */

  /* Button Show hide Liste Items Users Dashboard   */

  var btns_plus_moin = document.querySelectorAll(".show-hide-list");
  btns_plus_moin.forEach((btn_plus_moin) => {
    var div_plus_moin = btn_plus_moin.parentElement.nextElementSibling;

    btn_plus_moin.addEventListener("click", () => {
      if (div_plus_moin.classList.contains("d-block")) {
        btn_plus_moin.innerHTML = "<i class='fa fa-plus'></i>";
        div_plus_moin.classList.add("d-none");
        div_plus_moin.classList.remove("d-block");
      } else {
        div_plus_moin.classList.add("d-block");
        div_plus_moin.classList.remove("d-none");
        btn_plus_moin.innerHTML = "<i class='fa fa-minus'></i>";
      }
    });
  });
};
