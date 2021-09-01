<?php

function tableFromData($data, $fields, $labels = [])
{
    $table = "<table id='laitelista'><tbody><tr>";

    if (empty($labels)) {
        $labels = $fields;
    }

    foreach ($labels as $label) {
        $table .= "<th>" . $label . "<th>";
    }

    $table .= "</tr>";

    foreach ($data as $piece_data) {
        $table .= "<tr>";
        foreach ($fields as $field) {
            $table .= "<td>" . $piece_data[$field] . "<td>";
        }
        $table .= "</tr>";
    }

    $table .= "</tbody></table>";
    return $table;
}
