<?php
    include 'db.php';

    $db = new DB();
    $upit = "delete from pacijent where id=" . $_POST['id'];
    $db->connection->query($upit);

    $upit2 = "select p.id, p.imep, p.prezimep, p.dijagnoza, p.terapija, p.godine, l.imel, l.prezimel 
                    from pacijent p join lekar l on p.lekar_id = l.id order by p.id asc";

                    $data_set = $db->connection->query($upit2);
                    if (!$data_set) {
                    printf("Error: %s\n", mysqli_error($db->connection));
                    exit();
                    }

    while ($pacijent = mysqli_fetch_array($data_set)) :
    ?>
     <tr>
         <td><?php echo $pacijent['id'] ?></td>
         <td><?php echo $pacijent['imep'] ?></td>
         <td><?php echo $pacijent['prezimep'] ?></td>
         <td><?php echo $pacijent['dijagnoza'] ?></td>
         <td><?php echo $pacijent['terapija'] ?></td>
         <td><?php echo $pacijent['godine'] ?></td>
         <td><?php echo $pacijent['imev'] ?></td>
         <td><?php echo $pacijent['prezimev'] ?></td>
         <td>
             <button class="btn btn-info">Izmeni</button>
             <button class="btn btn-danger" value="<?php echo $pacijent['id']; ?>" id="obrisi_dugme">Obriši</button>
         </td>
     </tr>

 <?php
    endwhile;
    ?>