var pageNumber=10;
var allNewsStorage={};
let banglaNumber = {
	0: "০",
	1: "১",
	2: "২",
	3: "?",
	4: "৪",
	5: "৫",
	6: "৬",
	7: "৭­",
	8: "৮",
	9: "৯",
};

$(document).ready(function() {

	try {
		var socket = io("https://iskconbangla.ap-1.evennode.com");
		socket.emit('allNewsGet');
		socket.on('allNewsStoriesFromServer', function(anArray) {
			console.log("News Stories FromServer");
			var allNewData = anArray;
			for (var j in allNewData){
				var allData=allNewData[j];
				//console.log("_id = "+allData['_id']);
				for (var i in allData) {	
					//console.log("new clicklist data i = "+i+": "+allData[i]);
					if (allData.hasOwnProperty('_id')){
						var fred=allData['_id'];
						
						allNewsStorage[fred]={savedNewsTitle:allData['savedNewsTitle'],savedNewsText:allData['savedNewsText'],savedNewsTextEntire:allData['savedNewsTextEntire'],savedNewsImage:allData['savedNewsImage'],savedNewsTimepassed:allData['savedNewsTimepassed'],savedBlockPlacement:allData['savedBlockPlacement'],savedShortenedNewsText:allData['savedShortenedNewsText'],savedSpareOne:allData['savedSpareOne']};

						//console.log("allNewsStorage[fred][savedNewsTitle] = "+allNewsStorage[fred]['savedNewsTitle']);
					}
				}
			}
			var blockNumber='abc';
			for (var fred in allNewsStorage) {
				if(allNewsStorage[fred]['savedBlockPlacement']){
				    blockNumber=allNewsStorage[fred]['savedBlockPlacement'].toString();
				//console.log("number = "+fred+"is placed at blockNumber = "+blockNumber+" with title: "+allNewsStorage[fred]['savedNewsTitle']);
				    $('#'+blockNumber+' .news-title').html(allNewsStorage[fred]['savedNewsTitle']);


				if((!allNewsStorage[fred]['savedSpareOne']||allNewsStorage[fred]['savedSpareOne'].length<4)&&(!allNewsStorage[fred]['savedNewsImage']||allNewsStorage[fred]['savedNewsImage'].length<4)){
					$('#'+blockNumber+' .news-body').text(allNewsStorage[fred]['savedShortenedNewsText']);
				}else if(allNewsStorage[fred]['savedSpareOne']&&allNewsStorage[fred]['savedSpareOne'].length>40){
					$('#'+blockNumber+' .news-body').html(allNewsStorage[fred]['savedSpareOne']);
				}else if(allNewsStorage[fred]['savedNewsImage']&&allNewsStorage[fred]['savedNewsImage'].length>4){

					var newImage="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]['savedNewsImage']
//console.log("newImage = "+newImage)
					var newImage="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]['savedNewsImage']
var newerImage='<img src="'+newImage+'">'
//console.log("newerImage = "+newerImage)
					$('#'+blockNumber+' .news-body').html('<img src="'+newImage+'">')
				}
				

  var startTime=allNewsStorage[fred]['savedNewsTimepassed']

const engToBdNum = (str) => {
	for (var x in banglaNumber) {
		str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
	}
	return str;
};

const d = new Date();
let endTime = d.valueOf();
  var timeDiff = endTime - startTime; //in ms
  // strip the ms
  timeDiff /= 1000;


  // get seconds 
  var seconds = Math.round(timeDiff);
  console.log(seconds + " seconds");
//get mins
var mins=Math.round(seconds/60);
var hrs=Math.round(mins/60);
var days=Math.round(hrs/24);
var weeks=Math.round(days/7);
//console.log("**************************")
//console.log(" >>>>>>>>>>>>>blockNumber = "+blockNumber);
//console.log("startTime = "+startTime);
//console.log("endTime = "+endTime);
//console.log("weeks = "+weeks);
//console.log("secs = "+seconds);
//console.log("hours = "+hrs);
//console.log("days = "+days);
//console.log("**************************")

if(weeks>0){
console.log("1days inside");
	  $('#'+blockNumber+' .news-footer').text("এক সপ্তাহেরও বেশি আগে");
}else if(days>1){
	var days=engToBdNum(days.toString());
	 $('#'+blockNumber+' .news-footer').text(days+" দিন আগে");
}else if(days===1){
	$('#'+blockNumber+' .news-footer').text("১ দিন আগে");
}else if(hrs>1){
	var hrs=engToBdNum(hrs.toString());
	  $('#'+blockNumber+' .news-footer').text(hrs+" ঘণ্টা আগে");
}else if(hrs===1){
	  $('#'+blockNumber+' .news-footer').text("১ ঘণ্টা আগে");
}else{
	var mins=engToBdNum(mins.toString());
	  $('#'+blockNumber+' .news-footer').text(mins+" মিনিট আগে");
}
				}
	    		}
		})

	} catch (e) {
		console.log("oh no");
	}

	var todayBangla="";



const engToBdNum = (str) => {
	for (var x in banglaNumber) {
		str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
	}
	return str;
};



	const d = new Date();
	var today = d.toUTCString()
	var monthBangla="";
	today=today.substring(0,today.indexOf("202")+4);

	if(today.indexOf("Mon")!==-1){
		todayBangla="সোমবার";
	}else if(today.indexOf("Tue")!==-1){
		todayBangla="মঙ্গলবার";
	}else if(today.indexOf("Wed")!==-1){
		todayBangla="বুধবার";
	}else if(today.indexOf("Thu")!==-1){
		todayBangla="বৃহস্পতিবার";
	}else if(today.indexOf("Fri")!==-1){
		todayBangla="শুক্রবার";
	}else if(today.indexOf("Sat")!==-1){
		todayBangla="শনিবার";
	}else if(today.indexOf("Sun")!==-1){
		todayBangla="রবিবার";
	}

	if(today.indexOf("Jan")!==-1){
		monthBangla=" জানুয়ারী";
	}else if(today.indexOf("Feb")!==-1){
		monthBangla=" ফেব্রুয়ার";
	}else if(today.indexOf("Mar")!==-1){
		monthBangla=" মার্চ";
	}else if(today.indexOf("Apr")!==-1){
		monthBangla=" এপ্রিল";
	}else if(today.indexOf("May")!==-1){
		monthBangla=" মে";
	}else if(today.indexOf("Jun")!==-1){
		monthBangla=" জুন";
	}else if(today.indexOf("Jul")!==-1){
		monthBangla=" জুলাই";
	}else if(today.indexOf("Aug")!==-1){
		monthBangla=" আগস্ট";
	}else if(today.indexOf("Sep")!==-1){
		monthBangla=" সেপ্টেম্বর";
	}else if(today.indexOf("Oct")!==-1){
		monthBangla=" অক্টোবর";
	}else if(today.indexOf("Nov")!==-1){
		monthBangla=" নভেম্বর";
	}else if(today.indexOf("Dec")!==-1){
		monthBangla=" ডিসেম্বর";
	}
	year=today.substring(today.length-4,today.length);
	year=engToBdNum(year.toString());
	dateth=today.substring(5,today.length-9);
	dateth=engToBdNum(dateth.toString());
	$(".todaydate").text(todayBangla+dateth+monthBangla+year);

	$('.hamburger,.close-dropdown').click(function () {
		console.log("hello");
		if ($('.hamburger-container').css('display') === 'none') {
			$('.hamburger-container').css('display', 'block');
		} else {
			$('.hamburger-container').css('display', 'none');
		}
	});
	
	for(var j=1;j<12;j++){
		$('#news-click'+j).click(function () {
			var ffred=this.id;
			ffred=ffred.substring(10,ffred.length);
			window.open("https://www.iskconbangla.com/news/"+ffred+".html");
		});
	}

function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

//function getDateTime(dateVal) {
//    var now  = new Date(dateVal);
//    if(typeof dateVal=='undefined'){
//        now  =  new Date();
//    }
// 
//    var year    = now.getFullYear();
//    var month   = now.getMonth()+1;
//    var day     = now.getDate();
//    var hour    = now.getHours();
//    var minute  = now.getMinutes();
//    var second  = now.getSeconds();
// 
//    if(month.toString().length == 1) {
//        var month = '0'+month;
//    }
//    if(day.toString().length == 1) {
//        var day = '0'+day;
//    }
//    if(hour.toString().length == 1) {
//        var hour = '0'+hour;
//    }
//    if(minute.toString().length == 1) {
//        var minute = '0'+minute;
//    }
//    if(second.toString().length == 1) {
//        var second = '0'+second;
//     }
 
//    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
//	 return dateTime.replaceAll("0","?").replaceAll("1","?").replaceAll("2","?").replaceAll("3","?").replaceAll("4","?").replaceAll("5","?").replaceAll("6","?").replaceAll("7","?").replaceAll("8","?").replaceAll("9","?");;
//    return dateTime.getDigitBanglaFromEnglish();
 //}



//$('a.play-video').click(function(){
//	$('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
//});
//
//$('a.stop-video').click(function(){
//	$('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
//});

});