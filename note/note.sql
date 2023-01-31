CREATE TABLE `tb_karyawan` (
  `nik` int(16) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `alamat` text,
  `agama` varchar(20) DEFAULT NULL,
  `kode_jabatan` varchar(25) DEFAULT NULL,
  `kode_departemen` varchar(25) DEFAULT NULL,
  `kode_subdepartemen` varchar(25) DEFAULT NULL,
  `nik_ktp` varchar(16) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `tgl_delete` datetime DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tb_jabatan` (
  `kode_jabatan` varchar(25) NOT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `manajerial` varchar(2) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `create_by` varchar(25) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_by` varchar(25) DEFAULT NULL,
  `tgl_delete` datetime DEFAULT NULL,
  `delete_by` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `tb_departemen` (
  `kode_departemen` varchar(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `tgl_delete` datetime DEFAULT NULL,
  `delete_by` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `tb_subdepartemen` (
  `kode_subdepartemen` varchar(5) NOT NULL,
  `kode_departemen` varchar(5) DEFAULT NULL,
  `deskripsi` text,
  `tgl_create` datetime DEFAULT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `tgl_delete` datetime DEFAULT NULL,
  `delete_by` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

