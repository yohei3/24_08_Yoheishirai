<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>調理データ
    </title>
    <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
<?php
// 読み込み用にdata.csvを開きます。
$f = fopen("data/data.csv", "r");
// test.csvの行を1行ずつ読み込みます。
while($line = fgetcsv($f)){
 // 読み込んだ結果を表示します。
 var_dump($line);
}
// data.csvを閉じます。
fclose($f);
?>

<!-- <script>


</script> -->


</body>
</html>

