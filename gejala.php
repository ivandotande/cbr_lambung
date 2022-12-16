<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Data gejala gejala </h3>
        <div class="adminpage">
            <div class="form">  
                <form method="post" class="admin-form" >
                    <table>
                        <tr>
                            <tr>
                            <label> Kode Gejala </label>
                            </tr>
                            <tr>
                            <input type="text" name= "kGejala" required/><br>
                            </tr>
                        </tr>
                        <tr>
                            <td>
                            <label> Gejala </label>
                            </td>
                            <td>
                            <input type="text" name= "descGejala" required/><br>
                            </td>
                        </tr>
                    </table>
                    <button type="save" class="btn" name="save_btn">Save</button>
                    <button type="reset" class="btn" name="reset_btn">Reset</button>
                </form>
            </div>
            <div class="table">
                <form>
                    <table>
                        <h1>Table Data gejala</h1>
                        <thread>
                            <tr>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT gejala_id, gejala_nama FROM db_gejala");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <form>
                                        <td><?php echo $data['gejala_id']?></td>
                                        <td><?php echo $data['gejala_nama']; ?></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <?php
                            include '.\PHP\connection.php';
                            if (isset($_POST['save_btn'])){
                                $kodegejala = $_POST['kGejala'];
                                $namagejala = $_POST['descGejala'];
                                if($kodegejala == " " or $namagejala = " "){
                                    echo "<script>alert('Empty Value')</script>";
                                    echo "<script>alert('kode = $kodegejala dan nama = $namagejala')</script>";
                                    echo "<script>window.open('gejala.php','_self')</script>";
                                    
                                }
                                else{
                                    $find_gejala = "select * db_gejala where gejala_nama='$namagejala' and gejala_id='$kodegejala'";
                                $check_gejala = mysqli_query($conn,$find_gejala);
                                if($check_gejala == "0"){
                                    $insert_gejala = "insert into db_gejala(gejala_nama,gejala_id) values ('$namagejala' ,'$kodegejala')";
                                    $run_updategejala = mysqli_query($conn,$insert_gejeala);
                                    echo "<script>alert('Gejala Sudah Di masukan')</script>";
                                    echo "<script>window.open('gejala.php','_self')</script>";
                                }
                                elseif($check_gejala == "1"){
                                    $update_gejala = "update db_gejala set gejala_nama='$namagejala' where gejala_id='$kodegejala'";
                                    $run_updategejala = mysqli_query($conn,$update_gejala);
                                    echo "<script>alert('Gejala Sudah Di update')</script>";
                                    echo "<script>window.open('gejala.php','_self')</script>";
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