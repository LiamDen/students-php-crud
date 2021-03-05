<?php
require('database.php');

$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM teams
          WHERE teamID = :team_id';
$statement = $db->prepare($query);
$statement->bindValue(':team_id', $team_id);
$statement->execute();
$teams = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_team.php" method="post" enctype="multipart/form-data"
              id="add_team_form">
            <input type="hidden" name="original_image" value="<?php echo $teams['image']; ?>" />
            <input type="hidden" name="team_id"
                   value="<?php echo $teams['teamID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $teams['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $teams['name']; ?>">
            <br>

            <label>Value:</label>
            <input type="input" name="value"
                   value="<?php echo $teams['value']; ?>">
            <br>

            <label>Colour:</label>
            <input type="input" name="colour"
                   value="<?php echo $teams['colour']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($teams['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $teams['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>