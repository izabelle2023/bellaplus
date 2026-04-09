<?php
header('Content-Type: application/json');

// Exemplo estático com 10 séries
$series = [
    ["titulo" => "Stranger Things", "videoId" => "hA6hldpSTF8"],
    ["titulo" => "Game of Thrones", "videoId" => "KPLWWIOCOOQ"],
    ["titulo" => "The Witcher", "videoId" => "x7Krla_UxRg"],
    ["titulo" => "Breaking Bad", "videoId" => "HhesaQXLuRY"],
    ["titulo" => "The Mandalorian", "videoId" => "aOC8E8z_ifw"],
    ["titulo" => "Loki", "videoId" => "nW948Va-l10"],
    ["titulo" => "Loki", "videoId" => "nW948Va-l10"],
    ["titulo" => "House of the Dragon", "videoId" => "DotnJ7tTA34"],
    ["titulo" => "The Boys", "videoId" => "5SKP1_F7ReE"],
    ["titulo" => "Peaky Blinders", "videoId" => "oVzVdvGIC7U"]
];

echo json_encode($series);
