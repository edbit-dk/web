<div class="container">
    <form action="<?php echo URL ?>blog/create" method="post">
        <p> Name: </p><input type="text" name="Name">

        <p> Content: </p>  <textarea name="Content"></textarea>

        <p> Sticky: </p> 
        <input type="checkbox" name="Sticky" value="1"> 

        <input type="hidden" 
               name="User" 
               value="<?php echo $user->data()->ID ?>"/>

        <input type="hidden" 
               name="Company" 
               value="<?php echo $user->data()->Company_ID ?>"/>
        
        <p class="submit"><input type="submit" value="Update"></p>
    </form>

</div>

