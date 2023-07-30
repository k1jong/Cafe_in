
// 페이지 타이틀
var docTitle   = "카페인";

document.title = docTitle;
$('#docTitle').html(docTitle);

// url 호출
var get      = getRequest();
var menu     = get['menu'];
var mode     = get['mode'];
var room     = get['room'];

if(!menu) menu = "0";
$('#menuOn_'+menu).attr('class','on');


// Funtion
function getRequest() {
	if (location.search.length > 1) {
		var get = new Object();
		var ret = location.search.substr(1).split('&');
		for (var i = 0; i < ret.length; i++) {
			var r = ret[i].split('=');
			get[r[0]] = r[1];
		}
		return get;
	} else {
		return false;
	}
}


//----------------------------flip
let theButton = document.querySelectorAll('#gridd');
let theText = document.querySelectorAll('.flip-box-inner');

// console.log(theButton[0]);
// console.log(theButton[1]);
// console.log(theText[1]);
// for(var i=0;i<theButton.length;i++){
//   theButton[i].onclick = function () {
//     for(let x of theText[0]) {
//       // console.log(x);
//       x.classList.toggle('back');
//     }
//     theText[i].classList.toggle('back');
//   };
  
// }
for (var i = 0; i < theButton.length; i++) {
  (function (index) {
    theButton[index].onclick = function () {
      theText[index].classList.toggle('back');
    };
  })(i);
}
