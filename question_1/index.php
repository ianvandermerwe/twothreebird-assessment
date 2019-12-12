<?php
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>

  <style>
    #container {
      border: 1px solid #000;
      padding: 20px;
      width:
    }
  </style>
</head>
<body>
<!--<h1>Question 1</h1>-->

<p>Drag and Drop Option:</p>
<p>Drag an image into the container below</p>

<br>
<div id="container">
  <form class="upload">
    <div id="container_preview">
    </div>
  </form>
</div>

<br>
<p>Or type an url of a public image below:</p>
<br>

<input type="text" id='image_input' name="image_input" />
<button type="button" onclick="fetchImageUsingInput()">Confirm</button>


<script type="text/javascript">
  let dropbox = document.getElementById("container");

  function preventDefaultBehavior(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ["dragenter", "dragover", "dragleave", "drop"].forEach(eventName => {
    dropbox.addEventListener(eventName, preventDefaultBehavior, false);
    document.body.addEventListener(eventName, preventDefaultBehavior, false);
  });

  dropbox.addEventListener("drop", function (e) {
    var dataTransfer = e.dataTransfer;

    let reader = new FileReader();
    reader.readAsDataURL(dataTransfer.files[0]);

    reader.onloadend = () => {
      let img = document.createElement("img");
      img.src = reader.result;
      const parentNode = document.getElementById("container_preview");
      if (parentNode.children[0] != null) {
        parentNode.removeChild(parentNode.children[0]);
      }
      parentNode.appendChild(img);
    };
  });

  function fetchImageUsingInput() {
    var src = document.getElementById("image_input").value;

    let imgDomElement = document.createElement("img");
    imgDomElement.src = src;
    const parentDomElement = document.getElementById("container_preview");

    if (parentDomElement.children[0] != null) {
      parentDomElement.removeChild(parentDomElement.children[0]);
    }

  parentDomElement.appendChild(imgDomElement);
  }

</script>
</body>
</html>
