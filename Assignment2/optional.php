<?php
    // Read JSON file
    $json = file_get_contents('./wizard.json');
    
    // Decode JSON
    $json_data = json_decode($json,true);

    // Print data
    for ($i = 0; $i < 6 ; $i++)
    {
        $character = $json_data[$i];
        $name = $character['name'];
        $wand = $character['wand'][0];
        $wood = $wand['wood'];
        $length = $wand['length'];
        $core = $wand['core'];
        echo "$name's wand is $wood, $length, with a $core core.<br>";
    }
?>