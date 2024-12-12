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
 
      // Pour Afficher Au depart
      cls.classList.remove("text-primary");
      ful.classList.add("text-primary");
      hideShowAll.forEach((elemnt) => {
        elemnt.style.height = "max-content";
      });// Pour Afficher Au depart

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
// Buttons Childs categories 

var div_btns_chils=document.querySelectorAll(".children-cat");


console.log(div_btns_chils);
div_btns_chils.forEach(btn_delet => {
  
  btn_delet.addEventListener("mouseenter",()=>{
    // btn_delet.children().querySelector("a");
    btn_delet.lastElementChild.classList.remove("d-none"); 
    const child = btn_delet.lastElementChild;
    child.classList.remove("opacity-0");
    child.style.opacity = "1";
    child.style.pointerEvents = "auto";
    child.style.transition = "all .5s";
  });

  btn_delet.addEventListener("mouseleave",()=>{
    // btn_delet.children().querySelector("a");
    btn_delet.lastElementChild.classList.remove("d-none"); 
    const child = btn_delet.lastElementChild; 
    child.style.opacity = "0";
    child.style.pointerEvents = "none"; 

  });


});


// END Buttons Childs categories 


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

  /*****FRONETEND************ */

  var tabsLogin = document.querySelector(".page-login");

  if (tabsLogin) {
    var login = tabsLogin.querySelector('[data-formId="LOGIN"]');
    var signup = tabsLogin.querySelector('[data-formId="SIGNUP"]');

    if (login && signup) {
      login.addEventListener("click", () => {
        login.classList.add("active");
        signup.classList.remove("active");
        tabsLogin.querySelector("#SIGNUP").classList.add("d-none");
        tabsLogin.querySelector("#LOGIN").classList.remove("d-none");
      });

      signup.addEventListener("click", () => {
        signup.classList.add("active");
        login.classList.remove("active");
        tabsLogin.querySelector("#SIGNUP").classList.remove("d-none");
        tabsLogin.querySelector("#LOGIN").classList.add("d-none");
      });
    }
  }

  //Start Live Add card

  var card_Item = document.querySelector(".live-view  .box-item");

  if (card_Item) {
    var inp_name = document.querySelector(".live-input input[name='Name']");

    inp_name.addEventListener("keyup", () => {
      card_Item.querySelector("h3").innerText = inp_name.value;
    });

    var inp_desc = document.querySelector(
      ".live-input textarea[name='DescriptItem']"
    );

    inp_desc.addEventListener("keyup", () => {
      card_Item.querySelector("p").innerText = inp_desc.value;
    });

    var inp_pric = document.querySelector(".live-input input[name='Price']");

    inp_pric.addEventListener("keyup", () => {
      card_Item.querySelector(".price-tag").innerText = inp_pric.value;
    });
  }
 


  //End Live Add card
  console.log("is End Of Add crd");
};
