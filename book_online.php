<?php
include_once "backend/routes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Online | EasyCoach Ke</title>

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/book_online.css">
    <link rel="stylesheet" href="node_modules/dialog-polyfill/dist/dialog-polyfill.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/book_online.js" async></script>
    <script src="node_modules/dialog-polyfill/dist/dialog-polyfill.js" async></script>
    <link rel="icon" href="img/title.jpeg" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="brand">
            <h1 class="brand__title">
                <a href="index.html" class="brand__title--link">EasyCoach Ke</a>
            </h1>
        </div>

        <nav class="navbar">
            <ul class="nav__list">
                <li class="nav__item"><a href="#" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="about-us.html" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="routes.html" class="nav__link">Routes</a></li>
                <li class="nav__item"><a href="services.html" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="login.php" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>


    <main class="main">
        <div class="container">

            <!-- <section class="hero">
                <div class="hero__col">
                    <h1 class="hero__title">Book Online</h1>
                    <p class="hero__description">
                        Want to avoid queues like this at your departure point, causing you hours of delay as you travel
                        around the country? <br><br>
                        Book a Ticket online and avoid all the hassle! <br><br>
                        Add Details and Book Ticket to your Preferred
                        Destination
                    </p>
                </div>

                <div class="hero__col">
                    <img src="img/congestion.jpg" alt="picture of congested line" class="hero__img">
                </div>
            </section> -->


            <script>
                // const destination = document.querySelector('#destination'),
                //     departure = document.querySelector('#departure'),
                //     errorMsg = document.querySelector('.error__msg'),
                //     routeCheck = () => {
                //         $('.error__msg').hide();

                //         if (departure.value === destination.value) {
                //             $('.error__msg').show().text('You entered the same places');
                //             return;
                //         }

                //         $.ajax({
                //             url: 'backend/routes.php',
                //             method: 'POST',
                //             data: {
                //                 destination: destination.value,
                //                 departure: departure.value,
                //                 searchRoute: true
                //             },
                //             success: (result) => {
                //                 console.log(result)
                //             },
                //             error: () => {
                //                 console.log('Working so far...')
                //             }
                //         })
                //     }
            </script>


            <section class="book">
                <!-- <form action="backend/book_ticket.php" method="post" class="book__form"> -->
                <p class="book__form--title">Passenger Details</p>
                <div class="book__form--container">
                    <div class="book__form--box">
                        <input type="text" name="fname" id="fname" class="book__form--input" placeholder=" ">
                        <label for="fname" class="book__form--label">First Name</label>
                    </div>

                    <div class="book__form--box">
                        <input type="text" name="lname" id="lname" placeholder=" " class="book__form--input">
                        <label for="lname" class="book__form--label">Last Name</label>
                    </div>

                    <div class="book__form--box">
                        <input type="number" name="tel-no" id="tel-no" placeholder=" " class="book__form--input">
                        <label for="tel-no" class="book__form--label">Telephone No</label>
                    </div>

                    <div class="book__form--box">
                        <input type="number" name="id-no" id="id-no" placeholder=" " class="book__form--input">
                        <label for="id-no" class="book__form--label">ID Number</label>
                    </div>
                </div>

                <p class="book__form--title">Ticket Details</p>
                <div class="book__form--container">

                    <div class="book__form--box">
                        <select name="route" id="route" class="book__form--input">
                            <?php if (isset($routes)) {
                                foreach ($routes as $row) { ?>
                                    <option value="<?= $row['route_id'] ?>"><?php echo $row['departure'] . " - " . $row['destination'] ?></option>
                            <?php }
                            } ?>
                        </select>
                        <label for="route" class="book__form--label">Route</label>
                    </div>

                    <div class="book__form--box">
                        <input type="number" name="cost" id="cost" class="book__form--input" readonly>
                        <label for="cost" class="book__form--label">Cost</label>
                    </div>

                    <div class="book__form--box">
                        <input type="date" name="dep-date" id="dep-date" class="book__form--input">
                        <label for="dep-date" class="book__form--label">Departure Date</label>
                    </div>

                </div>
                <!-- <button class="book__btn" type="submit" name="book-ticket">Proceed</button> -->
                <!-- </form> -->
            </section>

            <!-- <div class="book__form--box">
                <input type="number" name="seats" id="seats" value="1" class="book__form--input" min="1" max="10">
                <label for="seats" class="book__form--label">Number of Seats</label>
            </div> -->

            <!-- <div class="book__form--box">
                <input type="number" name="total-cost" id="total-cost" class="book__form--input" readonly>
                <label for="total-cost" class="book__form--label">Total Cost</label>
            </div> -->

            <script>

            </script>

            <p class="book__form--title">Choose Seats</p>
            <section class="tables">
                <section class="tables__col">
                    <table id="seatsDiagram">
                        <tr>
                            <td id="seat-1">1</td>
                            <td id="seat-2">2</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-3">3</td>
                            <td id="seat-4">4</td>
                        </tr>
                        <tr>
                            <td id="seat-5">5</td>
                            <td id="seat-6">6</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-7">7</td>
                            <td id="seat-8">8</td>
                        </tr>
                        <tr>
                            <td id="seat-9">9</td>
                            <td id="seat-10">10</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-11">11</td>
                            <td id="seat-12">12</td>
                        </tr>
                        <tr>
                            <td id="seat-13">13</td>
                            <td id="seat-14">14</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-15">15</td>
                            <td id="seat-16">16</td>
                        </tr>
                        <tr>
                            <td id="seat-17">17</td>
                            <td id="seat-18">18</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-19">19</td>
                            <td id="seat-20">20</td>
                        </tr>
                        <tr>
                            <td id="seat-21">21</td>
                            <td id="seat-22">22</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-23">23</td>
                            <td id="seat-24">24</td>
                        </tr>
                        <tr>
                            <td id="seat-25">25</td>
                            <td id="seat-26">26</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-27">27</td>
                            <td id="seat-28">28</td>
                        </tr>
                        <tr>
                            <td id="seat-29">29</td>
                            <td id="seat-30">30</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-31">31</td>
                            <td id="seat-32">32</td>
                        </tr>
                        <tr>
                            <td id="seat-33">33</td>
                            <td id="seat-34">34</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-35">35</td>
                            <td id="seat-36">36</td>
                        </tr>
                        <tr>
                            <td id="seat-37">37</td>
                            <td id="seat-38">38</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-39">39</td>
                            <td id="seat-40">40</td>
                        </tr>
                        <tr>
                            <td id="seat-41">41</td>
                            <td id="seat-42">42</td>
                            <td id="seat-43">43</td>
                            <td id="seat-44">44</td>
                            <td id="seat-45">45</td>
                        </tr>
                    </table>
                </section>

                <section id="selectedSeats" class="selected tables__col">
                    <p class="selected__title">
                    </p>
                    <table class="selected__table animate-opacity">
                        <thead>
                            <tr>
                                <th>Seat</th>
                                <th>Fare</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="chosenSeats">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td colspan="2" id="seatCost"></td>
                            </tr>
                        </tfoot>
                    </table>
                </section>
            </section>

            <button style="margin-bottom: 1rem;" class="book__btn" type="submit" name="book-ticket" id="book-ticket">Proceed</button>

        </div>
    </main>

    <div class="error__msg" id="error-msg">
        <div class="error__msg--text"></div>
        <!-- <span class="error__msg--span">&times;</span> -->
    </div>

    <style>
        #error-msg {
            background-color: black;
            color: white;
            padding: 1em;
            max-width: 200px;

            position: sticky;
            bottom: 10vh;
            left: 80vw;
            display: none;
            z-index: 10;
        }

        .error__msg--span {
            font-size: 1.2rem;
            position: absolute;
            left: 70%;
            bottom: 50%;
            padding: 0.1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .error__msg--span:hover {
            color: black;
            background-color: white;
        }
    </style>

    <script src="scripts/nav.js"></script>
    <script>
        // Selecting Seats
        const seatDiagram = document.querySelector("#seatsDiagram"),
            seatCost = document.querySelector("#seatCost"),
            chosenSeats = document.querySelector("#chosenSeats");
        let numberOfSeats = 0;
        var seatsChosen = [];


        const updateCostUp = () => {
            numberOfSeats++;
            seatCost.innerHTML = numberOfSeats * cost.value;
        }

        const updateCostDown = () => {
            numberOfSeats--;
            seatCost.innerHTML = numberOfSeats * cost.value;
        }

        const displayTable = () => {
            if (chosenSeats.rows.length == 0)
                document.querySelector('.selected__table').style.display = 'none'
            else
                document.querySelector('.selected__table').style.display = 'table'
        }

        const chooseSeat = (evt) => {
            if (!evt.target.className.includes('selected')) {
                evt.target.classList.toggle("selected");
                updateCostUp();
                seatsChosen.push(evt.target.innerHTML)
                // console.log(seatsChosen)
                $('#chosenSeats').append(`<tr id="seat_${evt.target.innerHTML}"><td>${evt.target.innerHTML}</td><td>${cost.value}</td><td><button class="selected__table--btn" onclick="$('#seat_${evt.target.innerHTML}').remove();$('#seat-${evt.target.innerHTML}').removeClass('selected');updateCostDown(); displayTable();">Remove</button></td>`)
            } else {
                seatsChosen.splice(seatsChosen.indexOf(evt.target.innerHTML), 1);
                // console.log(seatsChosen)
                $(`#seat_${evt.target.innerHTML}`).remove();
                $(`#seat-${evt.target.innerHTML}`).removeClass('selected');
                updateCostDown();
            }

            displayTable();
        }

        const allSeats = document.querySelectorAll('#seatsDiagram td:not(.space, .notAvailable)');
        allSeats.forEach(link => {
            link.addEventListener('click', chooseSeat)
        });

        const bookTicket = () => {

            $('#error-msg').hide();

            if (seatsChosen.length == 0) {
                $('.error__msg--text').text('No Seats Chosen');
                $('#error-msg').show().delay(5000).fadeOut();
                return;
            }

            var fname = $("#fname").val().trim();
            var lname = $("#lname").val().trim();
            var tel_no = $('#tel-no').val().trim();
            var id_no = $("#id-no").val().trim();
            var cost = $("#cost").val().trim();
            var route = $("#route").val().trim();
            var dep_date = $('#dep-date').val();
            var totalCost = $('#seatCost').text();

            $.ajax({
                method: 'POST',
                url: 'backend/book_ticket.php',
                data: {
                    'fname': fname,
                    'lname': lname,
                    'id_no': id_no,
                    'tel_no': tel_no,
                    'cost': cost,
                    'total_cost': totalCost,
                    'route': route,
                    'seats': seatsChosen ?? [],
                    'dep_date': dep_date,
                    'book-ticket': true
                },
                success: (result) => {
                    var resp = JSON.parse(result);
                    if (resp.message == 1)
                        window.location.href = 'redirect.php?id='.resp.id;
                    else {
                        $('.error__msg--text').text('Error');
                        $('#error-msg').show().delay(5000).fadeOut();
                    }
                }
            })
        };

        $('#book-ticket').on('click', bookTicket);
    </script>
</body>

</html>