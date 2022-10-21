<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="addReindeer">

        <div>
            <h1>Add Reindeer</h1>

            <form method="post" action="./addReindeer.php">
                <label class="simple-text" for="html">Reindeer Number:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="reindeerNr" name="Nr" value=""><br>

                <label class="simple-text">Clan name:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="reindeerClan" name="ClanName" value=""><br>

                <label class="simple-text" for="javascript">Subspecies:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="Subspecies" name="Subspecies" value=""><br>

                <label class="simple-text">Name:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="Name" name="ReindeerName" value=""><br>

                <label class="simple-text">Stink:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="Stink" name="Stink" value=""><br>

                <label class="simple-text">Region:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="Region" name="Region" value=""><br>

                <label class="simple-text">Group Bellonging:</label><br>
                <input class="table-data" style="margin-bottom: 10px" type="text" id="GroupBellonging" name="GroupBellonging" value=""><br>

                <input class="button" type="submit" value="Add">

            </form>

            <?php
            include 'functions.php';
            include 'connection.php';
            
                add_a_reindeer($pdo);
                
            ?>


        </div>
    </div>



</body>

</html>