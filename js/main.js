var correctId = getCookie();
var score = 0;
var NegScore = 0;
var final_points = 0;
var total_points = 0;
var continueBalls = true;
var ballName = 'BLUE';
var lastClick = 0;
var finalTime = '00 : 00';
sourceImg = [

    'https://stageofproject.com/blazepod/img/pod/blue.png',

    'https://stageofproject.com/blazepod/img/pod/red.png',

    'https://stageofproject.com/blazepod/img/pod/green.png',

    'https://stageofproject.com/blazepod/img/pod/purple.png',

    'https://stageofproject.com/blazepod/img/pod/white.png',

    'https://stageofproject.com/blazepod/img/pod/yello.png',

]

function getCookie(name = 'POD_NAME') {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

$(document).ready(function () { 
    
    // alert(correctId);
    // if(correctId != 0 || correctId != 1) {
    //     window.location="index.php";
    // }
    if(correctId == 0){ 

        Swal.fire({

            title: 'Get Ready to Play!',

            text: "Chase the Blue Pod",

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

            title: 'Get Ready to Play!',

            text: "Chase the Red Pod",

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
    } else {
        NegScore+=1
    }
    var now = new Date();    
    var endDate = new Date(timeObject);	        
    var currentTime = now.getTime();
    var deltaTime = endDate - currentTime;  
    lastClick = totalTime - deltaTime; 

    var ms = Math.floor(lastClick % 60);

    var s = Math.floor(lastClick / 1000); 

    s %= 60;
    finalTime = s.toString().padStart(2, 0)+' : '+ms.toString().padStart(2, 0);
    

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

    var speedModifier = .2; //Math.random();

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
        
        var total_points = NegScore + score;
        var final_points = score - NegScore;
        $('span.total_points').html(total_points);
        $('span.positive_points').html(score);
        $('span.neg_points').html(NegScore);
        $('span.final_point').html(final_points);
        $('span.last_click').html(finalTime);
        
        $('#exampleModal').modal({'show': true, 'backdrop': 'static', 'keyboard': false});
        //document.cookie = "POD_NAME=";
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

            document.getElementById("seconds").textContent = "00  ";

            document.getElementById("milliseconds").textContent = "00";

            clearInterval(countdown);

        } else {

            // add 0 to keep double digits time style 

            s = (s < 10) ? "0" + s : s; 

            document.getElementById("seconds").textContent = s + "  ";

            document.getElementById("milliseconds").textContent = ms;

        }

    }	

} 



// start clock on body load

var interval = null; 
var totalTime = 20000;
function startTimer() {    

    timeObject = new Date();
    timeObject = new Date(timeObject.getTime() + totalTime); 
    interval = setInterval(countdown,100);

    $.ajax({
        type: 'GET',
        url: "https://stageofproject.com/blazepod/start_game.php?pod_name="+ballName,
        // success:function(data){
        //     alert(data);
        // }
    });

};


$(document).ready(function(){
    $(".btn-success").click(function(){  
        if($("input[name=full_name]").val() == '') {
            alert("Please provide your full name");
            return false;
        }  
        if($("input[name=email_address]").val() == '') {
            alert("Please provide your email address");
            return false;
        }
        else
        {
            if(IsEmail($("input[name=email_address]").val())==false){
                alert("Please provide your valid email address");
                $("input[name=email_address]").focus();
                return false;
            }
        }      

        var total_points = NegScore + score;
        var final_points = score - NegScore;
        $('#total_points').val(btoa(total_points));
        $('#neg_points').val(btoa(NegScore));
        $('#positive_points').val(btoa(score));
        $('#final_point').val(btoa(final_points));

        $('#pod_name').val(btoa(ballName));
        $('#last_click_time').val(btoa(finalTime));

        $('#data_form').submit();
    });
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    }else{
      return true;
    }
}
