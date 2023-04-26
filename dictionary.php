<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);

    if (!empty($_GET['word'])) {
        $word = urlencode($_GET['word']);
        $url = "https://api.dictionaryapi.dev/api/v2/entries/en/$word";
        $response = file_get_contents($url);
        $data = json_decode($response);

        if (is_array($data)) {
            // Output the data in HTML format
            echo "<h1>" . $data[0]->word . "</h1>";

            foreach ($data[0]->meanings as $meaning) {
                echo "<h2>" . $meaning->partOfSpeech . "</h2>";

                foreach ($meaning->definitions as $definition) {
                    echo "<p><strong>Definition:</strong> " . $definition->definition;

                    if (!empty($definition->example)) {
                        echo "<br><strong>Example:</strong> " . $definition->example . "</p>";
                    }

                    if (!empty($definition->synonyms)) {
                        echo "<p><strong>Synonyms:</strong> " . implode(", ", $definition->synonyms) . "</p>";
                    }

                    if (!empty($definition->antonyms)) {
                        echo "<p><strong>Antonyms:</strong> " . implode(", ", $definition->antonyms) . "</p>";
                    }

                    if (!empty($data[0]->phonetics[0]->audio)) {
                        echo "<button onclick=\"new Audio('" . $data[0]->phonetics[0]->audio . "').play()\" style='background-color:#45a049; border: none; padding: 8px 16px; color:white; border-radius: 8px; text-align: center; text-decoration: none; display: inline-block; font-size: 20px; margin: 4px 2px; cursor: pointer;'><i class='bi bi-volume-up'></i></button>";
                    }
                }
            }
        } else {
            echo "<p class='no-results'>🥲 No results found for \"$word\"</p>";
        }
    }
    ?>
</body>

</html>