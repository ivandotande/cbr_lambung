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

                                // if($kodegejala == " " or $namagejala == " "){
                                //     echo "<script>alert('Empty Value')</script>";
                                //     echo "<script>alert('kode = $kodegejala dan nama = $namagejala')</script>";
                                //     echo "<script>window.open('gejala.php','_self')</script>";
                                // }
                                // else{
                                $find_gejala = "select * from db_pasien where nama='$nama_pasien'";
                                $check_gejala = mysqli_query($conn,$find_gejala);
                                $check2_gejala = mysqli_num_rows($check_gejala);
                                if($check2_gejala == "0"){
                                    $insert_gejala = "insert into db_gejala(gejala_nama,gejala_id) values ('$namagejala' ,'$kodegejala')";
                                    $run_insertgejala = mysqli_query($conn,$insert_gejala);
                                    $check_insertgejala = mysqli_num_rows($run_insertgejala);
                                    if($check_insertgejala == "0"){
                                        echo "<script>alert('Error Inserting')</script>";
                                    }else{
                                        echo "<script>alert('Gejala Sudah Di masukan')</script>";
                                        echo "<script>window.open('gejala.php','_self')</script>";
                                    }
                                    
                                }
                                elseif($check2_gejala == "1"){
                                    $update_gejala = "update db_gejala set gejala_nama='$namagejala' where gejala_id='$kodegejala'";
                                    $run_updategejala = mysqli_query($conn,$update_gejala);
                                    $check_updategejala = mysqli_num_rows($run_updategejala);
                                    if($check_updategejala == "0"){
                                        echo "<script>alert('Error Updating')</script>";
                                    }else{
                                        echo "<script>alert('Gejala Sudah Di update')</script>";
                                        echo "<script>window.open('gejala.php','_self')</script>";
                                        
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