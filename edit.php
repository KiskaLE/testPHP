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
        <form method="post" style="display: flex; flex-direction: column; width: 300px;">
            <input type="text" name="nadpis" required placeholder="nadpis" <?php echo "value='$prispevek->nadpis'";?>>
            <textarea name="text" cols="30" rows="10"><?php echo "$prispevek->text";?></textarea>
            <input type="date" name="datum" required placeholder="datum" <?php echo "value='$prispevek->datum'";?>>
            <input type="submit" value="uložit" name="edit">
        </form>
    </section>

    <?php
        if (isset($_POST["edit"])) {
            $prispevek->nastavHodnoty($_POST["nadpis"], $_POST["text"], $_POST["datum"], $_GET["id"]);
            print_r($prispevek);
            if ($db->edit($prispevek)) {
                header("Location: index.php");
                die;
            }else {
                echo "<p>něco se nepovedlo</p>";
            };
        }
    
    ?>
    
</body>

</html>