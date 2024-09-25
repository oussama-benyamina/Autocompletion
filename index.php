<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moteur de recherche d'animaux</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Recherche d'Animaux</h1>
    <input type="text" id="search" placeholder="Rechercher un animal...">
    <div id="suggestions"></div>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: 'autocomplete.php',
                        method: 'GET',
                        data: { search: query },
                        success: function(data) {
                            $('#suggestions').html(data);
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });
        });
    </script>
</body>
</html>