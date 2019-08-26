<?php
    require('dbconnect.php');

    $id = $conn->real_escape_string($_GET['id']);

    $query = 'SELECT * FROM filmi WHERE id = ' . $id;
    $result = $conn->query($query);
    $film = $result->fetch_assoc();

    if (isset($_POST['submit'])) {
        $update_id = $conn->real_escape_string($_POST['update_id']);
        $ime = $conn->real_escape_string($_POST['ime']);
        $opis = $conn->real_escape_string($_POST['opis']);
        $zanr = $conn->real_escape_string($_POST['zanr']);
        $letnica = $conn->real_escape_string($_POST['letnica']);

        $query = "UPDATE filmi SET
                    ime = '$ime',
                    zanr = '$zanr',
                    letnica = '$letnica',
                    opis = '$opis'
                WHERE id = {$update_id}";
        
        if ($conn->query($query)) {
            header('Location: ' . $rooturl . '');
        }
        else {
            echo 'ERROR: ' . $conn->error;
        }
    }

    $conn->close();

?>

<?php include('header.php'); ?>
    <div style="padding: 20px 20px;">
        <h1>Uredi</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Ime</label>
                <input type="text" name="ime" class="form-control"
                value="<?php echo $film['ime']; ?>">
            </div>
            <div class="form-group">
                <label>Zanr</label>
                <input type="text" name="zanr" class="form-control"
                value="<?php echo $film['zanr']; ?>">
            </div>
            <div class="form-group">
                <label>Letnica</label>
                <input type="text" name="letnica" class="form-control"
                value="<?php echo $film['letnica']; ?>">
            </div>
            <div class="form-group">
                <label>Opis</label>
                <textarea name="opis" class="form-control">
                    <?php echo $film['opis']; ?>
                </textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $film['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('footer.php'); ?>