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

        .test{
            position: absolute;
            width:2px;
           
            /* height:54px;  exact height*/
            height: 54px;
            background-color:black;
            top:45px;
            left:45px;
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


            // na 20 udało mi się zrobić tylko tyle
            // połączenie folderów i plików liniami pionowymi do ich rodziców to wyższa szkoła jazdy i zajmie mi jeszcze trochę :)

                
            function recursive_scan($given_dir, $margin_value){

                $scanned_dir = scandir($given_dir);

                $help_margin = $margin_value.'px';

                for($i = 2; $i < count($scanned_dir); $i++){

                    if(substr($scanned_dir[$i], -4, -3) == '.'){
                        $href = $given_dir.'/'.$scanned_dir[$i];
                        echo "<a href='$href' style='margin-left: $help_margin' class='file'>".'-----'.$scanned_dir[$i]."</a>";
                    }
                    else{
                        echo "<div style='margin-left : $help_margin' class='folder'>".'<p>-----'.$scanned_dir[$i]."</p>";
                        recursive_scan($given_dir.'/'.$scanned_dir[$i], $margin_value + 50);
                        echo "</div>";
                    }
                    
                }
            };

            recursive_scan("./exampleRootFolder", 0);


        ?>

        <!-- <div class="test"></div> -->
    

        <script>

           

            
            // let nodesArray = Array.from(document.getElementsByClassName('folder')).concat(Array.from(document.getElementsByClassName('file')))

            // folderArray.forEach(element => {
                
            //     let thisFolderMargin = parseInt(element.style.marginLeft.substr(0,element.style.marginLeft.length-2))

            //     let directChilds = document.querySelector('.folder').children;


            //     console.log(directChilds)

            // });

            let folderArray = Array.from(document.getElementsByClassName('folder'))
            for(let i = 0; i < folderArray.length; i++){

                let currentFolder = folderArray[i];
                let thisFolderMargin = parseInt(currentFolder.style.marginLeft.substr(0,currentFolder.style.marginLeft.length-2))
                let directChilds = folderArray[i].children;


                // minus tagi p trzeba zrobić
                console.log(directChilds)


                //left pionowej to left dowolnego dziecka - 5px
                // height to abs(top pierwszego - top drugiego)
                // top to połowa topu ostatniego (?)

                if(directChilds.length != 1){

                    let Line_left = directChilds[1].getBoundingClientRect().left -5;
                    let Line_height = Math.abs(directChilds[1].getBoundingClientRect().top - directChilds[directChilds.length-1].getBoundingClientRect().top) -5
                    let Line_top = directChilds[directChilds.length-1].getBoundingClientRect().top / 2


                    // document.getElementsByTagName('body')[0].append(```
                
                
                    // <div class='test' style='left:${Line_left}; height:${Line_height}; top: ${Line_top}'>
                    // </div>
                
                    //     ```)
                        console.log("height:"+Line_height + " left: "+Line_left+" top: "+Line_top)
                    let div = document.createElement("DIV")
                    div.classList.add("test")
                    div.style.left = Line_left+'px'
                    div.style.top = Line_top+'px'
                    div.style.height = Line_height+'px'
                    document.getElementsByTagName('body')[0].appendChild(div);
                }
                


            }

        </script>
</body>
</html>