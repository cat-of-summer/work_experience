<?php
function print_table_from_CSV($file) 
{
    function is_file_type_CSV($file_type)
    { 
        if (!preg_match('~.csv~', $file_type)) {
            return false;
        }
        return true;
    }

    if (!is_uploaded_file($file['tmp_name']) or !is_file_type_CSV($file['name']) or !($csv = @fopen($file['name'],'r'))) {
        die("Некорректный файл");
    }

    echo '<table class="table table-striped table-bordered">';
    if ($row = fgetcsv($csv)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<th>$value</th>";
        }
        echo "</tr>";
    }

    while ($row = fgetcsv($csv)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
