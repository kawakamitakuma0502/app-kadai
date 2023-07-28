<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 入力値を取得する
    $Affiliation = $_POST["Affiliation"];
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $tel = $_POST["tel"];
    $title = $_POST["title"];
    $inquiry = $_POST["inquiry"];
    $date = date('Y-m-d');
    $id = 1;

    // 入力値をCSVファイルに保存する
    $values[] = [$date, $Affiliation, $name, $mail, $tel, $title, $inquiry];

    //ファイルを開く
    $handler = fopen(__DIR__.'/lib2/data.csv', 'a');

    //データを保存
    foreach($values as $value){
        //$line = implode(',' , $value);
        fputcsv($handler, $value);
    }

     //ファイルを閉じる
     fclose($handler);

    // 登録内容を表示する
    echo("<h2>登録内容"."</h2><br>");
    echo("<p>投稿日付:".$date."</p><br>");
    echo("<p>所属（企業名・部署名・役職）:".$Affiliation."</p><br>");
    echo("<p>名前:".$name."</p><br>");
    echo("<p>メール:".$mail."</p><br>");
    echo("<p>電話番号:".$tel."</p><br>");
    echo("<p>タイトル:".$title."</p><br>");
    echo("<p>問い合わせ内容:".$inquiry."</p><br>");

}
?>
<div class="section">
    <a href="index.html">戻る</a>
</div>