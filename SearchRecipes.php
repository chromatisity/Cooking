<?php
session_start();
include 'header.html';
?>
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
                    <li>
                        <a href="SearchRecipes.php"><button>Search</button></a>
                    </li>
                </ul>
        </nav>  
</div>
<form id="FormrecipesResult" method="POST">
    
    <input type="text" name="name"/></br>
    
    <input type="submit" value="Go" />
</form>


<?php
    $DBconnection = mysqli_connect('127.0.0.1', 'pesho', 'maina123', 'test');
    $username = $_SESSION['username'];
   
            if (!$DBconnection) {
                echo '<div id="error">no connection to db</div>';
            }
            else {
                if ($_POST) {
                    $result = mysqli_query($DBconnection, "SELECT * FROM `recipes` WHERE id=".'"'.$username.'"'.'AND name='.'"'.$_POST['name'].'"');
                    ;
                    if ($result->num_rows == 0) {
                    
                    echo '<div id="error">There is no such recipe</div>';
                }
                else {
                    echo '<div id="recipesResult"><ul id="rec">';
                $row = $result->fetch_assoc(); 
                echo '<li style="margin-right: 14px;" style="margin-bottom:14px;" id="searchResult">'. 
                        $row['name']. '<img src="pics/food.png"></img><div>'.$row['ingredients'].'</div>';
           
            echo '</ul></div>';
                } 
               }
            }
            
            
            mysqli_close($DBconnection);
            
include 'footer.html';