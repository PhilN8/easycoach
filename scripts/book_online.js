// import dialogPolyfill from "./node_modules/dialog-polyfill/dist/dialog-polyfill.esm.js";
const route = document.getElementById("route"),
  cost = document.getElementById("cost"),
  totalcost = document.getElementById("total-cost"),
  seats = document.getElementById("seats");
// dialogPolyfill = require('dia')

const CheckCost = () => {
  $.ajax({
    url: "backend/routes.php",
    method: "POST",
    data: {
      route_id: route.value,
    },
    success: (result) => {
      let respond = JSON.parse(result);
      cost.value = respond.cost ?? 0;

      if (chosenSeats.rows.length != 0) {
        $("#chosenSeats").empty();
        document.querySelector(".selected__table").style.display = "none";
        allSeats.forEach((element) => {
          if (element.className.includes("selected"))
            element.classList.remove("selected");
        });
      }
      // totalcost.value = cost.value * seats.value;
    },
    error: () => {
      cost.value = 0;
    },
  });
};

const changeCost = () => (totalcost.value = cost.value * seats.value);

route.addEventListener("change", CheckCost);

const modal = document.querySelector("#modal");
// closeModal = document.querySelector(".closeModal");

// route.addEventListener("focus", () => {
//   modal.showModal();
// });

// seats.addEventListener(
//   "input",
//   () => (totalcost.value = cost.value * seats.value)
// );

function SetMinDate() {
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);

  var today = now.getFullYear() + "-" + month + "-" + day;
  // var max = ("0" + (now.getDate() + 7)).slice(-2);
  // console.log(max);

  $("#dep-date").val(today);
  $("#dep-date").attr("min", today);
}

$(document).ready(() => {
  CheckCost();
  SetMinDate();
});
