<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>treeFiles</title>
</head>
<body>
    

    <?php
    
        function recursive_scan($given_dir, $margin_value){

            $scanned_dir = scandir($given_dir);

            for($i = 2; $i < count($scanned_dir); $i++){

                if(substr($scanned_dir[$i], -4, -3) == '.'){
                    $href = $given_dir.'/'.$scanned_dir[$i];
                    echo "<a href='$href' style='margin-left: $margin_value%'>".$scanned_dir[$i]."</a>";
                }
                else{
                    echo "<p style='margin-left : $margin_value%'>".$scanned_dir[$i]."</p>";
                    recursive_scan($given_dir.'/'.$scanned_dir[$i], $margin_value + 5);
                }

            }
        };

        recursive_scan("./exampleRootFolder", 0);
    ?>
    
</body>
</html>