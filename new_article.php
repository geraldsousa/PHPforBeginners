<?php 

require 'includes/header.php'; 
require 'includes/database.php';

// Include code to process form data 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = getDB();

    // $sql = "INSERT INTO article (title, content, publish_dt) 
    //    VALUES ('" . $_POST['title'] . "', '" 
    //               . $_POST['content'] . "', '"
    //               . $_POST['publish_dt'] . "');";

    $sql = "INSERT INTO article (title, content, publish_dt) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {

        mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['publish_dt']);
        
        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

?>

<h2>New Article</h2>

<form action="" method="post">
<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title">
</div>

<div>
    <label>Content <textarea name="content" cols="50" rows="10"></textarea></label>

</div>

<div>
    <label for="publish_dt">Publish Date</label>
    <input type="datetime-local" name="publish_dt" id="publish_dt" placeholder="Publish Date">

</div>
<button>Add</button>
</form>

<?php require 'includes/footer.php'; ?>
