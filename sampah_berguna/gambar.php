<html>
<head>
  <title>Upload Image</title>
  <script type="text/javascript" src="../assets/js/jquery.js"</script> <!-- Plugin JQuery yang di butuhkan untuk preview image -->
  <style type="text/css" rel="stylesheet"> /* Style untuk tampilan Form upload gambar */
    #file {
      color: red;
      padding: 5px;
      border: 5px solid #8BF1B0;
      background-color: #8BF1B0;
      margin-top: 10px;
      border-radius: 5px;
      box-shadow: 0 0 15px #626F7E;
      max-width: 250px;
    }
    #image_preview{
      font-size: 30px;
      top: 100px;
      left: 100px;
      width: 250px;
      height: 230px;
      text-align: center;
      line-height: 180px;
      font-weight: bold;
      color: #C0C0C0;
      background-color: #FFFFFF;
      overflow: hidden;
    }
    .submit{
      font-size: 16px;
      background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
      border: 1px solid #e5a900;
      color: #4E4D4B;
      font-weight: bold;
      cursor: pointer;
      width: 100px;
      border-radius: 5px;
      padding: 10px 0;
      outline: none;
    }
    .submit:hover{
      background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
    }
    .wrapper {
      background: rgb(221, 221, 221) none repeat scroll 0 0;
      border-radius: 5px;
      box-shadow: 0 0 10px 0 #000;
      padding: 20px;
      position: absolute;
      text-align: center;
    }
  </style>
  <script type="text/javascript"> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimage.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '250px');
      $('#previewing').attr('height', '230px');
    }
  </script>
</head>
<body>
  <div class="wrapper">
    <h1>Upload Gambar</h1>
    <div class="main">
      <form id="form_slideshow" action="upload_image.php" method="post" enctype="multipart/form-data">
        <div style="width: 250px;">
          <div style="float: left; margin-right: 20px; padding-top: 20px;">
            <div id="image_preview"><img id="previewing" src="images/noimage.png" /></div>
            <div id="selectImage" style="margin: 50px 0 0;">
              <div style="float: left;"><input type="file" name="file" id="file" required /></div>
              <div style="clear: both;"></div>
              <div style="float: right; margin-top: 15px;"><input type="submit" value="Simpan" class="submit" /></div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
