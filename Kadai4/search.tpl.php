<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>問い合わせ情報検索</title>
</head>
<body>
    <h1>問い合わせ情報検索</h1>
    <form method="GET" action="search.php">
        <?php 
        $handler = fopen(__DIR__.'/lib2/data.csv', 'r'); 
        echo "<table>
                <tr>
                    <th>投稿日付</th>
                    <th>名前</th>
                    <th>タイトル</th>
                </tr>";
        while($line = fgetcsv($handler)) {
            echo "<tr>";
            for ($i=0;$i<count($line);$i++) {
                if($i == 0 || $i == 2){
                    echo "<td>" . $line[$i] . "</td>";
                }
                else if($i == 5){
                    echo "<td>".'<a href="search.php?title=' . $line[5] . '"' .">". $line[$i] ."</a></td>";
                }
            }
            echo "</tr>";
            $id ++;
        }
        echo "</table>";

        fclose($handler);
        ?>
    </form>
</body>
</html>
