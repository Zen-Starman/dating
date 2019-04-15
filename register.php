<?php # register user

$page_title = 'User Registration';
require('views/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('/mysql_connect.php'); // Connect to the db.

    $errors = []; // Initialize an error array.

    // Check for a first name:
    if (empty($_POST['user_name'])) {
        $errors[] = 'Missing user name';
    } else {
        $un = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
    }

    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'Missing email address';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Passwords do not match';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'Missing password';
    }

    if (empty($errors)) { // If everything's OK.

        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO date_user (email, user_name,  password,) VALUES ('$e', '$un', SHA2('$p', 512));
		";

        $r = @mysqli_query($dbc, $q); // Run the query.

        if ($r) { // If it ran OK.

            // Print a message:
            echo '<div class="alert alert-success">You are now registered.</div>';
            require('views/footer.html');
            mysqli_close($dbc);
            exit();
        }

        $errors[] = "An account with this email address already exists";
    }

    echo '<div class="alert alert-danger"><p><b>Uh-oh!</b> Some errors occurred...</p><ul>';
    foreach ($errors as $msg) { // Print each error.
        echo "<li>$msg</li>";
    }
    echo '</ul></div>';
    mysqli_close($dbc);

} // End of the main Submit conditional.
?>
    <div class="main">
        <h1>Register</h1>

        <form action="/register.php" method="post">

            <div class="form-row">
                <div class="col-sm-6 mb-3">
                    <label for="validationDefault02">User name</label>
                    <input type="text" name="user_name" class="form-control" id="validationDefault02" placeholder="User Name" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-6 mb-3">
                    <label for="validationDefault03">Email</label>
                    <input type="email" name="email" class="form-control" id="validationDefault03" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-3 mb-3">
                    <label for="validationDefault04">Password</label>
                    <input name="pass1" type="password" class="form-control" id="validationDefault04" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="validationDefault05">Confirm Password</label>
                    <input name="pass2" type="password" class="form-control" id="validationDefault05" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" >
                </div>
            </div>

            <button class="btn btn-primary" type="submit"name="submit" value="Register">Submit form</button>
        </form>
    </div>

<?php include('views/footer.html'); ?>