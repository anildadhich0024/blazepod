var correctId = 1;
var score = 0;
sourceImg = [
    'https://stageofproject.com/blazepod/img/pod/blue.png',
    'https://stageofproject.com/blazepod/img/pod/red.png',
    'https://stageofproject.com/blazepod/img/pod/green.png',
    'https://stageofproject.com/blazepod/img/pod/purple.png',
    'https://stageofproject.com/blazepod/img/pod/white.png',
    'https://stageofproject.com/blazepod/img/pod/yello.png',
]

$(document).ready(function () { 
    makeBall('ball1', sourceImg[0]);
    makeBall('ball2', sourceImg[1]);
    makeBall('ball3', sourceImg[2]);
    makeBall('ball4', sourceImg[3]);
    makeBall('ball5', sourceImg[4]);
    makeBall('ball6', sourceImg[5]); 
    var randomBoolean = Math.random() < 0.5;    
    if(randomBoolean){
        alert('Chase Blue ball');
    } else {
        correctId = 2;
        alert('Chase Red ball');
    }
});

$(document).on('click', '.a', function (e) { 
    let generateBallId = 'ball' + correctId; 
    if(generateBallId == $(this).attr('id')) {
        console.log('clicked right');
        score+=1;
        changeBallSource();
        $('.score span').html(score);
    } 
});

function changeBallSource() {
    $('#ball1').remove();
    $('#ball2').remove();
    $('#ball3').remove();
    $('#ball4').remove();
    $('#ball5').remove();
    $('#ball6').remove();

    makeBall('ball1', sourceImg[0]);
    makeBall('ball2', sourceImg[1]);
    makeBall('ball3', sourceImg[2]);
    makeBall('ball4', sourceImg[3]);
    makeBall('ball5', sourceImg[4]);
    makeBall('ball6', sourceImg[5]);
    // var items   = new Array(2,3,4);
    // var ran = items.sort(function() { return 0.5 - Math.random();}).pop();
    // ran
}

function makeBall(id, src) {
    var $div = $(
        "<div class='a' id='" + id + "'><img height='150' width='150' src='" + src + "' />"
    );
    $(".animatedDivs").append($div);
    animateDiv();
    function animateDiv() {
        var newq = makeNewPosition();
        var oldq = $div.offset();
        var speed = calcSpeed([oldq.top, oldq.left], newq);
        $div.animate(
            {
                top: newq[0],
                left: newq[1],
            },
            speed,
            function () {
                animateDiv();
            }
        );
    }
}

function makeNewPosition() {
    // Get viewport dimensions (remove the dimension of the div)
    var h = $(window).height() - 110;
    var w = $(window).width() - 190;
    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w); 
    return [nh, nw];
}
function calcSpeed(prev, next) {
    var x = Math.abs(prev[1] - next[1]);
    var y = Math.abs(prev[0] - next[0]);
    var greatest = x > y ? x : y; 
    var speedModifier = .4; //Math.random();
    var speed = Math.ceil(greatest / speedModifier); 
    return speed //Math.floor(0 + Math.random() * Math.floor(Math.random() * 6000)) 
}
 


let timeObject = new Date();
timeObject = new Date(timeObject.getTime() + 60000);
function countdown() { 
	var now = new Date();    
	var endDate = new Date(timeObject);	
	
	var currentTime = now.getTime();
	var deltaTime = endDate - currentTime; 
	if(deltaTime<=100 && deltaTime>=-100) {
		alert('Your Time is Over');
        clearInterval(interval); // stop the interval 
		document.getElementById("milliseconds").textContent = "00";
        return false;
	}
	// get time in ms/sec/min/hrs/days
	var ms = Math.floor(deltaTime % 60);
	var s = Math.floor(deltaTime / 1000); 
	s %= 60;	

	// Get only work days 
	var weeks = Math.floor(d / 7); //how many weeks
	var d = d - weeks * 2;
	
	// set text in browser table
	if (d<=0 && h<=0 && m<=0 && s<=0) { 
		document.getElementById("seconds").textContent = "00 : ";
		document.getElementById("milliseconds").textContent = "00";
		clearInterval(countdown);
	} else {
		// add 0 to keep double digits time style 
		s = (s < 10) ? "0" + s : s; 
		document.getElementById("seconds").textContent = s + " : ";
		document.getElementById("milliseconds").textContent = ms;
    }
} 

// start clock on body load
var interval = null; 
document.body.onload =  function() {     
    interval = setInterval(countdown,100);
};