
function start(){
    newQuote();
    startTime();
    checkTime();
    
}
        <!--Script for the time-->
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
var quotes =[
    'Keep your face to the sunshine and you cannot see a shadow. <br>- Helen Keller',
    'limit your "always" and your "nevers." <br>- Amy Poehler',
    'Spread love everywhere you go. <br>- Mother Teresa',
    'A champion is defined not by their wins but by how they can recover when they fall. <br>- Serena Williams',
    'Motivation comes from working on things we care about. <br>- Sheryl Sandberg',
    'No matter what people tell you, words and ideas can change the world. <br>- Robin Williams',
    'With the right kind of coaching and determination you can accomplish anything.  <br>- Reese Witherspoon',
    'If you look at what you have in life, you\'ll always have more.  <br>- Oprah Winfrey',
    'Life has got all those twists and turns. You\'ve got to hold on tight and off you go.  <br>- Nicole Kidman',
    'You are enough just as you are.  <br>- Meghan Markle',
    'My mission in life is not merely to survive, but to thrive.  <br>- Maya Angelou',
    'Let us make our future now, and let us make our dreams tomorrow\'s reality. <br>- Malala Yousafzai',
    'Life changes very quickly, in a very positive way, if you let it. <br>- Lindsey Vonn',
    'You get what you give. <br>- Jennifer Lopez',
    'You must do the things you think you cannot do. <br>- Eleanor Roosevelt',
    'Nothing is impossible. The word itself says "I\'m possible!" <br>- Audrey Hepburn',
    'Happiness is not by chance, but by choice. <br>- Jim Rohn',
    'We must be willing to let go of the life we planned so as to have the life that is waiting for us.  <br>- Joseph Campbell',
    'Don\'t wait. The time will never be just right. <br>- Napoleon Hill',
    'Some people look for a beautiful place. Others make a place beautiful.  <br>- Hazrat Inayat Khan',
    'OO alam ko pogi ako  <br>- Jodeyne Teneza',
    

    
    
]

function newQuote(){
    var randomNumber = Math.floor(Math.random() * (quotes.length));
    document.getElementById('quoteDisplay').innerHTML = quotes[randomNumber];
}



//TO DO LIST
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}