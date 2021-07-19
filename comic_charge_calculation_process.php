<?php
//時間を設定する
const default_entry_date = "2021-07-01 00:00:00";
const default_close_date = "2021-07-01 23:59:00";

//料金を計算

function calculation($entry_date,$closing_date,$course,$include_tax)
{
    //コース：通常料金
    if($course === "NORMAL")
    {
        $course_price = 500;
        $course_time = 1;
    }
    //コース：３時間パック
    elseif($course === "3H")
    {
        $course_price = 800;
        $course_time = 3;
    }
    //コース：５時間パック
    elseif($course === "5H")
    {
        $course_price = 1500;
        $course_time = 5;
    }
    //コース：８時間パック
    elseif($course === "8H")
    {
        $course_price = 1900;
        $course_time = 8;
    }
    //延滞料金

    //税込み、税抜の分岐処理
    return $include_tax ? floor($price * 1.1):$price;

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォームからデータを受け取る</title>
</head>
<body>
    <h1>漫画喫茶の料金計算処理</h1>
    <form action="comic_charge_calculation_process.php" method = "POST">
        入店日時:
        <input type="text" name = "entry_date" value = ""></br>
        退店日時:
        <input type="text" name = "close_date" value = ""></br>
        コースを選択:
        <select name="course">
            <option value="NORMAL" <?= $_POST['course'] == 'NORMAL' ? 'selected':""?>>通常料金</option>
            <option value="3H">３時間パック</option>
            <option value="5H">５時間パック</option>
            <option value="8H">８時間パック</option>
        </select>
        </br>
        <input type="submit" value ="送信">
    </form>
    
</body>
</html>