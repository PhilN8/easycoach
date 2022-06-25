const route = document.getElementById("route"),
  cost = document.getElementById("cost"),
  totalcost = document.getElementById("total-cost"),
  seats = document.getElementById("seats"),
  dep_date = document.getElementById("dep-date");

// Selecting Seats
const seatDiagram = document.querySelector("#seatsDiagram"),
  seatCost = document.querySelector("#seatCost"),
  chosenSeats = document.querySelector("#chosenSeats");
let numberOfSeats = 0;
var seatsChosen = [];

const updateCostUp = () => {
  numberOfSeats++;
  seatCost.innerHTML = numberOfSeats * cost.value;
};

const updateCostDown = () => {
  numberOfSeats--;
  seatCost.innerHTML = numberOfSeats * cost.value;
};

const displayTable = () => {
  if (chosenSeats.rows.length == 0) {
    document.querySelector(".selected__table").style.display = "none";
    numberOfSeats = 0;
    seatsChosen = [];
  } else document.querySelector(".selected__table").style.display = "table";
};

const chooseSeat = (evt) => {
  if (!evt.target.className.includes("selected")) {
    evt.target.classList.toggle("selected");
    updateCostUp();
    seatsChosen.push(evt.target.innerHTML);
    // console.log(seatsChosen)
    $("#chosenSeats").append(
      `<tr id="seat_${evt.target.innerHTML}"><td>${evt.target.innerHTML}</td><td>${cost.value}</td><td><button class="selected__table--btn" onclick="$('#seat_${evt.target.innerHTML}').remove();$('#seat-${evt.target.innerHTML}').removeClass('selected');updateCostDown(); displayTable();">Remove</button></td>`
    );
  } else {
    seatsChosen.splice(seatsChosen.indexOf(evt.target.innerHTML), 1);
    // console.log(seatsChosen)
    $(`#seat_${evt.target.innerHTML}`).remove();
    $(`#seat-${evt.target.innerHTML}`).removeClass("selected");
    updateCostDown();
  }

  displayTable();
};

const allSeats = document.querySelectorAll(
  "#seatsDiagram td:not(.space, .notAvailable)"
);
allSeats.forEach((link) => {
  link.addEventListener("click", chooseSeat);
});

const CheckBookedSeats = () => {
  $.ajax({
    url: "backend/seats.php",
    method: "POST",
    data: {
      route: route.value,
      dep_date: dep_date.value,
    },
    success: (result) => {
      let respond = JSON.parse(result);

      respond.forEach((num) => {
        document.getElementById(`seat-${num}`).classList.add("notAvailable");
      });
    },
    error: () => {},
  });
};

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
        numberOfSeats = 0;
        seatsChosen = [];
        $(".selected__table").fadeOut();
        allSeats.forEach((element) => {
          if (element.className.includes("selected"))
            element.classList.remove("selected");
        });

        CheckBookedSeats();
      }
    },
    error: () => {
      cost.value = 0;
    },
  });
};

const changeCost = () => (totalcost.value = cost.value * seats.value);

route.addEventListener("change", CheckCost);

function SetMinDate() {
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);

  var today = now.getFullYear() + "-" + month + "-" + day;

  $("#dep-date").val(today);
  $("#dep-date").attr("min", today);
}

$(document).ready(() => {
  CheckCost();
  SetMinDate();
  CheckBookedSeats();
});

const ModalMenu = () => {
  // Get the modal
  var modal = document.getElementById("myModal"),
    btn = document.getElementById("myBtn"),
    closeBtn = document.querySelector(".modal__header--close");

  btn.addEventListener("click", () => (modal.style.display = "block"));
  closeBtn.addEventListener("click", () => (modal.style.display = "none"));
  // span.onclick = () => (modal.style.display = "none");
  // When the user clicks anywhere  outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
};

ModalMenu();

const bookTicket = () => {
  $("#error-msg").hide();

  var fname = $("#fname").val().trim();
  var lname = $("#lname").val().trim();
  var tel_no = $("#tel-no").val().trim();
  var id_no = $("#id-no").val().trim();
  var cost = $("#cost").val().trim();
  var route = $("#route").val().trim();
  var dep_date = $("#dep-date").val();
  var totalCost = $("#seatCost").text();

  if (fname == "" || tel_no == "" || id_no == "") {
    $(".error__msg--text").text("Fill in the required details");
    $("#error-msg").show().delay(5000).fadeOut();

    if (fname == "") {
      $("#fname").focus();
      $("#fname").scrollIntoView();
    }

    if (tel_no == "") {
      $("#tel-no").focus();
      $("#tel-no").scrollIntoView();
    }

    if (id_no == "") {
      $("#id-no").focus();
      $("#id-no").scrollIntoView();
    }

    return;
  }

  if (seatsChosen.length == 0) {
    $(".error__msg--text").text("No Seats Chosen");
    $("#error-msg").show().delay(5000).fadeOut();
    return;
  }

  $.ajax({
    method: "POST",
    url: "backend/book_ticket.php",
    data: {
      fname: fname,
      lname: lname,
      id_no: id_no,
      tel_no: tel_no,
      cost: cost,
      total_cost: totalCost,
      route: route,
      seats: seatsChosen ?? [],
      dep_date: dep_date,
      "book-ticket": true,
    },
    success: (result) => {
      var resp = JSON.parse(result);
      if (resp.message == 1)
        window.location.href = "redirect.php?id=" + resp.id;
      else {
        $(".error__msg--text").text("Error");
        $("#error-msg").show().delay(5000).fadeOut();
      }
    },
  });
};

$("#book-ticket").on("click", bookTicket);
