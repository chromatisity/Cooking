<?php
    session_start();
    if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
	<script type="text/javascript" src="js.js"></script>
    <title></title>
    
</head>
<body>
	 <div id="userpicture">
             <table>
                 <tr>
                     <td>
                         <img id="avatar" src="pics/userpic.png"></img>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <pre><a href="logout.php">log out</a></pre>
                     </td>
                 </tr>
             </table>
          <nav>
                <ul>
                    <li>
                        <a href="MyRecipes.php"><button>My Recipes</button></a>
                    </li>
                    <li>
                        <a href="AddRecipes.php"><button>Add Recipes</button></a>
                    </li>
                </ul>
        </nav>  
          
        </div>
	<canvas id="canvas">

        </canvas>
</body>
</html>