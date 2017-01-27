<!DOCTYPE html>
<html>
<head>
<style>
/* monospace for alignment */
table {
  font-family: 'Courier New',Courier,monospace;
  border-collapse: collapse;
  margin: auto;
}
/* square grid */
td {
  text-align: center;
  padding-left: 10px;
  padding-right: 10px;
  color: #4e4782;
}
/* color configuration */
body {
  color: white;
  background-color: #140e3d;
}
</style>
</head>
<body>
<!-- define test space -->
<p id = test></p>
<!-- define content space -->
<h1 id = content></h1>
<script>
// read dimensions and map to grid
var w = window.innerWidth;
var h = window.innerHeight;
var y = Math.floor(h/40);
var x = Math.floor(w/42);
// display test input
function tester(e) {
  document.getElementById('test').innerHTML = e;
}
// {ARRAY
// this initialization borrowed
function createArray(length) {
  var arr = new Array(length || 0),
      i = length;
  if (arguments.length > 1) {
      var args = Array.prototype.slice.call(arguments, 1);
      while(i--) arr[length-1 - i] = createArray.apply(this, args);
  }
  return arr;
}
grid = createArray(y,x);
// clear board
function initBoard() {
  for (var m = 0; m < y; m++) {
    for (var n = 0; n < x; n++) {
      grid[m][n] = 0;
    }
  }
}
initBoard();
// ARRAY}
// initialize and insert table
var table = '<table>';
for (var m = 0; m < y; m++) {
  table += '<tr>';
  for (var n = 0; n < x; n++) {
    table += '<td id = ' + m + '.' + n + ' ' + 'onclick = "flip(' + m + "," + n + ')"' + '>' + 'O' + '</td>';
  }
  table += '</tr>';
}
table += '</table>';
document.getElementById('content').innerHTML = table;
// baste (to string coordinates)
function baste(v,u) {
  return v.toString() + '.' + u.toString();
}
// switch 'on' or 'off'
shiny = '#ff84f0'
function flip(v,u) {
  var color;
  var assign;
  if (filled(v,u)) {
    color = '#4e4782';
    assign = 0;
  } else {
    color = shiny;
    assign = 1;
  }
    document.getElementById(baste(v,u)).style.color = color;
    grid[v][u] = assign;
}
// check if 'filled'
function filled(v,u) {
  if (grid[v][u] == 1) {
    return true;
  } else {
    return false;
  }
}
// simple direction generator
function dir() {
  return Math.ceil(Math.random()*4);
}
// running condition
function keepGoing() {
  if (filled(y,x)) {
    return false;
  } else {
    return true;
  }
}

// initial condition
var q = 0;
var i = q;
var j = q;
setInterval(function(){move(0,0,y-1,x-1)},30)
function move(t,l,d,r) {
  if (filled(q,q) != true) {
    flip(q,q)
  }
  if (j == t+q) {
    i += 1
    flip(j,i)
  }
  if (i == r-q) {
    j += 1
    flip(j,i)
  }
  if (j == d-q) {
    i -= 1
    flip(j,i)
  }
  if (i == l+q) {
    j -= 1
    flip(j,i)
  }
  if (filled(q+1,q) == true) {
    q += 1
    i = q
    j = q
  }
}


</script>
</body>
</html>
