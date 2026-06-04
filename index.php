<?php
$emoji_map = [
    '♜' => 'image/torre_preta.png',
    '♞' => 'image/cavalo_preto.png',
    '♝' => 'image/bispo_preto.png',
    '♛' => 'image/rainha_preta.png',
    '♚' => 'image/rei_preto.png',
    '♟' => 'image/peao_preto.png',
    '♖' => 'image/torre_branco.png',
    '♘' => 'image/cavalo_branco.png',
    '♗' => 'image/bispo_branco.png',
    '♕' => 'image/rainha_branco.png',
    '♔' => 'image/rei_branco.png',
    '♙' => 'image/peao_branco.png',
];

$board = [
    ['♜','♞','♝','♛','♚','♝','♞','♜'],
    ['♟','♟','♟','♟','♟','♟','♟','♟'],
    [' ',' ',' ',' ',' ',' ',' ',' '],
    [' ',' ',' ',' ',' ',' ',' ',' '],
    [' ',' ',' ',' ',' ',' ',' ',' '],
    [' ',' ',' ',' ',' ',' ',' ',' '],
    ['♙','♙','♙','♙','♙','♙','♙','♙'],
    ['♖','♘','♗','♕','♔','♗','♘','♖']
];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Chess Royale</title>
</head>

<body>

    <div class="board">

    <?php

    for($row=0;$row<8;$row++)
    {
        for($col=0;$col<8;$col++)
        {
            $color = (($row+$col)%2==0) ? "white" : "black";
            $emoji = $board[$row][$col];

            echo "<div class='square {$color}' data-row='{$row}' data-col='{$col}'>";

            if(trim($board[$row][$col]) !== '' && isset($emoji_map[$board[$row][$col]]))
    {
                $src = $emoji_map[$board[$row][$col]];
                echo "<div class='piece-wrapper' draggable='true'>";
                echo "<img class='piece' src='{$src}' alt=''>";
                echo "</div>";
    }

            echo "</div>";
        }
    }

    ?>

    </div>

    <script src="script.js"></script>

</body>
</html>