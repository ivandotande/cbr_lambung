<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar_Admin.php';
?>

<html>
    <body>
        <h3> Data Penyakit dan solusi Pengangannya </h3>
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
                            <input type="text" name= "gejala" required/><br>
                            </td>
                        </tr>
                    </table>
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
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <form>
                                        <td><?php echo $data['penyakit_id']?></td>
                                        <td><?php echo $data['penyakit_nama']; ?></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <?php
                        function savefile(){
                            include '.\PHP\connection.php';
                            if (isset($_POST['save_btn'])){
                                $kodegejala = $_GET['kGejala'];
                                $namapenyakit = $_GET['gejala'];
                                $updatepenyakit = "update db_gejala set gejala_nama='$namapenyakit' where gejala_id='$kodegejala'";
                                $run_updatepenyakit = mysqli_query($conn,$updatepenyakit);
                                if($run_updatepenyakit){
                                    echo "<script>alert('Gejala Sudah Di update')</script>";
                                    echo "<script>window.open('gejala.php','_self')</script>";
                                }else{
                                    
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