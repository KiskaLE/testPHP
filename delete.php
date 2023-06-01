<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>

<body>
    <?php
        include_once "./classes/prispevekDB.php";
        include_once "./classes/prispevek.php";

        $db = new PrispevekDB();
        $prispevek = $db->get($_GET["id"]);
    ?>
    <section>
        <div>
            <h2><?php echo "$prispevek->nadpis";?></h2>
            <p><?php echo "$prispevek->datum";?></p>
            <p><?php echo "$prispevek->text";?></p>
        </div>
        <div>
            <form action="" method="post">
                <input type="submit" value="smazat" name="delete">
            </form>
        </div>
    </section>
    <?php
        if (isset($_POST["delete"])) {
            if ($db->delete($prispevek)) {
                header("Location: index.php");
                die;
            }else {
                echo "<p>něco se nepovedlo</p>";
            };
        }
    ?>
</body>

</html>