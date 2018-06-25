<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/style.css">
<meta charset=utf-8 />
<style>
  body { font-family: sans-serif; }
  #container {
    width:  400px;
    height: 300px;
    border: 1px solid #c3c3c3;
    background:  #ddd;
    line-height: 300px;
    text-align:  center;
    color:  #666;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
  }
  #container>img {
    width:  400px;
    height: 300px;
}
</style>
</head>
<body>
  <div id="container">
    <img id="image" src="<?php echo $_SESSION['img'];?>">
  </div>
  <div>
      <form action="" method="post" class="form">
          <label for="top">TOP</label>
          <input type="text" id="top" name="top">
          <label for="left">LEFT</label>
          <input type="text" id="left" name="left">
          <label for="width">WIDTH</label>
          <input type="text" id="width" name="width">
          <label for="height">HEIGHT</label>
          <input type="text" id="height" name="height">
          <br>
          <hr>
          <label for="comment">COMMENT</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <button>Save</button>
      </form>
  </div>
</body>

<script src="js/main.js"></script>
<script src="js/jquery-ui.min.js"></script>
</html>