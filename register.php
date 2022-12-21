<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Registrasi Pengguna</h3>
        <div class="adminpage">
            <div class="form">  
                <form action="register.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label> Nama </label>
                        <input type="text" name= "namPasien" required/><br>
                    </div>  
                    <div class="form-group">
                        <label> Kelamin </label>
                        <select type="text" name= "kelPasien">
                            <option Value="Laki Laki">Laki Laki</option>
                            <option Value="Perempuan">Perempuan</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label> Umur </label>
                        <input type="text" name= "umuPasien" required/><br>
                    </div> 
                    <div class="form-group">
                        <label> Alamat </label>
                        <input type="text" name= "almPasien" required/><br>
                    </div>
                    <div class="form-group">
                        <label> email </label>
                        <input type="text" name= "emaPasien" required/><br>
                    </div>
                    <button class="btn" name="daftar">Daftar</button>
                    <button value="reset" name="reset">Reset</button>
                </form>
            </div>
            <div class="table">
                <form>
                    <table>
                        <?php
                            if (isset($_POST['daftar'])){
                                $nama_pasien = $_POST['namPasien'];
                                $kelamin_pasien = $_POST['kelPasien'];
                                $umur_pasien = $_POST['umuPasien'];
                                $alamat_pasien = $_POST['almPasien'];
                                $email_pasien = $_POST['emaPasien'];
                                //$id =$conn->LAST_INSERT_ID();
                                // $tanggal = date("YY-MM-DD");

                                // if($kodePasien == " " or $namaPasien == " "){
                                //     echo "<script>alert('Empty Value')</script>";
                                //     echo "<script>alert('kode = $kodePasien dan nama = $namaPasien')</script>";
                                //     echo "<script>window.open('Pasien.php','_self')</script>";
                                // }
                                // else{
                                
                                
                                
                                $find_pasien = "SELECT * from db_pasien where nama='$nama_pasien'";
                                $check_pasien = mysqli_query($conn,$find_pasien);
                                $check2_pasien = mysqli_num_rows($check_pasien);
                                if($check2_pasien == "0"){
                                    $insert_pasien = "INSERT into db_pasien(nama,Kelamin,Umur,alamat,tanggal,email) 
                                    values ('$nama_pasien','$kelamin_pasien','$umur_pasien' ,'$alamat_pasien', NOW(), '$email_pasien')";
                                    $run_insertpasien = mysqli_query($conn,$insert_pasien);
                                    $check_insertpasien = mysqli_num_rows($run_insertpasien);
                                    if($check_insertpasien == "0"){
                                        echo "<script>alert('Error Inserting')</script>";
                                    }else{
                                        echo "<script>alert('Pasien Sudah Di masukan')</script>";
                                        echo "<script>window.open('laporanhasil.php','_self')</script>";
                                    }
                                    
                                }
                                elseif($check2_pasien == "1"){
                                    $update_Pasien = "update db_pasien set Kelamin = '$kelamin_pasien', alamat = '$alamat_pasien' , tanggal = NOW() where nama='$nama_pasien'";
                                    $run_updatePasien = mysqli_query($conn,$update_Pasien);
                                    $check_updatePasien = mysqli_num_rows($run_updatePasien);
                                    if($check_updatePasien == "0"){
                                        echo "<script>alert('Error Updating')</script>";
                                    }else{
                                        echo "<script>alert('Pasien Sudah Di update')</script>";
                                        echo "<script>window.open('laporanhasil.php','_self')</script>";
                                        
                                    }
                                    
                                }
                                else{
                                } 
                            }
                        // }                       
                        ?>
                    </table>
                </form>
            </div>
        </div>        
    </body>
</html>