<head>
    <meta charset="UTF-8">

</head>
<body>
<h2>Seite von Miro Bögershausen</h2>
<h3>DMsT Rechner</h3>

<input type="number" name="index"><input type="number" name="dist"><button type="button" onclick="myFunction()">Submit</button>


<p id="punkt"></p>
<script>
function myFunction() {
    var index;
    var dist;
    var punkte;

    index = document.getElementById("index").value;
    dist = document.getElementById("dist").value;

    punkte = dist * 100 / index;

    document.getElementById("punkt").innerHTML = punkte;
}
</script>

<footer>
    An alle Anwälte: Mahnt mich nicht ab nur weil ich kein Impressum habe. Lasst mich mein Leben leben das lass ich auch deins leben.

</footer>
</body>