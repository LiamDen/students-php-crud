<?php
/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

echo 'Congratulations! You are logged in!';
require('database.php');
$query = 'SELECT *
          FROM leagues
          ORDER BY leagueID';
$statement = $db->prepare($query);
$statement->execute();
$leagues = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add team</h1>
        <form action="add_team.php" method="post" enctype="multipart/form-data"
              id="add_team_form">

            <label>League:</label>
            <select name="league_id">
            <?php foreach ($leagues as $league) : ?>
                <option value="<?php echo $league['leagueID']; ?>">
                    <?php echo $league['leagueName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name" id="username" onBlur="username_validation(); " required>
            <span id="name_err"></span>
            <br>

            <label>List Value:</label>
            <input type="input" name="foundingDate" placeholder = "Founding Date">
            <br>

            <label>List Value:</label>
            <input type="input" name="value" placeholder = "Team Value">
            <br>
            
            <label>colour:</label>
            <input type="input" name="colour" required>
            <br>
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add team">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
        <script src="validation.js"></script>
    <?php
include('includes/footer.php');
?>