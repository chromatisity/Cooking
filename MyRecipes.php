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


<?php
    $DBconnection = mysqli_connect('127.0.0.1', 'pesho', 'maina123', 'test');
    $username = $_SESSION['username'];
   
            if (!$DBconnection) {
                echo '<div id="error">no connection to db</div>';
            }
            else {
                $result = mysqli_query($DBconnection, "SELECT * FROM `recipes` WHERE id='" . $username . "'");
                
                
            
                if (mysqli_num_rows($result) == 0) {
                    
                    echo '<div id="error">You have no recipes</div>';
                }
                else {
                    echo '<div id="recipesResult"><ul id="rec">';
                while ($row = $result->fetch_assoc()) {
                echo '<li style="margin-right: 14px;" style="margin-bottom:14px;" id="in">'. 
                        $row['name']. '<img src="pics/food.png"></img><div>'.$row['ingredients'].'</div>';
            }
            echo '</ul></div>';
                }
            }
            
            
            mysqli_close($DBconnection);
            
include 'footer.html';