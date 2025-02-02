<?php
require_once('database.php');

// Get IDs
$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
$league_id = filter_input(INPUT_POST, 'league_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($team_id != false && $league_id != false) {
    $query = "DELETE FROM teams
              WHERE teamID = :team_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>