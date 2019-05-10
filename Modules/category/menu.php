<?php
    $sql = "SELECT * FROM category ORDER BY cat_id asc";
    $query= mysqli_query($conn,$sql);
    $num = mysqli_num_rows($query);
?>  
<nav>
                	<div id="menu" class="collapse navbar-collapse">
                        <ul>
                        <?php if($num > 0){ while($row = mysqli_fetch_array($query)) {?>
                            <li class="menu-item"><a href="?page_layout=category&id=<?php echo $row['cat_id'] ?>&name=<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?></a></li>
                            <?php 
                        }
                    }
                        ?>
                        </ul>
                    </div>
</nav>