<?php
    // Read JSON file
    $json = file_get_contents('./wizard.json');
    
    // Decode JSON
    $json_data = json_decode($json,true);

    // Print data
    foreach ($json_data as $character)
    {
        foreach ($character as $attribute)
        {
            if (is_array($attribute))
            {
                foreach ($attribute as $val) 
                {
                    if (is_array($val))
                    {
                        foreach ($val as $value) 
                        {
                            echo "$value ";
                        }
                    }
                    else
                    {
                        echo "$val ";
                    }
                }
            }
            else
            {
                echo "$attribute's wand is  ";
            }
        }
        echo "<br>";
    }
?>