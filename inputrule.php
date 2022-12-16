<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Data Ralasi</h3>
        <div class="adminpage">
            <div class="form">  
                <form action="inputrule.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label> Kode Gejala </label>
                        <select name = "kodGejala">
                            <?php
                            $get_kodgejala = mysqli_query($conn,"Select gejala_id from db_gejala");
                            while ($data_kodgejala = mysqli_fetch_array($get_kodgejala)) {
                                ?>
                                    <option><?php echo $data_kodgejala['gejala_id']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>    
                    <div class="form-group">
                        <label> Kode Penyakit </label>
                        <select name = "kodGejala">
                            <?php
                            $get_kodpenyakit = mysqli_query($conn,"Select penyakit_id from db_penyakit");
                            while ($data_kodgejala = mysqli_fetch_array($get_kodpenyakit)) {
                                ?>
                                    <option><?php echo $data_kodgejala['penyakit_id']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    <button class="btn" name="save_btn">Save</button>
                    <button value="reset" name="reset">Reset</button>
                </form>
            </div>
            <div class="table">
                <form>
                    <table>
                        <h1>Data Table Relasi</h1>
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