<html>

    <head>
        <style>
            .game{
                text-align: center;
                width:100%;
            }
            table,tr,td{
                border: black 3px solid;
                border-collapse: collapse;
            }
            td{
                color: black;
                width:70px;
                height: 70px;
            }
        </style>
        <script>
            window.onkeyup = function (e) {
                var key = e.keyCode ? e.keyCode : e.which;

                if (key == 38) {
                    document.getElementById("up").click();
                } else if (key == 40) {
                    document.getElementById("down").click();
                } else if (key == 39) {
                    document.getElementById("left").click();
                } else if (key == 37) {
                    document.getElementById("right").click();
                }
            }
        </script>            
    </head>
    <body>
        <?php $grid = $game->getGrid(); ?>
        <div class="game">
            <table>
                <?php
                foreach ($grid as $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        if ($cell) {
                            echo "<td class='$cell'>$cell</td>";
                        } else {
                            echo "<td style='background:lightblue;'> </td>";
                        }
                    }
                    echo '</tr>';
                }
                ?>               
            </table>
            <br>
            <form method='POST' action=''>
                <input type='submit' name='input' value='up' id='up'>
                <br>
                <input type='submit' name='input' value='right' id='right'>
                <input type='submit' name='input' value='left' id='left'>
                <br>
                <input type='submit' name='input' value='down' id='down'> 
                <br><br>
                <input type='submit' name='input' value='reset'> 
            </form>
        </div>
    </body>

</html>