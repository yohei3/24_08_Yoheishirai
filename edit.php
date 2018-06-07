<?php
$user = "qwerty";
$pass = "12345";
try{
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO ('mysql:host=localhost;dbname=recipe;charset=utf8',$user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt ->bindvalue(1,$id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    } catch (Exception $e){
        echo "エラー発生: " . htmlspecialchars($e->getMessage(), 
        ENT_QUOTES,'UTF-8') . "<br>";
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レシピ</title>
</head>
<body>
入力フォーム<br>
    <form action="update.php" method="post">
料理名:<input type="text" name="recipe_name" value="<?php echo htmlspecialchars($result['recipe_name'], ENT_QUOTES, 'UTF-8'); ?>"><br>
カテゴリ:
<select name ="category">
<option value="">選択してください</option>
<option value="1" <?php if ($result['category'] === 1) echo "selected" ?>>和食</option>
<option value="2"<?php if ($result['category'] === 2) echo "selected" ?>>中華</option>
<option value="3"<?php if ($result['category'] === 3) echo "selected" ?>>洋食</option>
</select>
<br>
難易度:
<input type="radio" name="difficulty" value="1"<?php if ($result['difficulty'] === 1) echo "checked" ?>>簡単
<input type="radio" name="difficulty" value="2" <?php if ($result['difficulty'] === 2) echo "checked" ?>>普通
<input type="radio" name="difficulty" value="3"<?php if ($result['difficulty'] === 3) echo "checked" ?>>難しい
<br>
予算:
<input type="number" name="budget" value="<?php echo htmlspecialchars($result["budget"], ENT_QUOTES, 'UTF-8'); 
?>">円
<br>
作り方:
<br>
<textarea name="howto" cols="40" rows="10" maxlength="400"><?php echo htmlspecialchars($result['howto'], ENT_QUOTES, 'UTF-8');?></textarea>
<br>
<input type ="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
<input type="submit" value="送信">
</form>
</body>
</html>