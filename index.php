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
                <th id="godine-col">Godine</th>
                <th id="terapija-col">Terapija</th>
                <th id="imel-col">Ime Lekara</th>
                <th id="prezimel-col">Prezime Lekara</th>
                <th id="izmena-brisanje">Izmeni / Obriši</th>
            </tr>
        </thead>
        <tbody class="text-center">

            <?php
            include 'db.php';

            $db = new DB();
            $upit = "select p.id, p.imep, p.prezimep, p.dijagnoza, p.terapija, p.godine, l.imel, l.prezimel 
            from pacijent p join lekar l on p.lekar_id = l.id";
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
                    <button class="btn btn-info">Izmeni</button>
                    <button class="btn btn-danger">Obriši</button>
                </td>
            </tr>

            <?php
            endwhile;
            ?>

        </tbody>

        <tfoot>
        </tfoot>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>