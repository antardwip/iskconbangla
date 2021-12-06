//pageNumber=10;
var allNewsStorage={};
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
				var allData=allNewData[j];
				//console.log("_id = "+allData['_id']);
				for (var i in allData) {	
					//console.log("new clicklist data i = "+i+": "+allData[i]);
					if (allData.hasOwnProperty('_id')){
						var fred=allData['_id'];
						allNewsStorage[fred]={savedNewsTitle:allData['savedNewsTitle'],savedNewsText:allData['savedNewsText'],savedNewsTextEntire:allData['savedNewsTextEntire'],savedNewsImage:allData['savedNewsImage'],savedNewsTimepassed:allData['savedNewsTimepassed'],savedBlockPlacement:allData['savedBlockPlacement'],savedShortenedNewsText:allData['savedShortenedNewsText'],savedSpareOne:allData['savedSpareOne'],savedSpareTwo:allData['savedSpareTwo']};
						//console.log("allNewsStorage[fred][savedNewsTitle] = "+allNewsStorage[fred]['savedNewsTitle']);
					}
				}
			}
			var blockNumber='abc';
			for (var fred in allNewsStorage) {
				matches=fred.match(/\d+$/);//extract number;
				if (matches) {
			    		var fredNumber = matches[0];
				}
				newsItemAtPositionIminus1="newsItem"+fredNumber;
				if(fredNumber&&fredNumber>=1&&fredNumber<=16&&fredNumber!==""&&fred.length<=10){
					if(allNewsStorage[fred]['savedBlockPlacement']){
						blockNumber=allNewsStorage[fred]['savedBlockPlacement'].toString();
						//console.log("blockNumber = "+blockNumber);	
						//console.log("number = "+fred+"is placed at blockNumber = "+blockNumber+" with title: "+allNewsStorage[fred]['savedNewsTitle']);
					    	$('#g'+blockNumber+' .news-title').html(allNewsStorage[fred]['savedNewsTitle']);
	
						$('#g'+blockNumber+" .news-body-container-holder").css("display","block");
	
						//if it is not youtube, and (not image or shortened news text starts with "&") then show shortened news text.
						// this allows us to have youtube+title+comment or image+title+comment or title+text formats, with image present for the main news page
						if((!allNewsStorage[fred]['savedSpareOne']||allNewsStorage[fred]['savedSpareOne'].length<4)&&(!allNewsStorage[fred]['savedNewsImage']||allNewsStorage[fred]['savedNewsImage'].length<4)||allNewsStorage[fred]['savedShortenedNewsText'].charAt(0)==="&"){
							$('#g'+blockNumber+" .news-body-container-holder").css("display","none");
							//console.log("newsItem"+blockNumber+": "+allNewsStorage[fred]['savedShortenedNewsText']);
							$('#g'+blockNumber+'  .news-body-text').text(allNewsStorage[fred]['savedShortenedNewsText'].substring(1)).append("...");
	
							//$('#g'+blockNumber+'  .news-body-text').dotdotdot();
							$('#g'+blockNumber+'  .news-body-text').dotdotdot({
								ellipsis: "\u2026 ",
								height: "watch",
								watch: true,
							});
						//if it is youtube, show youtube
						}else if(allNewsStorage[fred]['savedSpareOne']&&allNewsStorage[fred]['savedSpareOne'].length>40){
							$('#g'+blockNumber+' .news-body').html(allNewsStorage[fred]['savedSpareOne']);
						//if it is image, show image
						}else if(allNewsStorage[fred]['savedNewsImage']&&allNewsStorage[fred]['savedNewsImage'].length>4){
							var newImage="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]['savedNewsImage']
							var newerImage='<img src="'+newImage+'">'
							//console.log("newerImage = "+newerImage)
							$('#g'+blockNumber+' .news-body').html('<img src="'+newImage+'">')
							//if you are in the main news spot...Hmmmm....
							if($('#g'+blockNumber+' .bigPicture')){
								$('#g'+blockNumber+' .bigPicture').html('<img src="'+newImage+'">')
							}
							$('#g'+blockNumber+' .news-body').html('<img src="'+newImage+'">')
							$('#g'+blockNumber+' .news-comment').html(allNewsStorage[fred]['savedSpareTwo'])
	
						}
						//if you are in the main news #1 spot
						if($('#g'+blockNumber+' .bigPicture')){
							var newImage="https://www.iskconbangla.com/img/news/"+allNewsStorage[fred]['savedNewsImage']
							var newerImage='<img src="'+newImage+'">'
							//console.log("newerImage = "+newerImage)
							//$('#g'+blockNumber+' .news-body').html('<img src="'+newImage+'">')
							$('#g'+blockNumber+' .bigPicture').html('<img src="'+newImage+'">')
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
						
						//console.log(fred + " = fred");
						//console.log(startTime + " = startTime");
						//console.log(endTime + " = endTime");
						//console.log(timeDiff + " = timeDiff");
						var seconds = Math.round(timeDiff);
						//console.log(seconds + " = seconds");
	
						var mins=Math.round(seconds/60);
						//console.log(mins + " mins");
	
						var hrs=Math.round(mins/60);
						var days=Math.round(hrs/24);
						var weeks=Math.round(days/7);
	
						if(weeks>0){
							  $('#g'+blockNumber+' .news-footer').text("সপ্তাহেরও বেশি আগে");
						}else if(days>1){
							var days=engToBdNum(days.toString());
							 $('#g'+blockNumber+' .news-footer').text(days+" দিন আগে");
						}else if(days===1){
								$('#g'+blockNumber+' .news-footer').text("১ দিন আগে");
						}else if(hrs>1){
							var hrs=engToBdNum(hrs.toString());
							  $('#g'+blockNumber+' .news-footer').text(hrs+" ঘণ্টা আগে");
						}else if(hrs===1){
							$('#g'+blockNumber+' .news-footer').text("১ ঘণ্টা আগে");
						}else{						
							var mins=engToBdNum(mins.toString());
							$('#g'+blockNumber+' .news-footer').text(mins+" মিনিট আগে");
						}
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

	$('.hamburger,.close-dropdown').click(function () {
		console.log("hello");
		if ($('.hamburger-container').css('display') === 'none') {
			$('.hamburger-container').css('display', 'block');
		} else {
			$('.hamburger-container').css('display', 'none');
		}
	});
	
	for(var j=1;j<13;j++){
		$('#news-click'+j).click(function () {
			var ffred=this.id;
			console.log("this.id = "+ffred);
			ffred=ffred.substring(10,ffred.length);
			localStorage.setItem("pageNumber", ffred);
			window.open("https://www.iskconbangla.com/newspage.html");
			//window.open("https://www.iskconbangla.com/news/"+ffred+".html");
		});
	}

	function googleTranslateElementInit() {
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}

	var scrollTop = window.pageYOffset
	window.onscroll = function() {myScroll()};
	function myScroll() {
		scrollTop = window.pageYOffset
		if (scrollTop > 113) {
			$(".subnav").css("box-shadow","0px 2px 6px #BBB");
		} else {
			$(".subnav").css("box-shadow","none");
		}
	}
});