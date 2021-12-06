var allNewsStorage={};
var pageNumber=localStorage.getItem("pageNumber")
$(".page-YTnews-body-container").css("padding-top","0");
$(".page-YTnews-body-container-holder").css("padding-top","0");
let banglaNumber = {
	0: "০",
	1: "১",
	2: "২",
	3: "৩",
	4: "৪",
	5: "৫",
	6: "৬",
	7: "৭",
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
				console.log("j = "+j);

				var allData=allNewData[j];
				//console.log("_id = "+allData['_id']);
				for (var i in allData) {	
					//console.log("new clicklist data i = "+i+": "+allData[i]);
					if (allData.hasOwnProperty('_id')){
						var fred=allData['_id'];

//console.log("allData[savedBlockPlacement] = "+allData['savedBlockPlacement']);
//console.log("i = "+i)
						if(allData['savedBlockPlacement']===pageNumber){
//							console.log("YES");
			if(!allData['savedNewsImage']){
				allData['savedNewsImage']="undefined";
			}
	allNewsStorage[fred]={savedNewsTitle:allData['savedNewsTitle'],savedNewsText:allData['savedNewsText'],savedNewsImage:allData['savedNewsImage'],savedNewsTimepassed:allData['savedNewsTimepassed'],savedBlockPlacement:allData['savedBlockPlacement'],savedShortenedNewsText:allData['savedShortenedNewsText'],savedSpareOne:allData['savedSpareOne']};
						}
					}
				}
			}

			if(!allData['savedNewsImage']){
				allData['savedNewsImage']="undefined or empty";
			}
			console.log("allData[savedNewsImage] = "+allData['savedNewsImage']);

			var blockNumber='abc';
			for (var fred in allNewsStorage) {
				if(allNewsStorage[fred]['savedBlockPlacement']){
					blockNumber=allNewsStorage[fred]['savedBlockPlacement'].toString();
					 $('.page-news-title').html(allNewsStorage[fred]['savedNewsTitle']);
					$('.page-news-body').text(allNewsStorage[fred]['savedNewsText']);

				 	if(allNewsStorage[fred]['savedSpareOne']&&allNewsStorage[fred]['savedSpareOne'].length>40){
						$(".page-YTnews-body-container").css("padding-top","56.25%");
						$(".page-YTnews-body-container-holder").css("padding-top","28px");
						$('.page-YTnews-body').html(allNewsStorage[fred]['savedSpareOne']);
					}	
					if(allNewsStorage[fred]['savedNewsImage']&&allNewsStorage[fred]['savedNewsImage'].length>4){
						var newImage="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]['savedNewsImage']
						$(".page-news-image").css("padding-top","28px");
						$('.page-news-image').html('<img src="'+newImage+'">')
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
//console.log(" blockNumber = "+blockNumber);
//console.log("startTime = "+startTime);
//console.log("endTime = "+endTime);
//console.log("secs = "+seconds);
//console.log("hours = "+hrs);
//console.log("**************************")

if(weeks>0){
	  $('.page-news-footer').text("এক সপ্তাহেরও বেশি আগে");
}else if(days>1){
	days=engToBdNum(days.toString());
	  $('.page-news-footer').text(days+" দিন আগে");
}else if(days===1){
	  $('.page-news-footer').text("১ দিন আগে");
}else if(hrs>1){
	hrs=engToBdNum(hrs.toString());
	  $('.page-news-footer').text(hrs+" ঘণ্টা আগে");
}else if(hrs===1){
	  $('.page-news-footer').text("১ ঘণ্টা আগে");
}else{
	mins=engToBdNum(mins.toString());
	  $('.page-news-footer').text(mins+" মিনিট আগে");
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
		todayBangla="সোমবার, ";
	}else if(today.indexOf("Tue")!==-1){
		todayBangla="	মঙ্গলবার, ";
	}else if(today.indexOf("Wed")!==-1){
		todayBangla="	বুধবার, ";
	}else if(today.indexOf("Thu")!==-1){
		todayBangla="	বৃহস্পতিবার, ";
	}else if(today.indexOf("Fri")!==-1){
		todayBangla="শুক্রবার, ";
	}else if(today.indexOf("Sat")!==-1){
		todayBangla="শনিবার, ";
	}else if(today.indexOf("Sun")!==-1){
		todayBangla="রবিবার, ";
	}

	if(today.indexOf("Jan")!==-1){
		monthBangla=" জানুয়ারী ";
	}else if(today.indexOf("Feb")!==-1){
		monthBangla=" ফেব্রুয়ারী ";
	}else if(today.indexOf("Mar")!==-1){
		monthBangla=" মার্চ ";
	}else if(today.indexOf("Apr")!==-1){
		monthBangla=" এপ্রিল ";
	}else if(today.indexOf("May")!==-1){
		monthBangla=" মে ";
	}else if(today.indexOf("Jun")!==-1){
		monthBangla=" জুন ";
	}else if(today.indexOf("Jul")!==-1){
		monthBangla=" জুলাই ";
	}else if(today.indexOf("Aug")!==-1){
		monthBangla=" আগস্ট ";
	}else if(today.indexOf("Sep")!==-1){
		monthBangla=" সেপ্টেম্বর ";
	}else if(today.indexOf("Oct")!==-1){
		monthBangla=" অক্টোবর ";
	}else if(today.indexOf("Nov")!==-1){
		monthBangla=" নভেম্বর ";
	}else if(today.indexOf("Dec")!==-1){
		monthBangla=" ডিসেম্বর ";
	}
	year=today.substring(today.length-4,today.length);
	year=engToBdNum(year.toString());
	dateth=today.substring(5,today.length-9);
	dateth=engToBdNum(dateth.toString());
	$(".todaydate").text(todayBangla+dateth+monthBangla+year);




console.log("page number = "+localStorage.getItem("pageNumber"));
    
	$('.hamburger,.close-dropdown').click(function () {
		console.log("hello");
		if ($('.hamburger-container').css('display') === 'none') {
			$('.hamburger-container').css('display', 'block');
		} else {
			$('.hamburger-container').css('display', 'none');
		}
	});

});