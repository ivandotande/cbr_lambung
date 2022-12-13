<?php
include '.\PHP\connection.php';
include '.\PHP\Navbar.php';
?>

<html>
    <body>
        <h3> Data Penyakit dan solusi Pengangannya </h3>
        <div class="adminpage">
            <div class="form">  
                <form method="post" class="admin-form" action=".\PHP\penyakit.php">
                    <table border="0">
                        <tr>
                            <tr>
                            <label> Kode Penyakit </label>
                            </tr>
                            <tr>
                            <input type="text" name= "kpenyakit" required/><br>
                            </tr>
                        </tr>
                        <tr>
                            <td>
                            <label> Nama Penyakit </label> 
                            </td>
                            <td>
                            <input type="text" name= "npenyakit" required/><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label> Definisi </label>
                            </td>
                            <td>
                            <input type="text" name= "definisi" required/><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label> Solusi </label> 
                            </td>
                            <td>
                            <input type="text" name= "solusi" required/><br>
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
                        <tr>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                        </tr>
                        <?php
                            if(isset($_GET['search'])){
                                $search = $_GET['search'];
                                $sql = mysqli_query($conn, "SELECT db_penyakit.penyakit_id, db_penyakit.penyakit_nama FROM db_penyakit WHERE penyakit_id LIKE'%".$search."%'");
                            }else{
                                $sql = mysqli_query($conn, "SELECT db_penyakit.penyakit_id, db_penyakit.penyakit_nama FROM db_penyakit");
                            }
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <form>
                                        <td><?php echo $data['penyakit_id']?></td>
                                        <td><?php echo $data['penyakit_nama']; ?></td>
                                        <td>
                                            <form action ="search.php" method="get">
                                            <button name='GO' id="GO" value="Gsearch">Search</button>
                                            </form>
                                        </td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                    </table>
                </form>
            </div>
        </div>        
    </body>
</html>