toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: "toast-top-right",
  preventDuplicates: true,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "5000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};

let routeID = 0;

const menuToggle = document.querySelector(".menu-toggle");
const sidebar = document.querySelector(".sidebar");

menuToggle.addEventListener("click", () => {
  menuToggle.classList.toggle("is-active");
  sidebar.classList.toggle("is-active");
});

const openSection = (section) => {
  var x;
  x = document.getElementsByClassName("admin-section");
  for (i = 0; i < x.length; i++) x[i].style.display = "none";

  document
    .querySelectorAll(".menu-item")
    .forEach((l) => l.classList.remove("active"));

  menuToggle.classList.remove("is-active");
  sidebar.classList.remove("is-active");
  event.currentTarget.className += " active";

  document.getElementById(section).style.display = "block";
};

const changeOpt = () => {
  var option = $("#edit-option").val();

  if (option == "gender") {
    $("#gender-option").prop("disabled", false);
    $("#new-val").prop("disabled", true);
  } else {
    $("#gender-option").prop("disabled", true);
    $("#new-val").prop("disabled", false);
  }
};

const allRoutes = () => {
  $.ajax({
    url: "backend/routes.php",
    method: "POST",
    data: { routes: true },
    success: (result) => {
      var resp = JSON.parse(result);
      $("#routeTable").empty();

      resp.forEach((el) => {
        $("#routeTable").append(
          `<tr><td>${el.departure}</td><td>${el.destination}</td><td>${el.cost}</td><td><button class="routes__edit--btn" onclick="openModal(${el.route_id})">Edit</button></td></tr>`
        );
      });
    },
  });
};

const addRoute = () => {
  var departure = $("#departure").val().trim();
  var destination = $("#destination").val().trim();
  var price = $("#price").val().trim();

  if (price == "") {
    toastr.error("Price is required");
    $("#price").focus();
    return;
  }

  if (isNaN(price)) {
    toastr.error(`${price} is not a Valid Price`, "Invalid Number");
    $("#price").val("").focus();
    return;
  }

  if (price < 1000) {
    toastr.warning("Price Less Than 1000");
    $("#price").val("").focus();
    return;
  }

  if (departure == "" || destination == "") {
    toastr.error("Fill in the required details", "Missing Info");

    if (destination == "") $("#destination").focus();
    if (departure == "") $("#departure").focus();
    return;
  }

  departure.toLowerCase().replace(/\b[a-z]/g, function (letter) {
    return letter.toUpperCase();
  });

  destination.toLowerCase().replace(/\b[a-z]/g, function (letter) {
    return letter.toUpperCase();
  });

  $.ajax({
    method: "POST",
    url: "backend/routes.php",
    data: {
      destination: destination,
      departure: departure,
      price: price,
      add_route: true,
    },
    success: (result) => {
      var resp = JSON.parse(result);

      if (resp.message == 1) toastr.warning("Route Already Exists");

      if (resp.message == 2) {
        toastr.success("Route Added Successfully");
        $("#routeTable").empty();
        resp[0].forEach((el) => {
          $("#routeTable").append(
            `<tr><td>${el.departure}</td><td>${el.destination}</td><td>${el.cost}</td><td><button class="routes__edit--btn" onclick="openModal(${el.route_id})">Edit</button></td></tr>`
          );
        });
      }

      if (resp.message == 3) toastr.error("Try again later", "Error");
    },
    error: () => toastr.error("Try again later", "Error"),
  });
};

var modal = document.getElementById("myModal");

const openModal = (editID) => {
  $("#new-cost").val("");
  modal.style.display = "block";
  routeID = editID;
};

const closeModal = () => (modal.style.display = "none");

const ModalMenu = () => {
  var closeBtn = document.querySelector(".modal__header--close");

  closeBtn.addEventListener("click", closeModal);
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
};

ModalMenu();

// document
//   .querySelectorAll(".routes__edit--btn")
//   .forEach((el) => el.addEventListener("click", openModal));

const editCost = () => {
  var newCost = $("#new-cost").val();

  if (newCost < 1000) {
    toastr.warning("Cost Less Than 1000");
    $("#new-cost").focus();
    return;
  }

  $.ajax({
    url: "backend/routes.php",
    method: "POST",
    data: {
      new_cost: newCost,
      route: routeID,
    },
    success: (result) => {
      var resp = JSON.parse(result);

      if (resp.message == 1) {
        allRoutes();
        modal.style.display = "none";
        toastr.success("Cost edited successfully");
      } else toastr.error("Try again later", "Error");
    },
    error: () => toastr.error("Try again later", "Failed"),
  });
};

// document.querySelector("#submitBtn").addEventListener("click", editCost);
$("#submitBtn").on("click", editCost);
document.querySelector("#cancelBtn").addEventListener("click", closeModal);
