/* Create Database and Table */
create database charitybox;
 
use charitybox;
 
CREATE TABLE `amal` (
  `id` int(11) NOT NULL auto_increment,
  `tipe` varchar(100),
  `nama` varchar(100),
  `nomor` varchar(15),
  `kartu` varchar(100),
  `nominal` varchar(100),
  `pesan` varchar(100),
  PRIMARY KEY  (`id`)
);