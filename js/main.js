var correctId = 0;
var score = 0;
var continueBalls = true;
var ballName = 'BLUE';
sourceImg = [
    'https://stageofproject.com/blazepod/img/pod/blue.png',
    'https://stageofproject.com/blazepod/img/pod/red.png',
    'https://stageofproject.com/blazepod/img/pod/green.png',
    'https://stageofproject.com/blazepod/img/pod/purple.png',
    'https://stageofproject.com/blazepod/img/pod/white.png',
    'https://stageofproject.com/blazepod/img/pod/yello.png',
]

$(document).ready(function () { 
    var randomBoolean = Math.random() < 0.5;    
    if(randomBoolean){ 
        Swal.fire({
            title: 'Be Ready to Play!',
            text: "Chase Blue ball",
            icon: 'success',
            showCancelButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Okay'
        }).then((result) => {
            if (result.value) {
                makeBall('ball0', sourceImg[0], true);
                makeBall('ball1', sourceImg[1]);
                makeBall('ball2', sourceImg[2]);
                makeBall('ball3', sourceImg[3]);
                makeBall('ball4', sourceImg[4]);
                makeBall('ball5', sourceImg[5]);  
                
                startTimer();
            }
        })        
    } else {
        correctId = 1;
        ballName = 'RED';
        Swal.fire({
            title: 'Be Ready to Play!',
            text: "Chase Red ball",
            icon: 'success',
            showCancelButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Okay'
        }).then((result) => {
            if (result.value) {
                makeBall('ball0', sourceImg[0]);
                makeBall('ball1', sourceImg[1], true);
                makeBall('ball2', sourceImg[2]);
                makeBall('ball3', sourceImg[3]);
                makeBall('ball4', sourceImg[4]);
                makeBall('ball5', sourceImg[5]);  
                
                startTimer();
            }
        })        
    }        
});

$(document).on('click', '.a', function (e) { 
    if(generateCorrectBallId() == $(this).attr('id')) { 
        score+=1;
        changeBallSource();
        last_click_time = $('#seconds').html()+''+$('#milliseconds').html();
        $('.score span').html(score);
        //changeBallSource();
    } 
});

function generateCorrectBallId() {
    return 'ball' + correctId; 
}

function changeBallSource() {
    var correctBallImgSrc = $('#ball' + correctId + ' img').attr('src'); 
    for (var a=[],i=0;i<6;++i) a[i]=i;
    var items = shuffle_array(a);
    //alert(items);
    shuffle(items);

    for(i=0; i<6; i++) {
        $('#ball' + i + ' img').attr('src', sourceImg[items[i]]);
        if($('#ball' + i + ' img').attr('src') == correctBallImgSrc) {
            $('.a').removeClass('top');
            $('#ball' + i).addClass('top');
            correctId = i;
        }
    }
}

function shuffle_array(array) {
    var tmp, current, top = array.length;
    if(top) while(--top) {
      current = Math.floor(Math.random() * (top + 1));
      tmp = array[current];
      array[current] = array[top];
      array[top] = tmp;
    }
    return array;
  }

function shuffle(array) {
    let currentIndex = array.length,  randomIndex;  
    // While there remain elements to shuffle...
    while (currentIndex != 0) {  
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;  
        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
        array[randomIndex], array[currentIndex]];
    }
    return array;
}

function makeBall(id, src, top = false) {
    var $div = $(
        "<div class='a' id='" + id + "'><img draggable='false' height='150' width='150' src='" + src + "' />"
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
                if(continueBalls) {
                    animateDiv();
                }
            }
        );
    }
    if(top) { 
        $('#' + id).addClass('top');
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
    var speedModifier = .5; //Math.random();
    var speed = Math.ceil(greatest / speedModifier); 
    return speed //Math.floor(0 + Math.random() * Math.floor(Math.random() * 6000)) 
}
let timeObject = "";
function countdown() {
	var now = new Date();    
	var endDate = new Date(timeObject);	
	
	var currentTime = now.getTime();
	var deltaTime = endDate - currentTime; 
	if(deltaTime<=100 && deltaTime>=-10000) { 
        $('span.scores').html(score);
        $('#final_score').val(btoa(score));
        $('#pod_name').val(btoa(ballName));
        $('#last_click_time').val(btoa(last_click_time));
        $('#exampleModal').modal({'show': true, 'backdrop': 'static', 'keyboard': false});
        clearInterval(interval); // stop the interval 
		document.getElementById("milliseconds").textContent = "00";
        continueBalls = false;
        return false;
	} else {
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
} 

// start clock on body load
var interval = null; 
function startTimer() {    
    timeObject = new Date();
    timeObject = new Date(timeObject.getTime() + 20000); 
    interval = setInterval(countdown,100);
};