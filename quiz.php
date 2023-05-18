<?php
$questions = array(
    array(
        'questions' => '問題１の問題文',
        'choices' => array('3','4','5','6'),
        'answer' => '4'
    ),
    array(
        'question' => '問題１の問題文',
        'choices' => array('20','25','30','35'),
        'answer' => '25'
    ),
    array(
        'question' => '問題１の問題文',
        'choices' => array('20','25','30','35'),
        'answer' => '25'
    ),
);
    

// クイズページを表示する
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $question = $questions[$num - 1]['question'];
    $choices = $questions[$num - 1]['choices'];
    $answer = $questions[$num - 1]['answer'];
} else {
    $num = 0;
}

// ユーザーの回答をチェックする
if (isset($_POST['answer'])) {
    $user_answer = $_POST['answer'];
    if ($user_answer == $answer) {
        $result = '正解！';
    } else {
        $result = '不正解！';
    }
}

// 間違えた問題だけをやり直す
if (isset($_GET['retry'])) {
    $num = $_GET['retry'];
    $question = $questions[$num - 1]['question'];
    $choices = $questions[$num - 1]['choices'];
    $answer = $questions[$num - 1]['answer'];
    $result = '';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズアプリ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>クイズアプリ</h1>
    </header>
    <main>
        <?php if ($num > 0 && empty($result)) : ?>
        <h2>問題<?php echo $num; ?></h2>
        <form action="quiz.php?num=<?php echo $num; ?>" method="post">
            <p><?php echo $question; ?></p>
            <ul>
                <?php foreach ($choices as $key  => $choice): ?>
                <li><input type="radio" name="answer" value="<?php echo $key; ?>"><?php echo $choice; ?></li>
                <?php endforeach; ?>
            </ul>
            <input type="submit" value="回答する">
        </form>
            <?php elseif (!empty($result)): ?>
            <h2>結果</h2>
            <p><?php echo $result; ?></p>
            <p><a href="quiz.php?retry=<?php echo $num; ?>">間違えた問題をやり直す</a></p>
            <?php endif; ?>
    </main>
</body>
</html>