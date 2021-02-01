<?php

if ($_SERVER ["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
</head>
<body>
    <form method="post">

    <!-- <select name="make" id="">
        <option value="bmw">BMW</option>
        <option value="ford">Ford</option>
        <option value="saab" selected>Saab</option>
    </select> -->
<fieldset>
<legend>
    Article
</legend>
<div>
    <label for="title">Title</label>: <input type="text" name="title" id="title" placeholder="Article title" readonly>
</div>

<div>
    Content: <textarea name="content" cols="40" rows="4" placeholder="Content"></textarea>
</div>

</fieldset>

<fieldset>
    <legend>Attributes</legend>
<div>
    <!-- Wrapping the input with the label eliminates the need for an ID and for attributes to get same result -->
    <label ><input type="checkbox" name="checkbox" value="yes" checked>Visible</label>
</div>
</fieldset>

<fieldset>
    <legend>Color</legend>
  
    <input type="radio" name="color" value="blue" id="color_blue" checked>
    <label for="color_blue">Blue</label><br>
    <input type="radio" name="color" value="red" id="color_red" disabled>
    <label for="color_red">Red</label><br>
    <input type="radio" name="color" value="green" id="color_green">
    <label for="color_green">Green</label><br>

</fieldset>

    <button>Send</button>
    
    </form>
</body>
</html>