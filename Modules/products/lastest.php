
<?php 

                        $sql = "SELECT * FROM product order by prd_id desc LIMIT 6" ;
                        $query = mysqli_query($conn,$sql);
                        $num = mysqli_num_rows($query); ?>
                <!--	Feature Product	-->
                <div class="products">
                    <h3>Sản phẩm mới</h3>
                    <?php 
                    $i=1 ;
                    while($row=mysqli_fetch_array($query)){
                       if($i==1) {echo "<div class='product-list card-deck'>";
                        }                   
                    ?>
                        <div class="product-item card text-center">
                            <a href="?page_layout=product&id=<?php echo $row['prd_id']; ?>"><img src="admin/products/<?php echo $row['prd_image'] ?>"></a>
                            <h4><a href="?page_layout=product&id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name'] ?></a></h4>
                            <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'','.').'đ' ?></span></p>
                        </div>
                        <?php
                        if($i==3){
                            $i=1;
                            echo "</div>";
                        }
                        else{
                            $i++;
                        }
                    }
                    if($num % 3 != 0){
                        echo "</div>";
                    }
                        ?>
                </div>
                <!--	End Feature Product	-->
                
                