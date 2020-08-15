<?php
$vote["up"] = $votes->where('user_id', $user->id)->where('poin', 1)->count() > 0;
$vote["down"] = $votes->where('user_id', $user->id)->where('poin', -1)->count() > 0;
$vote["btn1"] = $vote["btn2"] = "btn-outline-secondary";

if ($vote["up"]) {
    $vote["btn1"] = "btn-success disabled";
}

if ($vote["poin"] < 15) {
    $vote["btn2"] = "btn-outline-secondary disabled";
} else {
    if ($vote["down"]) {
        $vote["btn2"] = "btn-danger disabled";
    }
}

$skor_vote = 0;
foreach ($votes as $v) {
    $skor_vote += $v->poin;
}
$vote["skor"] = $skor_vote;
?>
