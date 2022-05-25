<!-- <html>
<button onclick="resetF()"></button>

</html>

<script>
    function resetF() {
        
    }
</script> -->
<?php
        include "database_configuration.php";
        $sss="SELECT * FROM slots";
        $result=mysqli_query($conn,$sss);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id= $row['slot_id'];
                $status=$row['slot_status'];
               
                echo $id ;
                
                echo $status;
                
                ?>
                <a href="reset.php?id=<?php echo $id?>">Reset</a>
                <?php
                echo "</br>";
            }
        }      
        ?>