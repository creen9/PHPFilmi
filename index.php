<?php
    require('dbconnect.php');


    $query = 'SELECT * FROM filmi ORDER BY letnica DESC';
    $result = $conn->query($query);

    if (isset($_POST['delete'])) {
        $delete_id = $conn->real_escape_string($_POST['delete_id']);

        $query = "DELETE FROM filmi WHERE id = {$delete_id}";
        
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
        <h1>Filmi</h1>
        <?php while($film = $result->fetch_assoc()): ?>
            <div class="jumbotron" style="padding: 20px 10px;">
                <h4><?php echo $film['ime']; ?></h4>
                <small>Žanr: <?php echo $film['zanr']; ?>, Letnica: 
                <?php echo $film['letnica']; ?></small>
                <br><br>
                <p><?php echo $film['opis']; ?></p>
                <a href="<?php echo $rooturl; ?>editfilm.php?id=<?php echo $film['id']; ?>" class="btn btn-primary">Uredi</a>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="float-right" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $film['id']; ?>">
                    <input type="submit" name="delete" value="Izbriši" class="btn btn-danger">
                </form>
            </div>
        <?php endwhile; ?>
    </div>
<?php include('footer.php'); ?>