<?php
header('Content-Type: application/json');

// Exemplo estático com 10 filmes
$filmes = [
    ["titulo" => "Avengers: Infinity War", "videoId" => "6ZfuNTqbHE8"],
    ["titulo" => "Avengers: Endgame", "videoId" => "TcMBFSGVi1c"],
    ["titulo" => "Joker", "videoId" => "mqqft2x_Aa4"],
    ["titulo" => "The Batman", "videoId" => "mqqft2x_Aa4"], 
    ["titulo" => "Doctor Strange", "videoId" => "aWzlQ2N6qqg"],
    ["titulo" => "Spider-Man: No Way Home", "videoId" => "JfVOs4VSpmA"],
    ["titulo" => "Black Panther", "videoId" => "xjDjIWPwcPU"],
    ["titulo" => "Thor: Ragnarok", "videoId" => "ue80QwXMRHg"],
    ["titulo" => "Guardians of the Galaxy", "videoId" => "d96cjJhvlMA"],
    ["titulo" => "Iron Man", "videoId" => "8ugaeA-nMTc"]
];

echo json_encode($filmes);