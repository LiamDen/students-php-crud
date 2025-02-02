
<?php



require_once('database.php');

// Get league ID
if (!isset($league_id)) {
$league_id = filter_input(INPUT_GET, 'league_id', 
FILTER_VALIDATE_INT);
if ($league_id == NULL || $league_id == FALSE) {
$league_id = 1;
}
}

// Get name for current league
$queryLeague = "SELECT * FROM leagues
WHERE leagueID = :league_id";
$statement1 = $db->prepare($queryLeague);
$statement1->bindValue(':league_id', $league_id);
$statement1->execute();
$league = $statement1->fetch();
$statement1->closeCursor();
$league_name = $league['leagueName'];

// Get all leagues
$queryAllLeagues = 'SELECT * FROM leagues
ORDER BY leagueID';
$statement2 = $db->prepare($queryAllLeagues);
$statement2->execute();
$leagues = $statement2->fetchAll();
$statement2->closeCursor();

// Get teams for selected league
$queryteams = "SELECT * FROM teams
WHERE leagueID = :league_id
ORDER BY teamID";
$statement3 = $db->prepare($queryteams);
$statement3->bindValue(':league_id', $league_id);
$statement3->execute();
$teams = $statement3->fetchAll();
$statement3->closeCursor();

  function sortTable() {
    $queryteams = "SELECT * FROM teams
    WHERE leagueID = :league_id
    ORDER BY name";
    $statement3 = $db->prepare($queryteams);
    $statement3->bindValue(':league_id', $league_id);
    $statement3->execute();
    $teams = $statement3->fetchAll();
    $statement3->closeCursor();

  }

  if (isset($_GET['hello'])) {
    sortTable();
  }
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Team List</h1>
<aside>
<!-- display a list of leagues -->
<h2>Leagues</h2>
<nav>
<ul>
<?php foreach ($leagues as $league) : ?>
<li><a href=".?league_id=<?php echo $league['leagueID']; ?>">
<?php echo $league['leagueName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>

<section>
<!-- display a table of teams -->
<h2><?php echo $league_name; ?></h2>
<table>
<tr>
<th>Image</th>
<th onclick= "sort">Name</th>
<th>Date Founded</th>
<th>Value(M)</th>
<th>Colour</th>

</tr>
<?php foreach ($teams as $team) : ?>
<tr>
<td><img src="image_uploads/<?php echo $team['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $team['name']; ?></td>
<td class="right"><?php echo $team['foundingDate']; ?></td>
<td class="right"><?php echo $team['value']; ?></td>
<td class="right"><?php echo $team['colour']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<!-- <a href="database.php?dir=asc">Order ascending</a> 
<a href="database.php?dir=desc">Order descending</a> -->
<a href='index.php?hello=true'>Sort</a>
<p><a href="add_team_form.php">Add team</a></p>
<p><a href="league_list.php">Manage Leagues</a></p>
</section>
<?php
include('includes/footer.php');
?>