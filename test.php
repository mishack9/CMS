
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="tet.php" method = "post">
<?php
$error = "";
if(count($error) == 1){
    ?>
<div class="alert">
    <?php
    foreach($error as $show_error){
        echo $show_error;
    }
    ?>
</div>
    <?php
} elseif(count($error) > 1){
    ?>
    <div class="alert">
        <?php
        foreach($error as $show_error){
            ?>
            <l>
                <?php echo $show_error ?>
            </l>
            <?php
        }
        ?>
    </div>
    <?php
}
?>
    <input type="text" name = "name"><br><br>
    <input type="text" name = "password"><br><br>
    <input type="submit" name="submit" id="" value = "submit">
</form>
</body>
</html>