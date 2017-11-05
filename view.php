<html>
<head>
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>    
<style type="text/css">
    table {border-collapse:collapse;}
    table tr td{border: 1px solid blue;width: 500px; height: 100px;}
    table tr td h1{display: none;}
    .show {display: block;}
    .yicang {display: none}
    
</style>
</head>
<body>
hmszrygdsbwgbeij
<table>
    <tr class="qihuan_js">
    <td><h1 class="show">row 1, cell 1</h1></td>
</tr>
<tr class="qihuan_js">
<td><h1>row 2, cell 1</h1></td>
</tr>
<tr class="qihuan_js">
<td><h1>row 3, cell 1</h1></td>
</tr>
<tr class="qihuan_js">
<td><h1>row 4, cell 1</h1></td>
</tr>
</table>
</body>
</html>
<script>
   $(document).ready(function(){
       $(".qihuan_js").click(function(){
           //点击某一个表格时 先把所有行的内容全部隐藏
           $(".qihuan_js").find("h1").removeClass("show");
           $(".qihuan_js").find("h1").addClass("yicang");
           //再把当前行的内容显示
          $(this).find("h1").removeClass("yicang");
          $(this).find("h1").addClass("show");
       
       })
   });
</script>