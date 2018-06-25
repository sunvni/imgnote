<html>
<head>
<title>Ajax Image Upload Using PHP and jQuery</title>
<link rel="stylesheet" href="css/main.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/upload.js"></script>
</head>
<body>
<div class="main">
<h1>Ajax Image Upload</h1><br/>
<hr>
<form id="uploadimage" action="upload.php" method="post" enctype="multipart/form-data">
    <div id="image_preview"><img id="previewing" src="uploads/noimage.png" /></div>
    <hr id="line">
    <div id="selectImage">
        <label>Select Your Image</label><br/>
        <input type="file" name="file" id="file"/>
        <input type="hidden" name="image" id="image"/>
        <input type="submit" value="Upload" class="submit" />
    </div>
</form>
</div>
<h4 id='loading' >loading..</h4>
<div id="message"></div>
</body>
<script>
     document.onpaste = function(event){
    var items = (event.clipboardData || event.originalEvent.clipboardData).items;
    console.log(JSON.stringify(items)); // will give you the mime types
    for (index in items) {
        var item = items[index];
        if (item.kind === 'file') {
        var blob = item.getAsFile();
        var reader = new FileReader();
        var src = '';
        reader.onload = function(event){
                src = event.target.result;
                $("#previewing").attr("src",src)
                $("#image").val(src);
            }; // data url!
        

        reader.readAsDataURL(blob);
        }
    }
    }
</script>
</html>