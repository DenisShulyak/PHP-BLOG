<?php
/*
 * //1й способ
$arr = explode(" ",$post['Content']);

    $str = "";
if(count($arr) > 30){

    for($i = 0; $i< 30;$i++){
        $str .= $arr[$i] . " ";
    }
}
else{
    foreach($arr as $word){
        $str .= $word . " ";
    }
}

$str .= "...";*/

$str = mb_strimwidth($post['Content'], 0, 50, "...");

?>

<div style="border: 1px solid black">

    <h2><?= $post['Title'] ?? ''?></h2>
    <div>
        <?= $str/*$post['Content']*/?>
    </div>
    <a href="/post?id=<?= $post['Id']?>">GO...</a>

</div>