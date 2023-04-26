<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="English Dictionary">
    <meta name="keywords" content="Dictionary">
    <meta name="author" content="Sanjana Production">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="icons8-dictionary-32.png">
    <title>Dictionary</title>
</head>

<body>
    <h1>Dictionary</h1>
    <h5>Unlock the Mysteries of Language: The Ultimate Dictionary Tool</h5>
    <form id="dictionary-form">
        <label for="word">Enter a word:</label>
        <input type="text" name="word" id="word" required>
        <div class="div1">
            <button type="submit">Lookup</button>
            <button type="button" id="clear-btn">Clear</button>
            <div class="toggle-switch">
                <input type="checkbox" id="switch" name="theme">
                <label for="switch"></label>
            </div>
        </div>
    </form>
    <div id="dictionary-results"></div>
    <footer>
        <div class="wrapper">
            <p class="p1">Copyright © 2023 - All Rights Reserved. Made with ❤️ in Sanjana Production.</p>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dictionary-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: 'dictionary.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#dictionary-results').html(response);
                    }
                });
            });
            $('#clear-btn').click(function() {
                $('#word').val('');
                $('#dictionary-results').html('');
            });
        });
        // Toggle dark mode on switch toggle
        $(document).ready(function() {
            $('#switch').change(function() {
                if ($(this).is(':checked')) {
                    $('body').addClass('dark-mode');
                } else {
                    $('body').removeClass('dark-mode');
                }
            });
        });
    </script>

</body>

</html>