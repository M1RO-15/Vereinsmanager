
<!-- Just Copy and paste it!   --!>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/Template/starter-template.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Vereinsmanager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Dienstplan<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Arbeitsstunden</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">

        <?php
        $servername = "localhost";
        $db_username = "root";
        $password = "";
        $dbname = "vereinsmanager";

        // Create connection
        $conn = new mysqli($servername, $db_username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT date, fi_1, fi_2, winch, flightcontroller, catering FROM dienstplan2020 ORDER BY date ASC";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {

            ?>

            <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Datum</th>
                <th scope="col">Flugleiter</th>
                <th scope="col">Fluglehrer 1</th>
                <th scope="col">Fluglehrer 2</th>
                <th scope="col">Winde</th>
                <th scope="col">Kantine</th>
            </tr>
            </thead>
            <?php

            // output data of each row
            while($row = $result->fetch_assoc()) {
            $fi_1 = $row['fi_1'];
            $fi_2 = $row['fi_2'];
            $winch = $row['winch'];
            $fl_co = $row['flightcontroller'];
            $catering = $row['catering'];
            $date_dp = $row['date'];

            $date_dp_jahr = substr($date_dp, 0, 4);
            $date_dp_tag = substr($date_dp, 6, 2);
            $date_dp_monat = substr($date_dp, 9, 2);


                //Query of the name of the fi_1
                $conn2 = new mysqli($servername, $db_username, $password, $dbname);
                $conn2->set_charset('utf8');
                if ($conn2->connect_error) {
                    die("Connection failed: " . $conn2->connect_error);
                }

                $sql2 = "SELECT firstname, lastname FROM users WHERE u_id = '$fi_1'";
                $result2 = $conn2->query($sql2);

                if ($result2->num_rows > 0) {

                    while($row = $result2->fetch_assoc()) {
                        $fi_1_fn = $row['firstname'];
                        $fi_1_ln = $row['lastname'];
                        $fi_1_txt = $fi_1_fn . " " . $fi_1_ln;
                    }
                } else {
                    echo "0 results";
                }
                $conn2->close();

                //Query of the name of the fi_2
                $conn3 = new mysqli($servername, $db_username, $password, $dbname);
                $conn3->set_charset('utf8');
                if ($conn3->connect_error) {
                    die("Connection failed: " . $conn3->connect_error);
                }

                $sql3 = "SELECT firstname, lastname FROM users WHERE u_id = '$fi_2'";
                $result3 = $conn3->query($sql3);

                if ($result3->num_rows > 0) {

                    while($row = $result3->fetch_assoc()) {
                        $fi_2_fn = $row['firstname'];
                        $fi_2_ln = $row['lastname'];
                        $fi_2_txt = $fi_2_fn . " " . $fi_2_ln;
                    }
                } else {
                    echo "0 results";
                }
                $conn3->close();


                //Query of the name of the winch
                $conn4 = new mysqli($servername, $db_username, $password, $dbname);
                $conn4->set_charset('utf8');
                if ($conn4->connect_error) {
                    die("Connection failed: " . $conn4->connect_error);
                }

                $sql4 = "SELECT firstname, lastname FROM users WHERE u_id = '$winch'";
                $result4 = $conn4->query($sql4);

                if ($result4->num_rows > 0) {

                    while($row = $result4->fetch_assoc()) {
                        $winch_fn = $row['firstname'];
                        $winch_ln = $row['lastname'];
                        $winch_txt = $winch_fn . " " . $winch_ln;
                    }
                } else {
                    echo "0 results";
                }
                $conn4->close();


                //Query of the name of the fl_co
                $conn5 = new mysqli($servername, $db_username, $password, $dbname);
                $conn5->set_charset('utf8');
                if ($conn5->connect_error) {
                    die("Connection failed: " . $conn5->connect_error);
                }

                $sql5 = "SELECT firstname, lastname FROM users WHERE u_id = '$fl_co'";
                $result5 = $conn5->query($sql5);

                if ($result5->num_rows > 0) {

                    while($row = $result5->fetch_assoc()) {
                        $fl_co_fn = $row['firstname'];
                        $fl_co_ln = $row['lastname'];
                        $fl_co_txt = $fl_co_fn . " " . $fl_co_ln;
                    }
                } else {
                    echo "0 results";
                }
                $conn5->close();

                //Query of the name of the winch
                $conn6 = new mysqli($servername, $db_username, $password, $dbname);
                $conn6->set_charset('utf8');
                if ($conn6->connect_error) {
                    die("Connection failed: " . $conn6->connect_error);
                }

                $sql6 = "SELECT firstname, lastname FROM users WHERE u_id = '$catering'";
                $result6 = $conn6->query($sql6);

                if ($result6->num_rows > 0) {

                    while($row = $result6->fetch_assoc()) {
                        $catering_fn = $row['firstname'];
                        $catering_ln = $row['lastname'];
                        $catering_txt = $catering_fn . " " . $catering_ln;
                    }
                } else {
                    echo "0 results";
                }
                $conn6->close();


            ?>
            <tbody>
            <tr>
                <th scope="row"><?php echo($date_dp_tag . "." . $date_dp_monat . "." . $date_dp_jahr); ?></th>
                <td><?php echo("<a href=\"/dienst/?token=fi1_" . $date_dp . "\">" . $fi_1_txt . "</a>"); ?></td>
                <td><?php echo("<a href=\"/dienst/?token=fi2_" . $date_dp . "\">" . $fi_2_txt . "</a>"); ?></td>
                <td><?php echo("<a href=\"/dienst/?token=win_" . $date_dp . "\">" . $winch_txt . "</a>"); ?></td>
                <td><?php echo("<a href=\"/dienst/?token=fl_" . $date_dp . "\">" . $fl_co_txt . "</a>"); ?></td>
                <td><?php echo("<a href=\"/dienst/?token=kan_" . $date_dp . "\">" . $catering_txt . "</a>"); ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table><?php

        } else {
            echo "0 results";
        }
        $conn->close();
        ?>





    </div>

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/js/vendor/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>