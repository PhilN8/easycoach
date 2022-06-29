const purchaseInfo = () => {
  var id = new URL(window.location.href).searchParams.get("id");

  $.ajax({
    url: "backend/purchases.php",
    data: {
      purchase_id: id,
    },
    method: "POST",
    success: (result) => {
      var resp = JSON.parse(result);
      var seats = "";

      resp[1].forEach((element, index) => {
        if (index == resp[1].length - 1) seats += `${element.seat_number}`;
        else seats += `${element.seat_number}, `;
      });

      $("#name").text(`${resp[0].first_name} ${resp[0].last_name}`);
      $("#route").text(`${resp[0].departure} - ${resp[0].destination}`);
      $("#date").text(`${resp[0].departure_date}`);
      $("#seats").text(`${seats}`);
      $("#total-cost").text(resp[0].total_cost);
      $("#id_no").text(resp[0].id_number);
      $("#tel_no").text(resp[0].tel_no);

      $(".info__table").show();
    },
  });
};

$(document).ready(() => {
  purchaseInfo();
});
