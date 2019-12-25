<?php
$text1 = $_POST['Nb_var99'];
$text2 = $_POST['Nb_var97'];
$text3 = $_POST['Nb_var95'];
//echo $text1;



                $connect=mysqli_connect("localhost","root","","zomato");




                    //echo $name1;
                    //echo $r_name1;
                    // echo $m_id;

                    //insert into order database

                    $query3="SELECT * FROM `restaurant` WHERE `r_id` = $text2";
                    $result3=mysqli_query($connect,$query3);
                    $row=mysqli_fetch_array($result3);
                    $r_name=$row['r_name'];
                    $query5="SELECT * FROM `menu` WHERE `menu_id` = $text1";
                    $result5=mysqli_query($connect,$query5);
                    $row1=mysqli_fetch_array($result5);
                    $m_name=$row1['menu_name'];
                    $query6="SELECT * FROM `menu` WHERE `menu_id` = $text1";
                    $result6=mysqli_query($connect,$query6);
                    $row1=mysqli_fetch_array($result6);
                    $m_price=$row1['menu_price'];

                        $query4 = "INSERT INTO `orders` (`ord_id`, `name`, `r_id`, `menu_id`,`r_name`,`m_name`,`m_price`) VALUES (NULL, '$text3', '$text2','$text1','$r_name','$m_name','$m_price')";

                        if (mysqli_query($connect, $query4)) {
                            //echo "reg";
                        } else {
                            // echo "Some Error occurred";
                        }
                        // $result4=mysqli_query($connect,$query4);
                        //$result4=mysqli_fetch_assoc($result4);
                   // }

?>