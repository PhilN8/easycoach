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

const sendComment = () => {
  var fname = $("#fname").val().trim();
  var email = $("#email").val().trim();
  var comment = $("#comment").val().trim();

  if (fname == "" || email == "" || comment == "") {
    toastr.error("Fill in the required details", "Missing Info");

    if (comment == "") document.querySelector("#comment").focus();
    if (email == "") document.querySelector("#email").focus();
    if (fname == "") document.querySelector("#fname").focus();

    console.log(fname, email, comment);
    return;
  }

  var emailRegex =
    /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

  if (!email.match(emailRegex)) {
    toastr.error("Invalid email");
    document.querySelector("#email").focus();
    return;
  }

  toastr.success("Thank you for your feedback", "Submission Complete");
  $("#fname").val("");
  $("#email").val("");
  $("#comment").val("");
};
