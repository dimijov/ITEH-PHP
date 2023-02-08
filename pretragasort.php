<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Pretraga/Sortiranje Pacijenata</title>
</head>

<body>

    <h1 id="sort-naslov">Pretraga / Sortiranje </h1>
    <div id="sort-div">
        <table id="pacijenti-table" class="hover order-column row-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Dijagnoza</th>
                    <th>Terapija</th>
                    <th>Godine</th>
                    <th>Ime Lekara</th>
                    <th>Prezime Lekara</th>
                </tr>
            </thead>
            <tbody id="sadrzaj">

                <?php
                require 'db.php';

                $db = new DB();
                $upit = "select p.id, p.imep, p.prezimep, p.dijagnoza, p.terapija, p.godine,l.imel,l.prezimel 
                    from pacijent p join lekar l on p.lekar_id = l.id order by p.id asc";

                $rezultat = $db->connection->query($upit);

                while ($pacijent = mysqli_fetch_array($rezultat)) :
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

                    </tr>

                <?php
                endwhile;
                ?>


            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>

</html> 