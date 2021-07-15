<?php

function gameMatches($lst,$game){
    $game_lst = [];
    $matches = [];
    for ($x = 0; x < count($lst); $x++) {
        array_push($game_lst, $lst[$x][3]);
    }
    for ($j = 0; $j < count($lst); $j++){
        for ($k = 0; $k < count($lst[$j]); $k++){
            if ($game_lst[$j][$k] == $game){
                array_push($matches,$j);
            }

        }
    }
return $matches;
}

function getGamePrefs() {
    $usrs = array();
    $dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
    if (!$dbc) exit('Could not connect');
    $stmt = mysqli_prepare($dbc, "SELECT id, games FROM users");
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($results)) {
        array_push($usrs, array($row['id'],explode(",", $row['games'])));
    }
    return $usrs;
}

function runPy() {
    $pyOutput = shell_exec('py match.py'.getGamePrefs());
    return $pyOutput
}

?>