<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Strana za dodavanje novog pacijenta</title>
</head>

<body>
    <a href="index.php"><button class="btn btn-primary" id="pocetna-btn">Početna</button></a>
    <form method="POST" id="forma-novi-pacijent">
        <div class="mb-3">
            <label class="form-label">Ime pacijenta: </label>
            <input type="text" class="form-control text-center" name="imep">
        </div>
        <div class="mb-3">
            <label class="form-label">Prezime pacijenta: </label>
            <input type="text" class="form-control text-center" name="prezimep">
        </div>
        <div class="mb-3">
            <label class="form-label">Dijagnoza: </label>
            <input type="text" class="form-control text-center" name="dijagnoza">
        </div>
        <div class="mb-3">
            <label class="form-label">Terapija: </label>
            <input type="text" class="form-control text-center" name="terapija">
        </div>
        <div class="mb-3">
            <label class="form-label">Godine: </label>
            <input type="number" class="form-control text-center" name="godine">
        </div>
        <div class="mb-3">
            <label class="form-label">Lekar: </label>
            <select class="form-select text-center" name="select-lekar">

                <?php
                require 'db.php';

                $db = new DB();
                $upit = "select * from lekar";
                $result_set = $db->connection->query($upit);

                while ($lekar = mysqli_fetch_array($result_set)) :
                ?>
                    <option value="<?php echo $lekar['id'] ?>"><?php echo $lekar['imel'] . " " . $lekar['prezimel']; ?></option>
                <?php
                endwhile;
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-lg btn-success mt-2" name="dodaj_pacijenta_btn">Submit</button>
    </form>


    <?php
    require 'Pacijent.php';

    if (isset($_POST["dodaj_pacijenta_btn"])) {
        $pacijent = new Pacijent(NULL, $_POST['imep'], $_POST['prezimep'], $_POST['dijagnoza'], $_POST['terapija'], $_POST['godine'], $_POST['select-lekar']);
        if ($pacijent->dodajNovog($pacijent)) {
            echo 'Pacijent uspešno dodat!';
        } else {
            echo 'Doslo je do greške! Pacijent nije sačuvan!';
        }
    }
    ?>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>