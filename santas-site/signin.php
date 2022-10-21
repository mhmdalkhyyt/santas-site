<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"
    <title>Sign in page,,,,</title>
</head>
<body>
    <?php
        include(functions.php);
        
        echo "<div class='sign-in-container'>
        <h1>North Pole - System</h1>

        <div class='sign-in-forms'>
            <form name='username' action='mainsystem.php' method='POST'>
                <p>
                    <lable> Username: </lable>
                    <input type='text' id='user' name='username'/>
                </p>
                <p>
                    <lable> Password:</lable>
                    <input type='password' id='pass' name='pass'/>
                </p>
                <p>
                    <input type='submit' id='btn' value='Login'/>
                </p>

            </form>

        </div>
        </div>";

    ?>
</body>

</html>

