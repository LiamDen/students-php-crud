<?php
    require_once('database.php');

    // Get all leagues
    $query = 'SELECT * FROM leagues
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
    <h1>League List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($leagues as $league) : ?>
        <tr>
            <td><?php echo $league['leagueName']; ?></td>
            <td>
                <form action="delete_league.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="league_id"
                           value="<?php echo $league['leagueID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add League</h2>
    <form action="add_league.php" method="post"
          id="add_league_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_league_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>