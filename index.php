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
            display: block;
           
        }

        .vertical-line{
            position: absolute;
            width:2px;
            background-color:black;
        }

        p::before, a::before{
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
  
            function recursive_scan($given_dir, $margin_value){

                $scanned_dir = scandir($given_dir);
                $help_margin = $margin_value.'px';

                for($i = 2; $i < count($scanned_dir); $i++){

                    //plik
                    if(substr($scanned_dir[$i], -4, -3) == '.'){
                        $href = $given_dir.'/'.$scanned_dir[$i];
                        echo "<a href='$href' style='margin-left: $help_margin' class='file'>".'-----'.$scanned_dir[$i]."</a>";
                    }
                    //folder
                    else{
                        echo "<div style='margin-left : $help_margin' class='folder'>".'<p>-----'.$scanned_dir[$i]."</p>";
                        recursive_scan($given_dir.'/'.$scanned_dir[$i], $margin_value + 20);
                        echo "</div>";
                    }
                    
                }
            };

            recursive_scan("./", 0);


        ?>

    

        <script>

            let folderArray = Array.from(document.getElementsByClassName('folder'))
            for(let i = 0; i < folderArray.length; i++){

                let directChilds = folderArray[i].children;
                if(directChilds.length != 1){

                    //left pionowej to left dowolnego dziecka - 5px
                    // height to abs(top pierwszego - top ostatniego) + 10px
                    // top to top pierwszego dziecka

                    let Line_left = directChilds[1].getBoundingClientRect().left -5;
                    let Line_height = Math.abs(directChilds[1].getBoundingClientRect().top - directChilds[directChilds.length-1].getBoundingClientRect().top) + 10
                    let Line_top = directChilds[1].getBoundingClientRect().top

                    let div = document.createElement("DIV")
                    div.classList.add("vertical-line")
                    div.style.left = Line_left+'px'
                    div.style.top = Line_top+'px'
                    div.style.height = Line_height+'px'
                    document.getElementsByTagName('body')[0].appendChild(div);
                }
                


            }

        </script>
</body>
</html>