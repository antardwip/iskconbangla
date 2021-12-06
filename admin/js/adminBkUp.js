var pageNumber=1;
let allNewsStorage=[];
var loginID="newsItem";

$(document).ready(function() {
	try{
		var socket=io("https://iskconbangla.ap-1.evennode.com");
		socket.emit('allNewsGet');


//***********************use this on its own to re-do all news boxes if things go wrong - possibly get new evennode server as well
//**********************also hide socket.emit('allNewsGet'); above.
//		function instantiate(){
//			for(var j=1;j<50;j++){
//				var saveAs ='newsItem'+j;
//				var data= {"_id":saveAs};
//				console.log("1saveAs = "+saveAs);
//				data['savedNewsTitle']="Title"+j;
//				data['savedNewsText']="Main text here";
//				data['savedShortenedNewsText']="Shortened text here";
//				data['savedNewsImage']="jpg";
//				data['savedBlockPlacement']=j;
//				data['savedSpareOne']="YT";
//				const d = new Date();
//				let time = d.getTime();
//				data['savedNewsTimepassed']=time
//				$('#title-input').val("updating...");
//				socket.emit('updateNews',data,saveAs);
//			}
//		}
//instantiate();
// ******************************creating the server storage - run this first, and only one time, and nothing else. 
//******************************Hide again after use, and run admin after clearing cache.

		//Send to update news title
		$("#title-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			console.log("1saveAs = "+saveAs);
			data['savedNewsTitle']=$('#title-input').val();
			$('#title-input').val("updating...");
			socket.emit('updateNews',data,saveAs);
		});
		//Send to update news main text
		$("#maintext-button").click(function() {
			console.log("in maintext button ");
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			var data2= {"_id":saveAs};
			console.log("2saveAs = "+saveAs);
			data['savedNewsText']=document.getElementById("maintext-input").value;
		//data2['savedNewsText']=document.getElementById("maintext-input").value;

			//shortened news main text - updating automatically
			var yourString = document.getElementById("maintext-input").value; 
//console.log("yourString  = "+yourString);
			var maxLength = 75// maximum number of characters to extract
			var trimmedString = yourString.substr(0, maxLength);//trim the string to the maximum length
//console.log("trimmedString2  = "+trimmedString);
			data2['savedShortenedNewsText']=trimmedString;
			console.log("3saveAs = "+saveAs);
			document.getElementById("maintextshortened-input").value="updating...";
			document.getElementById("maintext-input").value="updating...";
			socket.emit('updateNews',data,saveAs);
			socket.emit('updateNews',data2,saveAs);
		});

		//Send to update news image
		$("#image-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			console.log("4saveAs = "+saveAs);
			data['savedNewsImage']=$('#image-input').val();
			$('#image-input').val("updating...");
			socket.emit('updateNews',data,saveAs);
		});

		//Send to update news time passed
		$("#timepassed-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			const d = new Date();
			let ms = d.valueOf();
			data['savedNewsTimepassed']=ms;
console.log(ms);
			$('#timepassed-input').val("updating...");
			socket.emit('updateNews',data,saveAs);
		});

		//Send to update which block the news-item goes to in the website front page 
		$("#blockplacement-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
console.log("5.5pageNumber = "+pageNumber);
			console.log("5.5saveAs = "+saveAs);
			data['savedBlockPlacement']=$('#blockplacement-input').val();
			$('#blockplacement-input').val("updating...");
			socket.emit('updateNews',data,saveAs);
		});

		$("#maintextshortened-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			console.log("6saveAs = "+saveAs);
			data['savedShortenedNewsText']=document.getElementById("maintextshortened-input").value;
			console.log("saveAs = "+saveAs);
			document.getElementById("maintextshortened-input").value="updating...";
			socket.emit('updateNews',data,saveAs);
		});

		$("#youtube-button").click(function() {
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			var data= {"_id":saveAs};
			console.log("saveAs = "+saveAs);
				var felix=$('#youtube-input').val();
				if(felix.indexOf("100%")===-1&&felix!==""){
					felix=felix.slice(0,felix.indexOf("width"))+'width="100%" height="100%"'+felix.slice(felix.indexOf("src")-1);
				}

			data['savedSpareOne']=felix;
			document.getElementById("youtube-input").value="updating...";
			socket.emit('updateNews',data,saveAs);
		});

		//receive updates to news from server
		socket.on('newsUpdated', function(anArray) {
			var allNewData = anArray;
			var currentBlock=pageNumber;
			var saveAs ='newsItem'+currentBlock;
			//console.log("saveAs = "+saveAs);
			
			for (var j in allNewData) {
				//console.log("j = "+j);
				var allData = allNewData[j];
				//console.log("allNewData[j]= "+allNewData[j]);
				//console.log("allData= "+allData);
				if(j==='_id'){
console.log("j = "+j);
console.log("allData = "+allData);

				}





				if(j==='savedNewsTitle'){
					$('#title-input').val(allData);
					allNewsStorage[saveAs]['savedNewsTitle']=allData;
				}
				if(j==='savedNewsText'){
					document.getElementById("maintext-input").value=allData;
					allNewsStorage[saveAs]['savedNewsText']=allData;
				}
				if(j==='savedNewsImage'){
					$('#image-input').val(allData);
					allNewsStorage[saveAs]['savedNewsImage']=allData;
				}
				if(j==='savedNewsTimepassed'){
					$('#timepassed-input').val(allData);
					allNewsStorage[saveAs]['savedNewsTimepassed']=allData;
				}
				if(j==='savedBlockPlacement'){
					$('#blockplacement-input').val(allData);
					allNewsStorage[saveAs]['savedBlockPlacement']=allData;
					orderPages ();
				}
				if(j==='savedShortenedNewsText'){
					document.getElementById("maintextshortened-input").value=allData;
					allNewsStorage[saveAs]['savedShortenedNewsText']=allData;
				}
				if(j==='savedSpareOne'){
					document.getElementById("youtube-input").value=allData;
					allNewsStorage[saveAs]['savedSpareOne']=allData;
				}
			}
		})

		$(".sub-arrow").click(function() {
			$('#title-input').val('');
			document.getElementById("maintext-input").value='';
			$('#image-input').val('');
			$('#timepassed-input').val('');
			$('#blockplacement-input').val('');
			document.getElementById("maintextshortened-input").value='';
			//var fieldName=$(this).attr("id");
			//pageNumber=fieldName.substring(4,fieldName.length);
			var fieldName=$(this).text();

			var matches = fieldName.match(/\d+$/);//extract number
			if (matches) {
			    pageNumber = matches[0];
			}

			//pageNumber=fieldName.substring(fieldName.lastIndexOf("newsItem")+8,fieldName.length);
			insertValues();
		})

		socket.on('allNewsStoriesFromServer', function(anArray) {
			console.log("News Stories FromServer");
			var allNewData = anArray;
			for (var j in allNewData){
				var allData=allNewData[j];
				if (allData.hasOwnProperty('_id')){
					var fred=allData['_id'];
					//console.log(">>>>>>>>>>>>>>>_id = "+fred);
					allNewsStorage[fred]={savedNewsTitle:allData['savedNewsTitle'],savedNewsText:allData['savedNewsText'],savedNewsImage:allData['savedNewsImage'],savedNewsTimepassed:allData['savedNewsTimepassed'],savedBlockPlacement:allData['savedBlockPlacement'],savedShortenedNewsText:allData['savedShortenedNewsText'],savedSpareOne:allData['savedSpareOne']};
				//console.log("allNewsStorage[fred][savedNewsTitle] = "+allNewsStorage[fred]['savedNewsTitle']);
				}
			}
			insertValues();
		})

		function insertValues(){
			var fred ='newsItem'+pageNumber;
			console.log("44444444pageNumber = "+pageNumber);
			if(allNewsStorage[fred]){
			console.log(fred+": "+allNewsStorage[fred]["savedBlockPlacement"]);
				$('#title-input').val(allNewsStorage[fred]["savedNewsTitle"]);
				document.getElementById("maintext-input").value=allNewsStorage[fred]["savedNewsText"];
				$('#image-input').val(allNewsStorage[fred]["savedNewsImage"]);
				if (allNewsStorage[fred]["savedNewsImage"]!==undefined&&allNewsStorage[fred]["savedNewsImage"].length>3){
					var iconlink="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]["savedNewsImage"];
				}else{
					var iconlink="";
				}
				$("#chnlinfoThumbnailPicUrlJpg img").attr("src",iconlink);
				$('#youtube-input').val(allNewsStorage[fred]["savedSpareOne"]);
				$('#timepassed-input').val(allNewsStorage[fred]["savedNewsTimepassed"]);
				$('#blockplacement-input').val(allNewsStorage[fred]["savedBlockPlacement"]);
				document.getElementById("maintextshortened-input").value=allNewsStorage[fred]["savedShortenedNewsText"]
			}
			orderPages();
		}



		function orderPages(){
			$(".sub-arrow").text("").css("display","none");

			for(var j=1;j<17;j++){
				var fred ='newsItem'+j;
				if(allNewsStorage[fred]){
					
					var blockMovedTo=allNewsStorage[fred]["savedBlockPlacement"];
					//fred is the storage name (newsItem1 - 12), blockMovedTo is its position (1 - 12)
					if(j===1){
						fred="Namahatta 1";
					}else if(j===2){
						fred="Namahatta 2";
					}
					if(fred.indexOf(loginID)!==-1||loginID==="newsItem"){
						//$("#page"+j).text($("#page"+blockMovedTo).text());
						$("#page"+blockMovedTo).text(fred).css("display","block");
					}else{
						//$("#page"+blockMovedTo).css("display","none");
					}

					//$("#page"+j).text("page"+blockMovedTo);
				}
			}

			//if(loginID==="newsItem"){
			//	$(".sub-arrow").css("display","block")
			//}
		}
	}catch(e){
		console.log("fault in socket connection");
	}

		$("#loggin").click(function() {
			var holdPassword=	$('#password-input').val();
			console.log("h>>>>oldPassword= "+holdPassword);
			if(holdPassword==="8041hkHR"){
				loginID="newsItem";
			}
			if(holdPassword==="hamanatta"){
				loginID="Namahatta";
			}
			$('.screenCover').css("display","none");
			console.log("l>>>>oginID: "+loginID);
			insertValues ();
if(loginID==="newsItem"){
	$(".hide").css("display","block");
}else{
	$(".hide").css("display","none");
}
		})




function startClock() {
	var adate = new Date();
	// convert to msec, add local time zone offset, get UTC time in msec
	var utc = adate.getTime() + (adate.getTimezoneOffset() * 60000);
	// create new Date object for different city, using supplied offset
	Global.nd = utc; //for live channel-list times
	var nd = new Date(utc + (3600000 * Global.TimeZone));
  var nhour = nd.getHours();
  var nmin = nd.getMinutes();
  if (nmin <= 9) {
    nmin = "0" + nmin;
  }
  if (nhour <= 9) {
    nhour = "0" + nhour;
  }
  $(".channel-time-holder").text(nhour + ":" + nmin);
	clearTimeout(Global.handle);
	Global.handle = setTimeout(function() {
		startClock();
	}, 1000)
}
})
