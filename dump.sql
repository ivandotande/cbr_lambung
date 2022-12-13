CREATE TABLE `db_admin`(
    `username` VARCHAR(255) ,
    `password` VARCHAR(255) 
);
ALTER TABLE
    `db_admin` ADD PRIMARY KEY `db_admin_username_primary`(`username`);
CREATE TABLE `db_gejala`(
    `gejala_id` VARCHAR(255) ,
    `gejala_nama` VARCHAR(255) 
);
ALTER TABLE
    `db_gejala` ADD PRIMARY KEY `db_gejala_gejala_id_primary`(`gejala_id`);
CREATE TABLE `db_penyakit`(
    `penyakit_id` VARCHAR(255) ,
    `penyakit_nama` VARCHAR(255) ,
    `deskripsi` TEXT ,
    `solusi` TEXT 
);
ALTER TABLE
    `db_penyakit` ADD PRIMARY KEY `db_penyakit_penyakit_id_primary`(`penyakit_id`);
CREATE TABLE `db_aturan`(
    `aturan_id` INT ,
    `gejala_id` VARCHAR(255) ,
    `penyakit_id` VARCHAR(255) ,
    `Weight` INT 
);
ALTER TABLE
    `db_aturan` ADD PRIMARY KEY `db_aturan_aturan_id_primary`(`aturan_id`);
CREATE TABLE `db_hasil`(
    `hasil_id` INT ,
    `pasien_id` INT ,
    `penyakit_id` INT ,
    `persentase` DOUBLE ,
    `tanggal` DATE 
);
ALTER TABLE
    `db_hasil` ADD PRIMARY KEY `db_hasil_hasil_id_primary`(`hasil_id`);
CREATE TABLE `db_pasien`(
    `pasien_id` INT ,
    `nama` VARCHAR(255) ,
    `Kelamin` VARCHAR(255) ,
    `Umur` INT ,
    `alamat` VARCHAR(255) ,
    `tanggal` DATE ,
    `email` VARCHAR(255) 
);
ALTER TABLE
    `db_pasien` ADD PRIMARY KEY `db_pasien_pasien_id_primary`(`pasien_id`);
ALTER TABLE
    `db_aturan` ADD CONSTRAINT `db_aturan_gejala_id_foreign` FOREIGN KEY(`gejala_id`) REFERENCES `db_gejala`(`gejala_id`);
ALTER TABLE
    `db_aturan` ADD CONSTRAINT `db_aturan_penyakit_id_foreign` FOREIGN KEY(`penyakit_id`) REFERENCES `db_penyakit`(`penyakit_id`);
ALTER TABLE
    `db_hasil` ADD CONSTRAINT `db_hasil_penyakit_id_foreign` FOREIGN KEY(`penyakit_id`) REFERENCES `db_penyakit`(`penyakit_id`);
ALTER TABLE
    `db_hasil` ADD CONSTRAINT `db_hasil_pasien_id_foreign` FOREIGN KEY(`pasien_id`) REFERENCES `db_pasien`(`pasien_id`);
