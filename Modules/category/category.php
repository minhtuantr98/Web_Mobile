<?php 
if(!defined('TEMPLATE')){
    die('Ban k co quyen truy cap');
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$rowPerPage=9;
$keyStart = $page*$rowPerPage -$rowPerPage;

$cat = $_GET['id'] ;
$cat_name = $_GET['name'];

$sql_count = "SELECT * FROM product WHERE cat_id = $cat";
$query_count = mysqli_query($conn,$sql_count);
$num_count = mysqli_num_rows($query_count);


$sql = "SELECT * FROM product Where cat_id=$cat order by prd_id desc LIMIT $keyStart,$rowPerPage" ;
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);
?>
                <!--	Feature Product	-->
                <div class="products">
                    <h3><?php echo $cat_name.' Có '.$num_count.' Sản phẩm'; ?></h3>
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
                <!--	End List Product	-->
                <?php
                     $sql_dem = "SELECT * FROM product WHERE cat_id = $cat";
                     $query_dem = mysqli_query($conn,$sql_dem);
                     $dem = mysqli_num_rows($query_dem);

                     $soTrang = ceil($dem/$rowPerPage) ;
            
                    ?>
                <div id="pagination">
                   
                    <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="<?php if($page==1){
                                    $pagePre == 1 ;
        
                                }
                                else {
                                    $pagePre = $page -1 ;
                                } 
                                echo '?page_layout=category&id='.$cat.'&page='.$pagePre.'&name='.$cat_name ;
                                ?>">&laquo;</a></li>
                                <?php for($i=1;$i<=$soTrang;$i++){ ?>
                                <li class="page-item <?php  if($page == $i) {echo 'active';} ?>" ><a class="page-link" href="<?php echo '?page_layout=category&id='.$cat.'&page='.$i.'&name='.$cat_name  ?>"><?php echo $i; ?></a></li>
                                <?php 
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php if($page==$soTrang){
                                    $pageNext = $soTrang ;
                                }
                                else {
                                    $pageNext = $page + 1 ;
                                } 
                                echo '?page_layout=category&id='.$cat.'&page='.$pageNext.'&name='.$cat_name  ;
                                ?>">&raquo;</a></li>
                           
                    </ul> 
                </div>
                
 