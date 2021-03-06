<?php
// Get ID
$league_id = filter_input(INPUT_POST, 'league_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($league_id == null || $league_id == false) {
    $error = "Invalid league ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM leagues 
              WHERE leagueID = :league_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':league_id', $league_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the League List page
    include('league_list.php');
}
?>
