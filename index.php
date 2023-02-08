<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Ordinacija-domaci1</title>
</head>
<body>
<h1 id="naslov" class="text-primary text-center">Pacijenti i lekari</h1>
<a href="dodajNovog.php"><button type="button" class="btn btn-primary" id="btn_novi_pacijent">Forma za novog pacijenta</button></a>
<div id="div-tbl-pocetna">
    <table class="table table-light table-striped table-hover table-bordered">
        <thead class="text-center">
            <tr>
                <th id="id-col">ID</th>
                <th id="imep-col">Ime Pacijenta</th>
                <th id="prezimep-col">Prezime Pacijenta</th>
                <th id="dijagnoza-col">Dijagnoza</th>
                <th id="godine-col">Terapija</th>
                <th id="terapija-col">Godine</th>
                <th id="imel-col">Ime Lekara</th>
                <th id="prezimel-col">Prezime Lekara</th>
                <th id="izmena-brisanje">Izmeni / Obriši</th>
            </tr>
        </thead>
        <tbody id="content" class="text-center">

            <?php
            include 'db.php';

            $db = new DB();
            $upit = "select p.id, p.imep, p.prezimep, p.dijagnoza, p.terapija, p.godine, l.imel, l.prezimel 
            from pacijent p join lekar l on p.lekar_id = l.id order by p.id asc";
            $result_set = $db->connection->query($upit);

            while ($pacijent = mysqli_fetch_array($result_set)) :
            ?>
            <tr>
                <td><?php echo $pacijent['id'] ?></td>
                <td><?php echo $pacijent['imep'] ?></td>
                <td><?php echo $pacijent['prezimep'] ?></td>
                <td><?php echo $pacijent['dijagnoza'] ?></td>
                <td><?php echo $pacijent['terapija'] ?></td>
                <td><?php echo $pacijent['godine'] ?></td>
                <td><?php echo $pacijent['imel'] ?></td>
                <td><?php echo $pacijent['prezimel'] ?></td>
                <td>
                    <button class="btn btn-info"value="<?php echo $pacijent['id']; ?>" id="izmeni_dugme">Izmeni</button>
                    <button class="btn btn-danger"value="<?php echo $pacijent['id']; ?>" id="obrisi_dugme">Obriši</button>
                </td>
            </tr>

            <?php
            endwhile;
            ?>

        </tbody>

        <tfoot>
        </tfoot>
        </table>

        <a href="pretragasort.php"><button type="button" class="btn btn-success" id="btn_pretraga_sort">Pretrazi / Sortiraj</button></a>
    </div>


    <div id="forma-izmena" class="collapse">
        <form method="POST" id="forma-izmena-pacijent">

            <div class="mb-3">
                <label class="form-label">ID: </label>
                <input type="text" class="form-control text-center" name="izmena_id" id="izmena_id">
            </div>

            <div class="mb-3">
                <label class="form-label">Ime pacijenta: </label>
                <input type="text" class="form-control text-center" name="izmena_imep" id="izmena_imep">
            </div>
            <div class="mb-3">
                <label class="form-label">Prezime: </label>
                <input type="text" class="form-control text-center" name="izmena_prezimep" id="izmena_prezimep">
            </div>
            <div class="mb-3">
                <label class="form-label">Dijagnoza: </label>
                <input type="text" class="form-control text-center" name="izmena_dijagnoza" id="izmena_dijagnoza">
            </div>
            <div class="mb-3">
                <label class="form-label">Terapija: </label>
                <input type="text" class="form-control text-center" name="izmena_terapija" id="izmena_terapija">
            </div>
            <div class="mb-3">
                <label class="form-label">Godine: </label>
                <input type="number" class="form-control text-center" name="izmena_godine" id="izmena_godine">
            </div>
            <div class="mb-3">
                <label class="form-label">Lekar: </label>
                <select class="form-select text-center" name="izmena_select-lekar" id="select-lekar">

                    <?php

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
            <button type="submit" class="btn btn-info btn-lg" name="izmeni_pacijenta_button">Izmeni</button>
        </form>
    </div>

    <?php

    if (isset($_POST['izmeni_pacijenta_button'])) {
        $id = $_POST['izmena_id'];
        $imep = $_POST['izmena_imep'];
        $prezimep = $_POST['izmena_prezimep'];
        $dijagnoza = $_POST['izmena_dijagnoza'];
        $terapija = $_POST['izmena_terapija'];
        $godine = $_POST['izmena_godine'];
        $lekar_id = $_POST['izmena_select-lekar'];

        $upit = "update pacijent set imep='$imep', prezimep='$prezimep', dijagnoza='$dijagnoza', terapija='$terapija', godine='$godine', lekar_id='$lekar_id' where id=" . $id;

        if ($db->connection->query($upit)) {
            echo 'Uspešno izmenjen pacijent!';
        } else {
            echo $upit;
        }
    }

    ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>