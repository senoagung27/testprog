<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('dataLemari/{id}', 'TransaksiCariController@dataLemari');
Route::get('dataRak/{id}', 'TransaksiCariController@dataRak');
Route::get('dataKelurahan/{id}', 'KeranjangBaruController@dataKelurahan');
Route::get('dataKecamatan/{id}', 'KeranjangBaruController@dataKecamatan');
Route::get('dataKel/{id}', 'LaporanController@dataKel');
Route::get('dataKec/{id}', 'LaporanController@dataKec');
Route::get('datasKel/{id}', 'LaporanTransaksiController@datasKel');
Route::get('datasKec/{id}', 'LaporanTransaksiController@datasKec');
// Route::get('getDistrict/{id}', 'LaporanTransaksiController@getDistrict');
// Route::get('getVillage/{id}', 'LaporanTransaksiControllerr@getVillage');

Route::group(['middleware' =>['auth']], function(){    
    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/','HomeController@transaksiTerbaru');
    Route::get('/MonitorBerkas','HomeController@MonitorBerkas');

    // Route::get('/Homepage', 'HomepageController@transaksiTerbaru')->name('transaksiTerbaru');

    //Berkas
    Route::get('/Berkas', 'BerkasController@index')->name('berkas');
    Route::get('/Tambahberkas', 'BerkasController@tambah')->name('berkas.create');
    Route::post('/Simpanberkas','BerkasController@create');
    Route::post('/SimpanEditBerkas','BerkasController@simpanedit');
    Route::get('/editBerkas/{id}','BerkasController@edit');
    Route::delete('/hapusBerkas/{id}','BerkasController@hapus');
    Route::get('/detailBerkas/{id}', 'BerkasController@detailberkas')->name('detailberkas');
    // Route::get('/Berkas', 'BerkasController@databooking')->name('databooking');
    // Route::get('/Berkas', 'BerkasController@berkasdipinjam')->name('berkasdipinjam');
    // Route::get('/Berkas', 'BerkasController@berkasdikembalikan')->name('berkasdikembalikan');
    
    //Transaksi
    Route::get('/Transaksi', 'TransaksiController@index')->name('transaksi');
    Route::get('/Tambahtransaksi', 'TransaksiController@tambah')->name('transaksi.create');
    Route::post('/Simpantransaksi','TransaksiController@create');
    Route::post('/SimpanEditTransaksi','TransaksiController@simpanedit');
    Route::get('/editTransaksi/{id}','TransaksiController@edit');
    Route::delete('/hapusTransaksi/{id}','TransaksiController@hapus');
    Route::get('/detailTransaksi/{id}', 'TransaksiController@detailtransaksi')->name('detailTransaksi');
    
     //Transaksi Cari
    Route::get('/TransaksiCari', 'TransaksiCariController@index')->name('transaksicari');
    // Route::get('/TransaksiHasil', 'TransaksiHasilController@index');
    Route::get('/Transaksi/Hasil', 'TransaksiHasilController@cari');
    Route::post('/Simpantambah', 'TransaksiCariController@simpantambah');
    Route::get('/TransaksiCekout', 'TransaksiCekoutController@index');
    Route::get('/Transaksi/Cekout', 'TransaksiCekoutController@tambah');
    Route::get('/Tambahdata', 'TransaksiCariController@tambah');

    // Keranjang
    Route::get('/Keranjang', 'KeranjangController@index');
    Route::delete('/hapusKeranjang/{id}', 'KeranjangController@hapus');
    Route::get('/Keranjang', 'KeranjangController@index')->name('Keranjang');
    Route::post('/SimpanKeranjang', 'KeranjangController@simpanKeranjang')->name('SimpanKeranjang');
    Route::post('/SimpanBerkasKeranjang', 'TransaksiCariController@simpanberkaskerjang');

    Route::post('/Simpancekout', 'TransaksiCekoutController@Simpancekout');
    
    //Petugas
    Route::get('/Siswa', 'SiswaController@index');
    Route::get('/Tambahsiswa', 'SiswaController@tambah')->name('siswa.create');
    Route::post('/Simpansiswa','SiswaController@create');
    Route::post('/SimpanEditSiswa','SiswaController@simpanedit');
    Route::get('/editSiswa/{id}','SiswaController@edit');
    Route::delete('/hapusPetugas/{id}','SiswaController@hapus');
    // Route::get('/Petugas', 'PetugasController@index');
    // Route::get('/Tambahpetugas', 'PetugasController@tambah')->name('petugas.create');
    // Route::post('/Simpanpetugas','PetugasController@create');
    // Route::post('/SimpanEditPetugas','PetugasController@simpanedit');
    // Route::get('/editPetugas/{id}','PetugasController@edit');
    // Route::delete('/hapusPetugas/{id}','PetugasController@hapus');

    //Penyewa
    Route::get('/Penyewa', 'PenyewaController@index')->name('penyewa');
    Route::get('/Tambahpenyewa', 'PenyewaController@tambah')->name('penyewa.create');
    Route::post('/Simpanpenyewa','PenyewaController@create');
    Route::post('/SimpanEditPenyewa','PenyewaController@simpanedit');
    Route::get('/editPenyewa/{id}','PenyewaController@edit');
    Route::delete('/hapusPenyewa/{id}','PenyewaController@hapus');
    
    //Penyimpanan
    Route::get('/Ruangan', 'RuanganController@index')->name('ruangan');
    Route::get('/DetailRuangan/{id}', 'RuanganController@detailruangan');
    Route::get('/InfoRuangan', 'RuanganController@ruangan');
    Route::get('/Tambahruangan', 'RuanganController@tambah')->name('ruangan.create');
    Route::post('/Simpanruangan','RuanganController@create');
    Route::post('/SimpanEditRuangan','RuanganController@simpanedit');
    Route::post('/Ruangan/Import','RuanganController@import_excel');
    Route::get('/editRuangan/{id}','RuanganController@edit');
    Route::delete('/hapusRuangan/{id}','RuanganController@hapus');

    //Lemari
    Route::get('/Lemari', 'LemariController@index');
    Route::get('/Tambahlemari', 'LemariController@tambah')->name('lemari.create');
    Route::get('/tambahLemari/{id}', 'LemariController@tambahlemari');
    Route::post('/Simpanlemari','LemariController@create');
    Route::get('/editLemari/{id}','LemariController@edit');
    Route::delete('/hapusLemari/{id}','LemariController@hapus');
    Route::post('/SimpanEditLemari','LemariController@simpanedit');
    Route::post('/Lemari/Import','LemariController@import_excel');
    
    //Rak
    Route::get('/Rak', 'RakController@index');
    Route::get('/Tambahrak', 'RakController@tambah')->name('rak.create');
    Route::get('/tambahRak/{id}', 'RakController@tambahrak');
    Route::get('/detailRak/{id}', 'RakController@detailrak');
    Route::post('/Simpanrak','RakController@create');
    Route::get('/editRak/{id}','RakController@edit');
    Route::delete('/hapusRak/{id}','RakController@hapus');
    Route::post('/SimpanEditRak','RakController@simpanedit');
    Route::post('/Rak/Import','RakController@import_excel');
    
    //Pinjam Berkas
    Route::get('/Pinjam', 'PinjamController@index')->name('pinjam.index');
    Route::get('/Tambahpinjam', 'PinjamController@tambah')->name('pinjam.create');
    Route::post('/Simpanpinjam','PinjamController@create');
    Route::post('/SimpanEditPinjam','PinjamController@simpanedit');
    Route::get('/editPinjam/{id}','PinjamController@edit');
    Route::delete('/hapusPinjam/{id}','PinjamController@hapus');
    Route::post('/updatePinjam','PinjamController@updatePinjam');
    Route::get('/Pinjam', 'PinjamController@detailpinjam')->name('detailpinjam');

     //Kembali Berkas
     Route::get('/Pengembalian', 'KembaliController@index')->name('kembali');
     Route::post('/SimpanKeranjangPengembalian','KembaliController@SimpanKeranjangPengembalian');
     Route::post('/SimpanTransaksiPengembalian','KembaliController@SimpanTransaksiPengembalian');
     Route::get('/TambahKembali', 'KembaliController@tambah')->name('kembali.create');
     Route::post('/Simpankembali','KembaliController@create');
     Route::post('/SimpanEditKembali','KembaliController@simpanedit');
     Route::get('/editKembali/{id}','KembaliController@edit');
     Route::delete('/hapusKembali/{id}','KembaliController@hapus');
     Route::post('/SimpanPengembalianInventory','KembaliController@SimpanInventory');
     Route::get('/PengembalianInventory/{id}', 'KembaliController@detailInventory');
    //  Route::post('/Pengembalian','KembaliController@Pengembalian');
    //  Route::get('/Kembalikan/{id}', 'KembaliController@detailInventory');
    //  Route::post('/PengembalianBerkas','KembaliController@SimpanPengembalian');
    //  Route::get('/Kembalikan/{id}', 'KembaliController@detailkembalikan');
    //  Route::post('/updateKembali','KembaliController@updateKembali');

    //laporan
     Route::get('/Laporan', 'LaporanController@index')->name('laporan');
     Route::post('/Laporan', 'LaporanController@postIndex');
     Route::get('/editLaporanInventory/{id}', 'LaporanController@edit');
     Route::post('/editLaporanInventorySimpan', 'LaporanController@simpanedit');
     Route::delete('/hapusInvetoryBerkas/{id}','LaporanController@hapus');
     Route::get('/LaporanAggota', 'LaporanAnggotaController@index');
     Route::post('/LaporanBerkas/{id}', 'LaporanController@filterdateberkas');
     Route::post('/filterberkas/export_excel', 'LaporanController@export_excel');
     Route::post('/laporan/import', 'LaporanController@import_excel');
     Route::get('/filterberkas/cetak_pdf', 'LaporanController@cetak_pdf')->name('dataBerkas');
    //  Route::get('/Laporan', 'LaporanController@filterdateberkas')->name('days');
    // Route::get('/Laporan', 'LaporanController@berkasFilter')->name('dataBerkas');
    // Route::get('/Laporan/Transaksi', 'LaporanTransaksiController@index');
    Route::get('/Laporan/DataTransaksi', 'LaporanTransaksiController@index'); 
    Route::post('/Laporan/DataTransaksi', 'LaporanTransaksiController@postIndex');
    Route::get('/Laporan/Pencarian', 'LaporanTransaksiController@pencarian');
    Route::delete('/Laporan/Transaksi/Hapus/{id}', 'LaporanTransaksiController@hapus');
    Route::get('/Pencarian/Transaksi/Hasil', 'LaporanTransaksiController@cari');
    Route::post('/LaporanTransaksi/{id}', 'LaporanTransaksiController@filterdatetransaksi');
    Route::post('/Filter/Hasil/{id}', 'LaporanTransaksiController@cari');
    
    Route::get('/laporantest', 'LaporanController@test');    ///Incoice
      ///Incoice
    

    Route::get('/Incoice', 'InvoiceController@index');

    Route::get('/storeIsian', 'InvoiceController@storeIsian');

    //JenisHak
    Route::get('/JenisHak', 'JenisHakController@index');
    Route::get('/Tambahjenishak', 'JenisHakController@tambah')->name('jenishak.create');
    Route::post('/Simpanjenishak','JenisHakController@create');
    Route::get('/editJenisHak/{id}','JenisHakController@edit');
    Route::delete('/hapusJenisHak/{id}','JenisHakController@hapus');
    Route::post('/SimpanEditJenisHak','JenisHakController@simpanedit');
    Route::post('/JenisHak/Import','JenisHakController@import_excel');


    //TransaksiBaru
    Route::get('/TransaksiBaru', 'KeranjangBaruController@index');
    Route::get('/TambahTransaksiBaru', 'KeranjangBaruController@tambah');
    Route::post('/SimpanKeranjangBaru','KeranjangBaruController@SimpanKeranjangBaru');
    Route::post('/SimpanTransaksiBaru','KeranjangBaruController@SimpanTransaksiBaru');
    Route::post('/updateStatus','KeranjangBaruController@updateStatus');
    // Route::delete('/hapusTransaksiBaru/{id}','KeranjangBaruController@hapus');
    Route::delete('/hapusTransaksiBaru/{id}','KeranjangBaruController@hapus');


    //Sertifikat
    Route::get('/Sertifikat', 'SertifikatController@sertifikat');
    Route::get('/SertifikatBaru', 'SertifikatController@index');
    Route::get('/TambahSertifikatBaru', 'SertifikatController@tambah');
    Route::post('/SimpanKeranjangSertifikat','SertifikatController@SimpanKeranjangSertifikat');
    Route::post('/SimpanSertifikatBaru','SertifikatController@SimpanSertifikatBaru');
    Route::post('/updateRak','SertifikatController@updateRak');
    // Route::delete('/hapusTransaksiBaru/{id}','KeranjangBaruController@hapus');
    Route::delete('/hapusSertifikatBaru/{id}','SertifikatController@hapus');


    Route::get('/Testing', 'TestingController@index');
    Route::get('/APHB-Bukti', 'TestingController@aphbbukti');
    Route::get('/APHB-Biodata', 'TestingController@aphbbio');
    Route::get('/APHB-Pajak', 'TestingController@aphbpajak');
    Route::get('/APHT-Bukti', 'TestingController@aphtbukti');
    Route::get('/APHT-Biodata', 'TestingController@aptbbio');
    Route::get('/APHT-Pajak', 'TestingController@aphtpajak');
    Route::get('/HIBAH-Bukti', 'TestingController@hibahbukti');
    Route::get('/HIBAH-Biodata', 'TestingController@hibahbio');
    Route::get('/HIBAH-Pajak', 'TestingController@hibahpajak');
    Route::get('/WARMEKING-Biodata', 'TestingController@warmekingbio');
    Route::get('/WARMEKING-Surat', 'TestingController@warmekingsurat');
    Route::get('/LEGAL-Biodata', 'TestingController@legalbio');
    Route::get('/LEGAL-Surat', 'TestingController@legalsurat');
    Route::get('/Kecamatan', 'KecamatanController@index');
    Route::post('/simpanImport','KecamatanController@import_excel');


    Route::get('/Kelurahan', 'KelurahanDesaController@index');
    Route::post('/Kelurahan/Import','KelurahanDesaController@import_excel');
});



Route::group(['middleware' =>['auth','CekRole:admin,anggota']], function(){ 
    Route::get('/Pinjam', function () {
        return view('pinjam');   
    });
    Route::get('/Pinjam', 'PinjamController@index')->name('Pinjam');
    Route::get('/Tambahpinjam', 'PinjamController@tambah')->name('pinjam.create');
    Route::post('/Simpanpinjam','PinjamController@create');
    Route::post('/SimpanEditPinjam','PinjamController@simpanedit');
    Route::get('/editPinjam/{id}','PinjamController@edit');
    Route::delete('/hapusPinjam/{id}','PinjamController@hapus');
    Route::post('/updatePinjam','PinjamController@updatePinjam');

});
// Route::get('/login', 'LoginController@login')->name('auth.login');