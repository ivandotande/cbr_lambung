<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Daftar Pengguna</h3>
        <div class="adminpage">
            <div class="form">  
                <form action="register.php">
                    <div class="form-group">
                    <button class="btn" name="register">Register</button>
                    </div>    
                </form>
            </div>
            <div class="table">
                <form>
                    <table>
                        <h1>Data Table Pasien</h1>
                        <thread>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur Pasien</th>
                                <th>Alamat Pasien</th>
                                <th>Perubahan Terakhir</th>
                                <th>Edit</th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php
                            $no = 1;

                            $sql = mysqli_query($conn, "SELECT * FROM db_pasien");
                            
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <form>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama']?></td>
                                        <td><?php echo $data['Kelamin']; ?></td>
                                        <td><?php echo $data['Umur']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        <td><?php echo $data['email']?></td>
                                        <td><?php 
                                        // $check_Penyakit = mysqli_query($conn,
                                        // "SELECT db_penyakit.penyakit_id,db_penyakit.penyakit_nama, db_penyakit.deskripsi, db_hasil.presentase
                                        // FROM db_hasil
                                        // INNER JOIN db_penyakit ON db_hasil.penyakit_id = db_penyakit.penyakit_id
                                        // WHERE db_hasil.pasien_id = $data['nama'];
                                        // ")
                                        
                                        ?></td>
                                        <td><?php echo $data['tanggal']?></td>
                                        <td><button class="btn" name="Edit">Edit</button>
                                        <button class="btn" name="Delete">Delete</button></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <?php
                            if (isset($_POST['save_btn'])){
                                $namagejala = $_POST['desGejala'];
                                $kodegejala = $_POST['kodGejala'];
                                if($kodegejala == " " or $namagejala == " "){
                                    echo "<script>alert('Empty Value')</script>";
                                    echo "<script>alert('kode = $kodegejala dan nama = $namagejala')</script>";
                                    echo "<script>window.open('gejala.php','_self')</script>";
                                }
                                else{
                                $find_gejala = "select * from db_gejala where gejala_id='$kodegejala'";
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
                        }                       
                        ?>
                    </table>
                </form>
            </div>
        </div>        
    </body>
</html>