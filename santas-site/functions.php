<?php

function getReindeers($pdo)
{
    echo "<table style='border: 1px solid'>";


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $querystring = 'SELECT * FROM Reindeer';
    $stmt = $pdo->prepare($querystring);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<h2>Reindeers info</h2>";
    echo "<tr class='table-head'>";
    echo    "<td>Reindeer Number</td>";
    echo    "<td>Reindeer Clan</td>";
    echo    "<td>Subspecies</td>";
    echo    "<td>Reindeer Name</td>";
    echo    "<td> Select </td>";
    echo "</tr>";

    foreach ($stmt as $key => $row) {
        echo "<tr class='table-data'>";

        echo "<td>" . $row['Nr'] . "</td>";
        echo "<td>" . $row['ClanName'] . "</td>";
        echo "<td>" . $row['Subspecies'] . "</td>";
        echo "<td>" . $row['ReindeerName'] . "</td>";
        echo "<td>" . "<form method='post' action='mainsystem.php'>" . "<input type='hidden' name='Nr' value='" . $row['Nr'] . "'/>" . "<input type='submit' class='button' value='X' id='Nr' title='Delete entry'/>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function dropDownFilter($pdo)
{


    //str_contains is missing from older versions of php
    if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }
    }

    $filterstr = "";

    if (array_key_exists('filterstr', $_POST)) {

        $filterstr = '%' . strval($_POST['filterstr']) . '%';
    }

    echo "<br>";
    echo "</br>";


    //echo "<form class='searchbox' method='post' action='mainsystem.php'>";
    echo "Filter";
    echo "</br>";
    echo "<input type='text' name='filter' value='" . $filterstr . "'>";
    echo "</form>";


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = 'SELECT ReindeerName FROM Reindeer';

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "<form method='post' action='reindeerpage.php'>";

    echo "<select name='Reindeer' value='reindeerName' style='margin: 10px; margin-bottom: 10px;'>Reindeers</option>";

    echo "<option value'' disabled select>Reindeers matching search</option>";
    foreach ($stmt as $row) {

        if (str_contains($row['ReindeerName'], $filterstr)) {

            echo "<option>" . $row['ReindeerName']  . "</option>";
        }
    }

    echo "</select>";
    echo "<input type='submit' value='Get Reindeer' />";
    echo "</form>";
}

function dropDownShowTables($pdo)
{
    echo "<br>";
    echo "</br>";
    echo "Dropdown of tables";


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='a20muhal' AND TABLE_TYPE='BASE TABLE'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "<select name='TABLE_NAME value='TABLES' style='margin-top: 10px; margin: 10px;'>TABLES</option>";


    foreach ($stmt as $row) {

        echo "<option>" . $row['TABLE_NAME']  . "</option>";
    }

    echo "</select>";
}


function initSearchBar($pdo)
{
    echo "<form method='post' action='mainsystem.php' style='margin-bottom: 20px;'
                <label class='searchbox'> Search table: <input type='text' name='searchtable'>
                </label>
                <input type='submit' value='Search'>
                
            </form>";

    echo "<b>";
}


function showTables($pdo)
{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $qstr = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='a20muhal' AND TABLE_TYPE='BASE TABLE'";
    $stmt = $pdo->prepare($qstr);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table style='border: 1px solid'>";

    foreach ($stmt as $key => $row) {
        print_r($row['TABLE_NAME']);
        echo "<br>";
        echo "</br>";
    }
    echo "</table>";
}

