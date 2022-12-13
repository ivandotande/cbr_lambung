<?php
    include "./connection.php";
    try{
        if(isset($_POST['submitbtn'])){
            $parts_name             = filter_input(INPUT_POST,'p_name',FILTER_SANITIZE_STRING);
            $parts_type             = $_POST['p_type']; 
            $parts_price            = filter_input(INPUT_POST,'p_price');
            $parts_description      = filter_input(INPUT_POST,'part_description');
            if($parts_name == NULL | $parts_type == NULL |$parts_price == NULL|$parts_description == NULL){
                echo "Some part are not detected";
            }else{
                $finderror = "SELECT * FROM inventory_data WHERE part_name='$parts_name'";
                $errorresult = $conn->query($finderror);
                if($errorresult->num_rows >0){
                    printf("%d Item is already in the database.\n", mysqli_num_rows($errorresult));
                    header('Location: ..\Admin_Page\additem.php');
                    exit();
                }
                else if ($errorresult->num_rows  == 0) {{                
                        $sql = "INSERT INTO inventory_data (part_name,part_type,part_price,part_description)
                        VALUES ('$parts_name','$parts_type','$parts_price','$parts_description')";
                        if($conn->query($sql) == TRUE){
                            echo "Records added successfully.";
                            header('Location: ..\Admin_Page\invmgmt.php');
                        }else{
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            header('Location: ..\Admin_Page\additem.php');
                        }
                    }
                }
                else{
                    echo"Error";
                }
            }
        }   
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>