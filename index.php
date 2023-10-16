<?php
    session_start();
    $name='';
    if($_SESSION['name']){
        $name=$_SESSION['name'];
    }
    else{
        header('Location: ./login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>BINGO GAME</title>
</head>

<body>
    <div class="container-fluid text-center">
        <h1>WELCOME <?=$name?> TO BINGO GAME</h1>
        <button style="float: right;" id='logout'>Logout</button>
    </div>
    <!--BINGO ROLL-->
    <div class="container p-3 my-3 StartPlay">
        <h3>BINGO RESULT</h4>
        <table class="table table-bordered StartPlay">
            <tbody id='BingoResults'>

            </tbody>
        </table>
        <button id='RollResult'>ROLL</button>
        <span  id='BingoResult'></span>
    </div>

    <button id='GenerateCard'>Start game</button>
    <table class="table table-bordered StartPlay" id='BingoCardTable' style="width: 25%;text-align: center;">
        <thead>
            <tr>
                <th>B</th>
                <th>I</th>
                <th>N</th>
                <th>G</th>
                <th>O</th>
            </tr>
        </thead>
        <tbody id='BingoCard'>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </tbody>
    </table>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.StartPlay').hide()
        const characters = 'BINGO'
        const Bingo = [
            ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'],
            ['26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40'],
            ['41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55'],
            ['56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70'],
            ['71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85']
        ]
        let win = []
        let CurrentResult = []
        let Results = []
        $('#RollResult').click(function() {
            RollResults()
            if(CurrentResult.length == 0) CurrentResult.push(number)
            for(let x=0;x<CurrentResult.length;x++){
                if(number == CurrentResult[x]){
                    RollResults()
                }
            }
            CurrentResult.push(number)
            $('#BingoResult').text(result)
            Results.push(result)
            let num = 0
            for(let row=0;row<5;row++){
                for(let cell=0;cell<25;cell++){
                    if($('#BingoResultRow'+row).find("#BingoResultCell"+cell).text()=='')
                    {
                        $('#BingoResultRow'+row).find("#BingoResultCell"+cell).text(result)
                        return false
                    }
                    else{

                    }
                    
                }
            }

        })
        function RollResults(){
            letter = ''
            number = ''
            result = ''
            B = 0,
            I = 1,
            N = 2,
            G = 3,
            O = 4
            const charactersLength = characters.length
            for (let i = 0; i < 1; i++) {
                letter = characters.charAt(Math.floor(Math.random() * charactersLength))
            }
            let randomIndex = Math.floor(Math.random() * Bingo[eval(letter)].length)
            number = Bingo[eval(letter)][randomIndex]
            result = letter + ': ' + number
        }

        function genNum() {
            b = Math.floor((Math.random()) * (25 - 1)) + 1;
            i = Math.floor((Math.random()) * (40 - 26)) + 26;
            n = Math.floor((Math.random()) * (55 - 41)) + 41;
            g = Math.floor((Math.random()) * (70 - 56)) + 56;
            o = Math.floor((Math.random()) * (85 - 71)) + 71;
        }

        function makeNum() {
            genNum()

            if (y == 1) num = b
            if (y == 2) num = i
            if (y == 3) num = n
            if (y == 4) num = g
            if (y == 5) num = o
            numList.push(num);
            for (c = 0; c <= count; c++) {
                if (num != numList[c - 1]) {
                    good = 1
                } else {
                    good = 0
                    makeNum()
                }
            }
        }
        $('#GenerateCard').click(function() {
            $('#BingoCard').empty();
            $('#BingoResults').empty();
            $('.StartPlay').show()
            for(let row=0;row<5;row++){
                $('#BingoResults').append("<tr id='BingoResultRow"+row+"'></tr>")
                for(let cell=0;cell<25;cell++){
                    $('#BingoResultRow'+row).append("<td id='BingoResultCell"+cell+"'></td>")
                }
            }
            numList = []
            count = 1
            let start = 0
            for (x = 1; x <= 5; x++) {
                $('#BingoCard').append("<tr id='tr"+x+"'>"+"</tr>")
                for (y = 1; y <= 5; y++) {
                    makeNum();
                    if (good == 1) {
                        $('#tr'+x).append("<td id='td"+x+""+y+"'>"+num+"</td>")
                    }
                    count++;
                }
                start++
            }
            // console.log(count)
            if(start==5){
                $('#GenerateCard').hide()
            }
        })

        var table = document.getElementById("BingoCardTable");

        table.addEventListener("click", function(e) {
        if (e.target && e.target.nodeName == "TD") {
            for(let i=0;i<CurrentResult.length;i++){
                if(e.target.innerHTML == CurrentResult[i]){
                    e.target.innerHTML = 'X'
                    win.push(e.srcElement.cellIndex)
                }
            }
        }
        var unique = win.filter((value, index, array) => array.indexOf(value) === index);
        if(unique.length == 5){
            alert('YOU WIN!')

            $('.StartPlay').hide()
            $('#GenerateCard').show()
            $('#BingoResult').text('')
            win = []
            CurrentResult = []
            Results = []
        }
        })

        $('#logout').click(function(){
            $.ajax('logout.php', {
                type: 'POST',
                success: function (data) {
                    location.href = "/BingoGame/login.php";
                },
            });
        })
    })
</script>

