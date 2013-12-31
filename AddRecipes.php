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
<form id="recipesResult" method="POST">
    
    <input type="text" name="name"/></br>
    
    <textarea name="ingredients" form="recipesResult"  ></textarea></br>
    <input type="submit" value="Save recipe" />
</form>


<?php
if ($_POST) {
    
     if ($_POST['name'] ==null && $_POST['ingredients'] !=null) {
                             echo '<div id="error">Enter a name</div>';
                        }
                        elseif ($_POST['name'] !=null && $_POST['ingredients']==null) {
                             echo '<div id="error">Enter ingredients</div>';
                        }
                        elseif ($_POST['name']==null && $_POST['ingredients'] == null) {
                            echo '<div id="error">Both fields are empty!</div>';
                        }
                            $username = $_SESSION['username'];
                            $name = trim($_POST['name']);
                            
                            $ingredients =  trim($_POST['ingredients']);
                          
                            
                            
                        if ($_POST['name'] !=null && $_POST['ingredients'] !=null)
                            {
                                $DBconnection = mysqli_connect('127.0.0.1', 'pesho', 'maina123', 'test');
                                if (!$DBconnection) {
                                           echo '<div id="error">no connection to db</div>';
                                       }
                                       else {
                                           $insertRecipe = mysqli_query($DBconnection, 'INSERT INTO `recipes` (`id` ,`name` ,`ingredients`) VALUES '
                                                   . '("'.$username.'","'.$name.'","'.$ingredients.'")');
                                           echo '<div #error>Recipe has been saved</div>';
                                           
                                       }
                            }
                            mysqli_close($DBconnection);
    
}
    

