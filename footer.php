<footer>

</footer>
<script src="./index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-manga').keyup(function() {
            $('#result_search').html("");

            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    type: 'POST',
                    url: 'recherche_manga.php',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let resultats = JSON.parse(data)
                        if (resultats.length != 0) {
                            resultats.forEach((resultat) => {
                                let div = "<div class=\"result\" style='font-size: 20px; text-align: left; margin-top: 10px;color:white ; ' ><a href='detail_manga.php?id_manga=" + resultat.id_manga + "'>" + resultat.titre + "</a></div>"
                                $('#result_search').append(div);


                            })

                        } else {
                            console.log("nope")
                            document.getElementById('result_search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px;color:white ; ' >Aucun manga</div>"
                        }
                    }
                });
            };
        });
    });
</script>
</body>

</html>