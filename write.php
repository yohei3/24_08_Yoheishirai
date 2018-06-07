<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>出力結果</title>
</head>
<body>
    
<?php

$recipe_name = $_POST["recipe_name"];
$category = $_POST["category"];
$difficulty = $_POST["difficulty"];
$budget = $_POST["budget"];
$howto = $_POST["howto"];

//print_r($_POST);
echo htmlspecialchars($recipe_name,ENT_QUOTES,"UTF-8");
echo "<br>";
if($category === "1") {
    echo "和食";
    $category = "和食";
}if($category === "2"){
    echo "中華";
    $category = "中華";
} 
if($category === "3"){
    echo "洋食";
    $category = "洋食";
}

echo "<br>";
if($difficulty === "1"){
    echo "簡単";
    $difficulty ="簡単";
} elseif ($difficulty  === "2") {
    echo "普通";
    $difficulty ="普通";
} else{
    echo "難しい";
    $difficulty ="難しい";
}
echo "<br>";
if (is_numeric($budget)){
    echo number_format($budget);
}
echo "<br>";
echo nl2br (htmlspecialchars($howto,ENT_QUOTES,"UTF-8"));
echo "<br>";

$c = ",";
$str=$recipe_name.$c.$category.$c.$difficulty.$c.$budget.$c.$howto;
$file = fopen("data/data.csv","a");
flock($file,LOCK_EX);
fwrite($file,$str."\n");
flock($file,LOCK_UN);
fclose($file);
?>

<a href="read2.php">俺的レシピまとめ</a>

</body>
</html>