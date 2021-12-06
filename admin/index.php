<!DOCTYPE html>
<html lang="en">
<head>
    <title>ISKCONBangla Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://iskconbangla.ap-1.evennode.com/socket.io/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      </head>
<body>

<header class="ibm-strip"><div><img src="pics/iskcon-bangla-logo.jpg" style="height: 35px"/><span id="align_right">ISKCONBANGLA.COM</span></div>
</header>

<div id="whole-page">
	<div id="all-arrows">
		<div class="communicate-arrow">
			Select&nbsp;Page:
		 </div>
		<span>1:</span><div class="sub-arrow" id="page1">newsItem1</div><br>
		<span>2: </span><div class="sub-arrow" id="page2">newsItem2</div><br>
		<span>3: </span><div class="sub-arrow" id="page3">newsItem3</div><br>
		<span>4: </span><div class="sub-arrow" id="page4">newsItem4</div><br>
		<span>5: </span><div class="sub-arrow" id="page5">newsItem5</div><br>
		<span>6: </span><div class="sub-arrow" id="page6">newsItem6</div><br>
		<span>7: </span><div class="sub-arrow" id="page7">newsItem7</div><br>
		<span>8: </span><div class="sub-arrow" id="page8">newsItem8</div><br>
		<span>9: </span><div class="sub-arrow" id="page9">newsItem9</div><br>
		<span>10: </span><div class="sub-arrow" id="page10">newsItem10</div><br>
		<span>11: </span><div class="sub-arrow" id="page11">newsItem11</div><br>
		<span>12: </span><div class="sub-arrow" id="page12">newsItem12</div><br>
		<span>13: </span><div class="sub-arrow" id="page13">newsItem13</div><br>
		<span>14: </span><div class="sub-arrow" id="page14">newsItem14</div><br>
		<span>15: </span><div class="sub-arrow" id="page15">newsItem15</div><br>
		<span>16: </span><div class="sub-arrow" id="page16">newsItem16</div><br>
	</div>
	



	<div class="admin-pages" id="admin-class">
		<br>
		<h2>News: Title</h2>
		<input class="inputtext" type="text" id="title-input" maxlength="500" value="">&nbsp;&nbsp;&nbsp;
		<br><br>
		<button id='title-button' class="ghost-button" type="button"/>Update News Title</button>
		<br><br><br>

		<h2>News: Image (optional)</h2>
		<div class="sectionnotes">
			Size should be 225px wide x 130px high<br>
			The format should be .jpg<br>
		</div>
		<strong>Upload channel thumbnail image .jpg 900px wide x 506px  high (16:9 ratio)</strong><br><br>
		<div class="upload" onclick="window.open(&quot;https://www.iskconbangla.com/img/news/upload.php&quot;, &quot;_blank&quot;, &quot;toolbar=yes, scrollbars=yes, resizable=yes, top=0, left=0, width=540, height=400&quot;)" style="top: auto; bottom: 0px;">UPLOAD .JPG FILE</div>
		<br>
		Now enter the filename of your new thumbnail image in the field below.<br>
		When you click 'Submit', the image beneath should update.
		<br><br>
		<label class="verticalfield">File name: </label>
		<input class="inputtext" type="text" id="image-input" maxlength="100" value="">
		<span class="cbfieldnote"> ...must end in .jpg.</span>
		<button id='image-button' class="update-channel-listing-button" type="button"/>Submit</button>
		<br><br>
		<div id="chnlinfoThumbnailPicUrlJpg"><img src="https://www.mayapur.tv/images/thumbs/fallbackicon.jpg"/></div>
		<br><br><br>

		<h2>News: YouTube iFrame (optional)</h2>
		<div>
			<form method="post">
				<textarea id="youtube-input" style="width:565px"></textarea>
			</form>
		</div>
		<br>
		<button id='youtube-button' class="ghost-button" type="button"/>Enter YouTube iFrame (if necessary)</button>
		<br><br><br>

		<h2>News: Main text</h2>
		<div id="eighty">
			<form method="post">
				<textarea id="maintext-input" style="height: 200px;width: 565px"></textarea>
			</form>
		</div>
		<br>
		<button id='maintext-button' class="ghost-button" type="button"/>Update main news text</button>
		<br><br><br>

		<h2>News: Shortened Main text (front-page only)</h2>
		<div>
			<form method="post">
				<textarea id="maintextshortened-input" style="height: 100px;width: 565px"></textarea>
			</form>
		</div>
		<br>
		<button id='maintextshortened-button' class="ghost-button" type="button"/>Update shortened main text (if neccessary)</button>
		<br><br><br>

		<h2>News:Comment Main text (one-liner - front-page only)</h2>
		<div>
			<form method="post">
				<textarea id="maintextcomment-input" style="height: 25px;width: 565px"></textarea>
			</form>
		</div>
		<br>
		<button id='maintextcomment-button' class="ghost-button" type="button"/>Add one-line comment to main text (when showing image on front page)</button>
		<br><br><br>


		<h2>News: Creation time</h2>
		<div>
			<input class="inputtext" type="text" id="timepassed-input" maxlength="100" value="">
			<button id='timepassed-button' class="update-channel-listing-button" type="button"/>Update to current time</button>
		</div>
		<br><br><br>


		<h2 class="hide">News: Block Placememt</h2>
		<div class="hide">
			<input class="inputtext" type="text" id="blockplacement-input" maxlength="100" value="">
			<button id='blockplacement-button' class="update-channel-listing-button" type="button"/>Update block placement (1 to 16)</button>
		</div>
		<br><br><br>






	</div>
</div>
<div class="screenCover">
<br><br><br><br><br><br><br><br>
<div style="width:300px;margin:auto">
			<input class="inputtext" type="text" id="password-input" maxlength="100" value="">
			<button id='loggin' class="update-channel-listing-button" type="button"/>password please.
</div>
</div>


    <script type="text/javascript" src="js/admin.js"></script>
</body>
</html>
