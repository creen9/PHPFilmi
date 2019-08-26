<?php
    require('dbconnect.php');

    if (isset($_POST['submit'])) {
        $ime = $conn->real_escape_string($_POST['ime']);
        $opis = $conn->real_escape_string($_POST['opis']);
        $zanr = $conn->real_escape_string($_POST['zanr']);
        $letnica = $conn->real_escape_string($_POST['letnica']);

        $query = "INSERT INTO filmi(ime, zanr, letnica, opis) VALUES ('$ime', '$zanr', '$letnica', '$opis')";
        
        if ($conn->query($query)) {
            header('Location: ' . $rooturl . '');
        }
        else {
            echo 'ERROR: ' . $conn->error;
        }
    }

?>

<?php include('header.php'); ?>
    <div style="padding: 20px 20px;">
        <h1>Dodaj film</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Ime</label>
                <input type="text" name="ime" class="form-control">
            </div>
            <div class="form-group">
                <label>Zanr</label>
                <input type="text" name="zanr" class="form-control">
            </div>
            <div class="form-group">
                <label>Letnica</label>
                <input type="text" name="letnica" class="form-control">
            </div>
            <div class="form-group">
                <label>Opis</label>
                <textarea name="opis" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Dodaj" class="btn btn-primary">
        </form>
    </div>
<?php include('footer.php'); ?>