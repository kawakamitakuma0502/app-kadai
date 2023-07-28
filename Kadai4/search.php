<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // 入力された名前を取得する
    $title = $_GET["title"];

    // CSVファイルからユーザー情報を検索する
    //ファイルを開く
    $handler = fopen(__DIR__.'/lib2/data.csv', 'r');

    $values = [];
    while(($row = fgetcsv($handler)) != false){
        if($row[5] == $title){
            $values = $row;
        }
    }

    //ファイルを閉じる
    fclose($handler);
    // 検索結果を表示する
    if($values){
        echo("<h2>"."投稿日付:".$values[0]."</h2><br>");
        echo("<h2>"."所属（企業名・部署名・役職）:".$values[1]."</h2><br>");
        echo("<h2>"."名前：".$values[2]."</h2><br>");
        echo("<h2>"."メール:".$values[3]."</h2><br>");
        echo("<h2>"."電話番号:".$values[4]."</h2><br>");
        echo("<h2>"."タイトル：".$values[5]."</h2><br>");
        echo("<h2>"."問い合わせ内容：".$values[6]."</h2><br>");
    }elseif(!$values){
        echo("<h2>"."結果無し"."</h2><br>");
    }
}
?>
