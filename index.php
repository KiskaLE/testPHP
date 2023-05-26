<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    include_once "./classes/prispevek.php";
    include_once "./classes/prispevekDB.php";
    $db = new PrispevekDB();
?>

<body>
    <form method="post" style="display: flex; flex-direction: column; width: 300px;">
        <input type="text" name="nadpis" required placeholder="nadpis">
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="date" name="datum" required placeholder="datum">
        <input type="submit" value="odeslat" name="submit">
    </form>
    <?php
        $prispevky = $db->getAll();
        foreach($prispevky as $prispevek){
            $prispevek->vypis();
        }
    ?>
    <?php
    if (isset($_POST["submit"])) {
        $prispevek = new Prispevek();
        $prispevek->nastavHodnoty($_POST["nadpis"], $_POST["text"], $_POST["datum"]);
        if ($db->post($prispevek)) {
            header("Refresh:0");
            die;
        }else {
            echo "<p>stala se chyba</p>";
        }
    }

    ?>
</body>

</html>