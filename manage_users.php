<?php
require_once('database.php');


if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'] != 1)) {
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Get users for selected league
$queryAllUsers = 'SELECT * FROM users';
$statement4 = $db->prepare($queryAllUsers);
$statement4->execute();
$users = $statement4->fetchAll();


// Get league ID
if (!isset($league_id)) {
    $league_id = filter_input(
        INPUT_GET,
        'league_id',
        FILTER_VALIDATE_INT
    );
    if ($league_id == NULL || $league_id == FALSE) {
        $league_id = 1;
    }
}
?>

<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Users List</h1>

    <section>
        <!-- display a table of players -->
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td>
                        <form action="delete_user.php" method="post" id="delete_record_form">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </section>
    <?php
    include('includes/footer.php');
    ?>