<?php
include 'functions.php';

$currentDate = getCurrentDateTime();
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Ваша сторінка</title>
    
    <link rel="stylesheet" href="styles.css">
    

</head>
<body>
    
    <div class="button-container">
        <button onclick="changeNeutral()">н</button>
        <button onclick="changeBlack()()">ч</button>
      </div>
      <p>Поточна дата та час: <?php echo $currentDate; ?></p>
        
      

      <script>
        function changeNeutral() {
          document.body.style.backgroundColor = 'rgb(245, 245, 245)';
          document.body.style.color = 'black'; 
        }
        

        function changeBlack() {
          document.body.style.backgroundColor = 'rgb(51, 51, 51)'
          document.body.style.color = 'white'; 
        }
      </script>

    <div class="header">
        <h1>Warhammer 40K</h1>
    </div>
    
    <div class="main-content">
        <a class="button" href="menu.php">
            <img src="" alt=>
            Інформація
        </a>
        <a class="button" href="tehnika.html">
            <img src="" alt=>
            Техніка
        </a>
        <a class="button" href="chopa.html">
            <img src="" alt=>
            Ближній бій
        </a>
        <a class="button" href="bolter.html">
            <img src="" alt=>
            Дальній бій
        </a>
        <a class="button" href="brana.php">
            <img src="" alt=>
            Обладунки
        </a>

        
        


    </div>

    
    <div>
    
    <?php
    session_start();

    // Перевірити, чи є повідомлення про успішну реєстрацію
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        // Знищити збережене повідомлення, щоб не виводилося при подальших перезавантаженнях
        unset($_SESSION['registration_success']);
    ?>
    <div id="comments-container" class="comments-section">
    <h3>Додати коментар</h3>
    <form action="com.php" method="post" onsubmit="submitForm(); return false;">
        <input type="text" name="name" placeholder="Введіть нікнейм" required><br>
        <textarea name="comment" rows="4" placeholder="Введіть коментар" required></textarea><br>
        <button onclick="get_data()">Додати коментар</button>
    </form>

 </div>
     <?php } else {?>
  <form action="register.php" method="post">
         <label for="username">Логін:</label>
         <input type="text" name="username" required>
         <label for="password">Пароль:</label>
         <input type="password" name="password" required>
   <button type="submit">Зареєструватися</button>
   </form>
     <?php } ?>
   <style>
    .chat-message {
        padding: 8px;
        text-align: center;
        margin: 5px 0;
        border-radius: 10px;
        background-color: #fff; /* Фон кожного окремого повідомлення /
        word-wrap: break-word;
    }
    .chat-message h1 {
        font-size: 16px; / Розмір шрифту /
        margin: 0; / Знімання зовнішнього відступу */
    }
 </style>
    <div id="comments-container" class="comments-section">
    <h3>Коментарі</h3>
<?php
$comments = [];
$lines = file("aboba.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    list($name, $comment) = explode(": ", $line, 2);
    $comments[] = ["name" => $name, "comment" => $comment];
}

?>

<?php foreach($comments as $comment){ ?>
  <div>
    <b><?=htmlspecialchars($comment['name'])?></b>: <b><?=htmlspecialchars($comment['comment'])?>
  </div>
<?php } ?>

 </div>


    

   
</body>
</html>