function displayReindeerGroups($pdo)
{
    echo "<table style='border: 1px solid'>";


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $querystring = 'SELECT * FROM GroupOfReindeers';
    $stmt = $pdo->prepare($querystring);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<h3>Reindeers info</h3>";
    echo "<tr class='table-reindeer'>";
    echo    "<td>Reindeer Number</td>";
    echo    "<td>Reindeer Name</td>";
    echo    "<td>Group Number</td>";
    echo    "<td>Capacity</td>";
    echo    "<td>Quantity</td>";
    echo "</tr>";

    foreach ($stmt as $key => $row) {
        echo "<tr class='displayReindeerGroups'>";

        echo "<td>" . $row['ReindeerNr'] . "</td>";
        echo "<td>" . $row['ReindeerName'] . "</td>";
        echo "<td>" . $row['GroupNr'] . "</td>";
        echo "<td>" . $row['Capacity'] . "</td>";
        echo "<td>" . $row['Quantity'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "</br>";
}



function Retire_a_Reindeer($pdo)
{
    $RNr = "";
    $PBNr = "";
    $FName = "";
    $TValue = "";


    if (
        array_key_exists('RNr', $_POST)
        && array_key_exists('PBNr', $_POST)
        && array_key_exists('FName', $_POST)
        && array_key_exists('TValue', $_POST)
    ) {

        $RNr = strval($_POST['RNr']);
        $PBNr = strval($_POST['PBNr']);
        $FName = strval($_POST['FName']);
        $TValue = strval($_POST['TValue']);
    }

    echo "</br>";

    echo "<h3>Retire a Reindeer</h3>";

    echo "<table>";

    echo "<form method='post' action='addReindeer.php'>";

    echo "<tr class='table-head'><td class='table-data'>Reindeer Number: </td><td><input type='text' name='RNr' value='" . $RNr . "'></td></tr>";

    echo "<tr class='table-head'><td class='table-data'>Pölsaburk Number: </td><td><input type='text' name='PBNr' value='" . $PBNr . "'></td></tr>";

    echo "<tr class='table-head'><td class='table-data'>Factory Name: </td><td><input type='text' name='FName' value='" . $FName . "'></td></tr>";

    echo "<tr class='table-head'><td class='table-data'>Taste: </td><td><input type='text' name='TValue' value='" . $TValue . "'></td></tr>";

    echo "</table>";

    echo "<input type='submit' value='Retire reindeer' name='Retire' />";

    echo "</form>";


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $querystring = 'CALL Retire_a_Reindeer(:RNr, :PBNr, :FName , :TValue)';

    $stmt = $pdo->prepare($querystring);



    $stmt->bindparam(":RNr", $RNr);
    $stmt->bindparam(":PBNr", $PBNr);
    $stmt->bindparam(":FName", $FName);
    $stmt->bindparam(":TValue", $TValue);

    $stmt->execute();


    echo "<form method='post' action='addReindeer.php'";
    echo "<h3> Retired Reindeers</h3>";
    if (isset($_POST['Retire'])) {
        $query = 'SELECT * FROM RetiredReindeer';
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        echo "<table border='3'";
        echo "<tr class='table-head'>";
        echo "<th>Reindeer Number</th>";
        echo "<th>Pölsaburk Number</th>";
        echo "<th>Factory Name</th>";
        echo "<th>Taste</th>";

        foreach ($stmt as $key => $row) {
            echo "<tr class='table-head'>";
            echo "<td class='table-data'>" . $row['ReindeerNr'] . "</td>";
            echo "<td class='table-data'>" . $row['PölsaburkNr'] . "</td>";
            echo "<td class='table-data'>" . $row['FactoryName'] . "</td>";
            echo "<td class='table-data'>" . $row['Taste'] . "</td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
}

function add_a_reindeer($pdo)
{

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['Nr'])) {

        $querystring = 'INSERT INTO Reindeer(Nr, ClanName, Subspecies, ReindeerName, Stink, Region, GroupBellonging) 
        VALUES(:Nr, :ClanName, :Subspecies, :ReindeerName, :Stink, :Region, :GroupBellonging)';

        $stmt = $pdo->prepare($querystring);

        $stmt->bindparam(':Nr', $_POST['Nr']);
        $stmt->bindparam(':ClanName', $_POST['ClanName']);
        $stmt->bindparam(':Subspecies', $_POST['Subspecies']);
        $stmt->bindparam(':ReindeerName', $_POST['ReindeerName']);
        $stmt->bindparam(':Stink', $_POST['Stink']);
        $stmt->bindparam(':Region', $_POST['Region']);
        $stmt->bindparam(':GroupBellonging', $_POST['GroupBellonging']);


        $stmt->execute();

        echo 'The Reindeer has been successfully saved.';
    }
}

/*function configureReindeerTable($pdo){
 
        $reindeerNr = $_POST["Nr"];

        echo $reindeerNr;
        
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $deletionQuerystring = 'DELETE FROM Reindeer WHERE :nr = Nr';

            $stmt = $pdo->prepare($deletionQuerystring);

        $stmt->bindparam(":nr", $reindeerNr);
        $stmt->execute();

        } catch(PDOException $e){
            echo $deletionQuerystring . "</br>" . $e->getMessage(); 
        }
       
    }*/

/* function modifierPage($pdo){

        $message = $_POST["message"];

        echo "<form method='post' action='modifyReindeer.php'>";

        echo " <input type='submit' value='Modify Reindeers' action='modifiyReindeer.php'/>";

        echo "</form>"; 

    }
*/

function toggleAddReindeer($pdo)
{
    echo "<form method='post' action='mainsystem.php'>";
    echo "<input type='hidden' name='toggleAdd'/>" . Retire_a_Reindeer($pdo) . "<input type='submit' value='Add Reindeer' />";
}
