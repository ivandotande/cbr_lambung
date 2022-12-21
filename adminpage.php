<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Data Penyakit dan solusi Pengangannya </h3>
        <div class="adminpage">
            <div class="form">  
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label> Kode Penyakit </label>
                        <input type="text" name= "kodPenyakit" required/><br>
                    </div>    
                    <div class="form-group">
                        <label> Nama Penyakit </label>
                        <input type="text" name= "namPenyakit" required/><br>
                    </div>
                    <button type="save" class="btn" name="save_btn">Save</button>
                    <button type="reset" class="btn" name="reset_btn">Reset</button>
                </form>
            </div>
            <div class="table">
                <form action="" method="POST" enctype="multipart/form-data">
                <table>
                        <h1>Table Data Penyakit</h1>
                        <thread>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT penyakit_id, penyakit_nama FROM db_penyakit");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <form>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['penyakit_id']?></td>
                                        <td><?php echo $data['penyakit_nama']; ?></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <?php
                            include '.\PHP\connection.php';
                            if (isset($_POST['save_btn'])){
                                $Namapenyakit = $_POST['namPenyakit'];
                                $Kodepenyakit = $_POST['kodPenyakit'];
                                if($Kodepenyakit == " " or $Namapenyakit == " "){
                                    echo "<script>alert('Empty Value ')</script>";
                                    echo "<script>alert('kode = $Kodepenyakit , nama = $Namapenyakit')</script>";
                                    echo "<script>window.open('adminpage.php','_self')</script>";
                                    
                                }
                                else{
                                    $find_penyakit = "select * from db_penyakit where penyakit_id='$Kodepenyakit'";
                                    $check_penyakit = mysqli_query($conn,$find_penyakit);
                                    $check2_penyakit = mysqli_num_rows($check_penyakit);
                                    if($check2_penyakit == "0"){
                                        $insert_penyakit = "insert into db_penyakit(penyakit_nama,penyakit_id) values ('$Namapenyakit' ,'$Kodepenyakit')";
                                        $run_insertpenyakit = mysqli_query($conn,$insert_penyakit);
                                        $check_insertpenyakit = mysqli_num_rows($run_insertpenyakit);
                                        if($check_insertpenyakit == "0" ){
                                            echo "<script>alert('Error Inserting')</script>";
                                        }else{
                                            echo "<script>alert('penyakit Sudah Di masukan')</script>";
                                            echo "<script>window.open('adminpage.php','_self')</script>";
                                        }
                                        
                                    }
                                    elseif($check2_penyakit == "1"){
                                        $update_penyakit = "update db_penyakit set penyakit_nama='$namapenyakit' where penyakit_id='$kodepenyakit'";
                                        $run_updatepenyakit = mysqli_query($conn,$update_penyakit);
                                        $check_updatepenyakit = mysqli_num_rows($run_updatepenyakit);
                                        if($check_updatepenyakit == "0"){
                                            echo "<script>alert('Error Updating')</script>";
                                        }else{
                                            echo "<script>alert('Penyakit Sudah Di update')</script>";
                                            echo "<script>window.open('adminpage.php','_self')</script>";
                                            
                                        }
                                        
                                    }
                                    else{
                                    } 
                            }  
                        }                       
                        ?>
                    </table>
                </form>
            </div>
        </div>        
    </body>
</html>