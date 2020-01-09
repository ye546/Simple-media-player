<?php
    $songlist = array();
    $dir = scandir("musik/");
    foreach($dir as $file)
    {
        $ext = pathinfo($file);
        if($ext['extension'] == 'mp3') //flush the . and ..
            array_push($songlist, $file);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>test bois</title>
</head>

<body>
    <div class="container">
        <button id="button-back">back</button>
        <button id="button-next">next</button>

        <audio id="soundplayer" controls>
            <!--mp3 = audio/mpeg, ogg = audio/ogg, wav = audio/wav-->
            <source src="" type="audio/mpeg">
        </audio>
    </div>

    <script type="text/javascript">
        var audio = document.getElementById("soundplayer");
        
        var songlist = <?php echo json_encode($songlist); ?>;
        var i = 0;
        
        //initialize the player
        audio.setAttribute("src", "musik/"+songlist[i]);

        function printfiles(songarray)
        {
            if(songarray.length <= 0)
                console.log("empty array :/");
            else
                songarray.forEach(element => console.log(element));
        }

        //just here to check if the array is empty or not,
        //confirming if converting the php array to javascript worked or not
        //printfiles(songlist);

        //incase 'i' is acting like a noob
        reset_i();

        var nextButton = document.getElementById("button-next").addEventListener("click", function () {
            if (i >= songlist.length - 1)
                console.log("already at the last song fam");
            else {
                i++;
                audio.setAttribute("src", "musik/"+songlist[i]);
                console.log("now playing " + songlist[i] + " enjoy!");
            }
        });

        var backButton = document.getElementById("button-back").addEventListener("click", function () {
            //goging backwards
            if (i == 0)
                console.log("already at the first song fam");
            else {
                i--;
                audio.setAttribute("src", "musik/"+songlist[i]);
                console.log("now playing " + songlist[i] + " enjoy!");
            }
        });

        function reset_i(i) {
            if (i <= 0)
                i = 0;
            if (i >= songlist.length);
                i = songlist.length - 1;
        }
    </script>
</body>

</html>

