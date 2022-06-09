const navbar = () => {
  const hamburger = document.querySelector(".hamburger");
  const navList = document.querySelector(".nav__list");
  const navLinks = document.querySelectorAll(".nav__link");

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      hamburger.classList.remove("is-active");
      navList.classList.remove("nav-visible");

      link.style.animation = "";
    });
  });

  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("is-active");
    navList.classList.toggle("nav-visible");

    navLinks.forEach((link, index) => {
      link.style.animation = `navLinkFade 0.3s ease forwards ${
        index / 7 + 0.5
      }s`;
    });
  });
};

navbar();

const openSection = (section) => {
  var x;
  x = document.getElementsByClassName("home-section");
  for (i = 0; i < x.length; i++) x[i].style.display = "none";

  document.getElementById(section).style.display = "block";
};

const changeOption = () => {
  var option = $("#edit-option").val();

  if (option == "gender") {
    $("#gender").prop("disabled", false);
    $("#new-value").prop("disabled", true);
  } else {
    $("#gender").prop("disabled", true);
    $("#new-value").prop("disabled", false);
  }
};

const route = document.getElementById("route");
const cost = document.getElementById("cost");

const CheckCost = () => {
  $.ajax({
    url: "backend/routes.php",
    method: "POST",
    data: {
      route_id: route.value,
    },
    success: function (result) {
      cost.value = JSON.parse(result).cost;
    },
  });
};
route.addEventListener("change", CheckCost);

function SetMinDate() {
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);

  var today = now.getFullYear() + "-" + month + "-" + day;

  $("#dep_date").val(today);
  $("#dep_date").attr("min", today);
}

$(document).ready(function () {
  CheckCost();
  SetMinDate();
});
