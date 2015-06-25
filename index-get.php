<!DOCTYPE html>
<html>
    <body>
        
        <h1>PHP Form Validation Example</h1>
        
        <form action="welcome_get.php" method="get">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="email" name="email"><br>
            Website: <input type="text" name="website"><br>
            Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
            
            Gender: <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            
            <input type="submit">
        </form>

<?php

    $x = 2;
    $y = 7;
    
function sayHi(){
    echo "My first PHP script!";
}

sayHi();

add($x, $y);

function add($newX, $newY){

    $result = $newX + $newY;
    
    echo $result;

}

?>

    </body>
</html>