<?php
    $date = \Carbon\Carbon::now();
    return [
        'animals_image' => "uploads/animals/".date_format($date, "Y").date_format($date, "m").date_format($date, "d"),
        'animals_image_default' => "uploads/animals/default.webp"
    ];
