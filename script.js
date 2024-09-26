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

    $(document).on('click', '.suggestion', function() {
        $('#search').val($(this).text());
        $('#suggestions').empty();
    });
});