<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .circle {
      background-color: #aaa;
      border-radius: 50%;
      width: 250px;
      height: 250px;
      overflow: hidden;
      position: relative;
    }

    .circle img {
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    .circle:hover{
      opacity: 0.3;
      content: url('../storage/icons/pessoa-fisica/icon-edita.png');
    }
    </style>
  </head>
  <body>
    <br>
    <div class="circle">
    <?php
        echo "<img class='' src='https://upload.wikimedia.org/wikipedia/commons/9/9c/GNOME_Web_logo.png' alt=''>";
    ?>
    </div>
  </body>
</html>
