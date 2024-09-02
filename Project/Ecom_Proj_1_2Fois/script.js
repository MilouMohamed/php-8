console.log("22 222 2222");

// document.onload=function() {
window.addEventListener("load", () => {
  var rang = document.querySelector("input[type='range']");

  if (rang) {
    label = rang.parentElement.querySelector("label");

    rang.addEventListener("change", () => {
      label.innerHTML = "Disc :" + rang.value;
      console.log("55 66 66");
    });
    console.log(rang);
  }
  /*********************************** */

  var b_plus = document.querySelectorAll(".plus_1"),
    b_moins = document.querySelectorAll(".moin_1"),
    in_txts = document.querySelectorAll(".inpt-val");

  console.log(in_txts);
  console.log(b_plus);
  console.log(b_moins);

  b_plus.forEach((btn_p) => {
    btn_p.addEventListener("click", () => {
      console.log("Plus Btn");
      var txt = btn_p.parentElement.querySelector(".inpt-val");
      txt.value = add_moin("+", txt.value);
    });
  });

  b_moins.forEach((btn_m) => {
    btn_m.addEventListener("click", () => {
      console.log("Moin Btn");

      var txt = btn_m.parentElement.querySelector(".inpt-val");
      txt.value = add_moin("-", txt.value);
    });
  });

  console.log("fuuu");

  function add_moin(op, nbr) {
    if (nbr == 0 && op == "-") return 0;

    switch (op) {
      case "+": {
        return ++nbr;
      }
      case "-": {
        return --nbr;
      }
      default: {
        return 0;
      }
    }
  }
});
// };
