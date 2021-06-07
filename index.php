<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>treeFiles</title>


    <style>

        *{
            margin:0;
            padding:0;
            position: relative;
        }
        a{
            text-decoration:none;
           
        }

        .test{
            position: absolute;
            width:2px;
            height:18px;
            background-color:black;
            top:54px;
            left:100px;
        }

        a::before{
            content:'';
            position: absolute;
            background-color:black;
            height:3px;
            width:30px;
            top:50%;
            left:-5px;
        }
        p::before{
            content:'';
            position: absolute;
            background-color:black;
            height:3px;
            width:30px;
            top:50%;
            left:-5px;
        }

    </style>
</head>
<body>
    

        <?php


            // zapisywać parenta folderu albo pliku?
                
            function recursive_scan($given_dir, $margin_value){

                $scanned_dir = scandir($given_dir);

                $help_margin = $margin_value.'px';

                for($i = 2; $i < count($scanned_dir); $i++){

                    if(substr($scanned_dir[$i], -4, -3) == '.'){
                        $href = $given_dir.'/'.$scanned_dir[$i];
                        echo "<a href='$href' style='margin-left: $help_margin'>".'-----'.$scanned_dir[$i]."</a><br/>";
                    }
                    else{
                        echo "<p style='margin-left : $help_margin'>".'-----'.$scanned_dir[$i]."</p>";
                        recursive_scan($given_dir.'/'.$scanned_dir[$i], $margin_value + 50);
                    }

                }
            };

            recursive_scan("./exampleRootFolder", 0);


        ?>

        <div class="test"></div>
    
</body>
</html>