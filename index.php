 <?php 
 function get_hastags($string){

         /* Match hashtags */
         preg_match_all('/@(\w+)/', $string, $matches);
         
          /* Add all matches to array */
          foreach ($matches[1] as $match) {
            $keywords[] = $match;
          }
         
         return (array) $keywords;

		}
	if(isset($_POST["submit"])) {
		echo "<pre>";
		print_r(get_hastags($_POST["message"])); exit;
		
	}
 
 
 ?>
<html>
<head>
<title>test</title>
 <link rel="stylesheet" href="css/jquery.atwho.css" />

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.caret.js"></script>
  <script type="text/javascript" src="js/jquery.atwho.js"></script>
</head>
<body>
<h1>Username tagging or hash name tagging like twitter and facebook with php / mysql Coderpk.com </h1>
<form method="POST" style="width:50%; margin:0 auto;">
<textarea rows="10" id="message_text_box" name="message" style="
    width: 100%;
"></textarea>
<input type="submit" name="submit" value="submit" style="float:right" />
 </form>
</body>
<html>

 <script type="text/javascript">
 
 $(function(){
    $.fn.atwho.debug = true
    
        var names = [];
        var url = "ajax.php";     
        $.ajax({
                async: false,
                url: url, success: function (result) {
                    var result = $.parseJSON(result);
                       names = $.map(result,function(value,i) {
                        console.log(result[i].username);
                       return {'id':i,'username':result[i].username,'name':result[i].name,'image':result[i].image};
                     });

                     
                    }                
            });

    var at_config = {
      at: "@",
      data: names,
      //headerTpl: '<div class="atwho-header">User List<small>↑&nbsp;↓&nbsp;</small></div>',
      insertTpl: '@${username}',
      displayTpl: "<li> <img src='${image}'' class='image' style='width:30px;height:30px;' /> ${name} </li>",
      limit: 200
    }
    
    $inputor = $('#message_text_box').atwho(at_config);
    // $inputor.caret('pos', 47);
    // $inputor.focus().atwho('run');

    
  });
 </script>