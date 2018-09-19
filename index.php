<html>
<head>
<meta charset="utf-8"/>

<script type="text/javascript">


function showHint()						//Ajax异步获取服务器返回的信息
{
var furl = document.getElementById("txt1").value;
										//获取lurl
var xmlhttp;
if (furl.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }					
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText; //传回echo
    }
  }

xmlhttp.open("GET","gethint.php?temp_url="+furl,true);
xmlhttp.send();
}
</script>

</head>
<body>


<h3>请在下面的输入框中键入长链接：</h3>
<form action=""> 
long_url：<input type="text" id="txt1" value="http://baidu.com" />
</form>

<input type="button" onclick="showHint()" value="调用函数">
<p>short_url：<span id="txtHint"></span></p> 




</body>
</html>

