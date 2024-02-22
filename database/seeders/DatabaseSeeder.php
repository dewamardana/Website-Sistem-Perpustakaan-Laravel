<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Kategori;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

  User::create([
    'nama' => 'Alexis Sances',
    'nisn' => '0072478821',
    'email' => 'alexisSances@gmail.com',
    'telpon' => '085858242844',
    'password' => bcrypt('12345678'),
    'role' => 'admin',
  ]);

    User::create([
    'nama' => 'Budi Doremi',
    'nisn' => '0042734412',
    'email' => 'BudiDoremi@gmail.com',
    'telpon' => '085858242844',
    'password' => bcrypt('12345678'),
    'role' => 'member',
  ]);

    User::create([
    'nama' => 'Kadek Steven',
    'nisn' => '0042734413',
    'email' => 'Kadeksteven@gmail.com',
    'telpon' => '085858242844',
    'password' => bcrypt('12345678'),
    'role' => 'member',
  ]);




        
  Buku::create([ 
    'kode_buku' => '1',
    'judul' => 'Mudah dan Praktis Mengoperasikan Komputer',
    'slug' => 'mudah-dan-praktis-mengoperasikan-komputer',
    'kategori_id' => 4, 
    'deskripsi' => 'mengenalkan berbagai fitur yang dimiliki windows versi terbaru serta pengoperasian komputer yang akan disampaikan bersamaan dengan pengenalan fasilitas yang ada pada sistem operasi windows',
    'penulis' => 'Sintha Setyaningrum dan Triasmana Wirasta', 
    'penerbit_id' => 6,
    'user_id' => 1,
    'status' => 'publish',
  ]);

    Buku::create([ 
    'kode_buku' => '2',
    'judul' => 'Kebutuhan Dasar Manusia dan Proses Keperawatan',
    'slug' => 'kebutuhan-dasar-manusia-dan-proses-keperawatan',
    'kategori_id' => 1, 
    'deskripsi' => 'Pemenuhan kebutuhan dasar manusia, baik dalam keadaan sehat maupun sakit, yang membantu upaya pengoptimalan kehidupan pasien merupakan tujuan dari asuhan keperawatan.',
    'penulis' => 'Tarwoto dan Wartonah', 
    'penerbit_id' => 5,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '3',
    'judul' => 'Panduan Lengkap Menjahit Busana Wanita Dewasa dan Anak',
    'slug' => 'panduan-lengkap-menjahit-busana-wanita-dewasa-dan-anak',
    'kategori_id' => 4, 
    'deskripsi' => 'Buku ini bisa menjadi penuntun bagi siapa pun yang ingin mempelajari lebih dalam seputar menjahit. ',
    'penulis' => 'Dodek Mardana', 
    'penerbit_id' => '1',
    'user_id' => 1,
    'status' => 'publish',
    ]);

        Buku::create([ 
    'kode_buku' => '4',
    'judul' => 'Top Sukses Olimpiade Matematika SMA',
    'slug' => 'top-sukses-olimpiade-matematika-sma',
    'kategori_id' => 3, 
    'deskripsi' => 'Buku Top Sukses Olimpiade Matematika SMA/MA dirancang khusus untuk mempersiapkan siswa menghadapi Olimpiade 
                    Matematika dan Kompetisi Matematika lainnya.',
    'penulis' => 'Jonathan Hoseana', 
    'penerbit_id' => 3,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '5',
    'judul' => 'Super Book IPA SD Kelas IV, V VI',
    'slug' => 'super-book-ipa-sd-kelas-iv-v-vi',
    'kategori_id' => 3, 
    'deskripsi' => 'banyak upaya yang bisa kamu lakukan untuk meraih nilai terbaik dalam ujian sekolah. Ada beberapa titik yang bisa kamu lakukan untuk mencapai nilai maksimal dalam setiap ujian yang kamu hadapi.',
    'penulis' => 'Tim Smart Nusantara', 
    'penerbit_id' => 3,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '6',
    'judul' => 'Segala Sesuatu Yang Perlu Anda Ketahui Tentang Filsafat',
    'slug' => 'segala-sesuatu-yang-perlu-anda-ketahui-tentang-filsafat',
    'kategori_id' => 2, 
    'deskripsi' => 'buku ini membuat filsafat lebih mudah dipelajari daripada sebelumnya. Meliputi pemikiran-pemikiran dari 
                    Aristoteles dan Zeno sampai ke Descartes dan Wittgenstein, buku ini mencakup seluruh ranah pemikiran Barat.',
    'penulis' => 'Peter Gibson', 
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '7',
    'judul' => 'Sejarah Psikologi',
    'slug' => 'sejarah-psikologi',
    'kategori_id' => 2, 
    'deskripsi' => 'Buku ini ditulis untuk tujuan praktis, yaitu membantu mahasiswa mempelajari psikologi dalam 
                    konteks sejarah keilmuan dan perspektif para pemikirnya.',
    'penulis' => 'Felicia Y. Gunawan', 
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '8',
    'judul' => 'Metode Penelitian Geografi',
    'slug' => 'metode-penelitian-geografi',
    'kategori_id' => 5, 
    'deskripsi' => 'Ditulis oleh pakar yang telah berpengalaman dalam penelitian geografi, buku ini menjadi petunjuk praktis yang niscaya akan banyak memperjelas pemahaman terhadap seluk-beluk penelitian di bidang tersebut.',
    'penulis' => 'Drs. Moh. Pabundu Tika', 
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '9',
    'judul' => 'Sejarah Indonesia Untuk SMA Kelas X',
    'slug' => 'sejarah-indonesia-untuk-sma-kelas-x',
    'kategori_id' => 5, 
    'deskripsi' => 'Buku Sejarah Indonesia untuk SMK/MAK Kelas X ini berlandaskan Kurikulum 2013 Revisi Tahun 2016 (sesuai dengan permendikbud No. 24 Tahun 2016). Materi pada buku ini disajikan dengan bahasa yang komunikatif.',
    'penulis' => 'Ratna Hapsari dan M. Adil', 
    'penerbit_id' => 1,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '10',
    'judul' => 'Seni Budaya Untuk SMA Kelas XI',
    'slug' => 'seni-budaya-untuk-sma-kelas-xi',
    'kategori_id' => 6, 
    'deskripsi' => 'Buku Seni Budaya untuk SMA/MA ini disusun berlandaskan Kurikulum 2013 Edisi Revisi 2016. Buku ini mencakup empat macam bidang seni, yaitu seni rupa, seni musik, seni tari, dan seni teater.', 
    'penulis' => 'Sugiyanto, dkk',
    'penerbit_id' => 1,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '11',
    'judul' => 'Terampil Mengoperasikan Microsoft Word',
    'slug' => 'terampil-mengoperasikan-microsoft-word',
    'kategori_id' => 4, 
    'deskripsi' => 'berisi cara mengoperasikan microsoft word mulai dari pengenalan fitur sampai dengan pembuatan dokumen. Cocok digunakan sebagai referensi belajar mengoperasikan microsoft word bagi siapa saja.', 
    'penulis' => 'Sintha Setyaningrum dan Relevantiana Juniarti',
    'penerbit_id' => 6,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '12',
    'judul' => 'Seni Hidup Bersahaja',
    'slug' => 'seni-hidup-bersahaja',
    'kategori_id' => 6, 
    'deskripsi' => 'Dengan pelajaran yang jelas, praktis, dan mudah diterapkan, Shunmyo Masuno memanfaatkan kebijakan yang telah berusia berabad-abad untuk mengajari kita menyederhanakan hidup dan menemukan kebahagiaan di tengah pusaran dunia modern.', 
    'penulis' => 'Shunmyo Masuno',
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    
    Buku::create([ 
    'kode_buku' => '13',
    'judul' => 'Marketing 5.0 : Teknologi Untuk Kemanusian',
    'slug' => 'marketing-5.0-:-teknologi-untuk-kemanusian',
    'kategori_id' => 4, 
    'deskripsi' => 'Buku ini hadir di saat yang tepat dan mempunyai relevansi besar di masa pandemi Covid-19. Karantina wilayah yang berlanjut di banyak negara telah memaksa perusahaan mengeksplorasi aspek digital dari pemasaran.', 
    'penulis' => 'Philip Kotler, Hermawan Kartajaya, Iwan Setiawan',
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);

    Buku::create([ 
    'kode_buku' => '14',
    'judul' => 'Profesi Psikologi Itu Seru',
    'slug' => 'profesi-psikologi-itu-seru',
    'kategori_id' => 2, 
    'deskripsi' => 'Dalam Profesi Psikologi Itu Seru, para penulis yang merupakan angkatan 1994 Fakultas Psikologi UI membuktikan bahwa setelah lulus mereka bisa bekerja di berbagai bidang, mulai dari psikolog, konsultan, peneliti, pendidik, dosen, staf HRD.', 
    'penulis' => 'Alumni Fakultas Psikologi UI 1194',
    'penerbit_id' => 2,
    'user_id' => 1,
    'status' => 'publish',
    ]);
    
    Buku::create([ 
    'kode_buku' => '15',
    'judul' => 'Mudah Belajar Dasar Microsoft Excel',
    'slug' => 'mudah-belajar-dasar-microsoft-excel',
    'kategori_id' => 4, 
    'deskripsi' => 'berisi dasar dasar penggunaan aplikasi microsoft excel meliputi pengenalan menu dan rumus sederhana yang digunakan dalam aplikasi excel.', 
    'penulis' => 'Shinta Setyaningrum dan Erik R. Prabowo',
    'penerbit_id' => 6,
    'user_id' => 1,
    'status' => 'publish',
    ]);


  Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '1',
  'nama_kategori' => 'Umum',
  'slug' => 'umum',
  'deskripsi_kategori' => 'Pada kategori ini terdapat buku-buku mengenai pengetahuan umum di kalangan masyarakat.',
  ]);


  Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '2',
  'nama_kategori' => 'Filsafat dan Psikologi',
  'slug' => 'filsafat-dan-psikologi',
  'deskripsi_kategori' => 'Pada kategori ini tersedia buku-buku mengenai filosofi-filosi kuno serta buku-buku mengenai psikologi.',
  ]);

  Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '3',
  'nama_kategori' => 'Sains dan Matematika',
  'slug' => 'sains-dan-matematika',
  'deskripsi_kategori' => 'Pada kategori ini tersedia buku-buku mengenai pengetahuan tentang alam dan buku-buku perhitungan matematika.',
  ]);

    Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '4',
  'nama_kategori' => 'Teknologi',
  'slug' => 'teknologi',
  'deskripsi_kategori' => 'Pada kategori ini tersedia buku-buku mengenai kemajuan dan perkembangan teknologi, buku-buku pemrograman dan lain-lain.',
  ]);

    Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '5',
  'nama_kategori' => 'Sejarah dan Geografi',
  'slug' => 'sejarah-dan-geografi',
  'deskripsi_kategori' => 'Pada kategori ini tersedia buku-buku mengenai sejarah dunia dan asal usul berbagai negara di dunia.',
  ]);


  Kategori::create([
  'user_id' => 1,
  'kode_kategori' => '6',
  'nama_kategori' => 'Seni dan Rekreasi',
  'slug' => 'seni-dan-rekreasi',
  'deskripsi_kategori' => 'Pada kategori ini tersedia buku-buku mengenai kesenian dan juga rekreasi.',
  ]);


    Penerbit::create([
    'kode_Penerbit' => '1',
    'nama' => 'Erlangga',
    'alamat' => 'Jl. H.Baping Raya No. 100 Ciracas Jakarta.',
    'telpon' => '(021) 871 7006',
    ]);


    Penerbit::create([
    'kode_Penerbit' => '2',
    'nama' => 'Gramedia',
    'alamat' => 'Gedung Kompas Gramedia Blok 1 lt. 5, Jl. Palmerah Barat No. 29-37 Jakarta.',
    'telpon' => '(021) 536 50110',
    ]);

    Penerbit::create([
    'kode_Penerbit' => '3',
    'nama' => 'Grasindo',
    'alamat' => 'Gedung Kompas Gramedia Unit 1 lt. 3, Jl. Palmerah Barat 33-37 Jakarta.',
    'telpon' => '(021) 536 50111',
    ]);


    Penerbit::create([
    'kode_Penerbit' => '4',
    'nama' => 'Kawan Pustaka',
    'alamat' => 'Jl. H. Montong No. 57 Ciganjur, Jagakarsa.',
    'telpon' => '(021) 788 83030',
    ]);

    Penerbit::create([
    'kode_Penerbit' => '5',
    'nama' => 'Salemba',
    'alamat' => 'Jl. Raya Lenteng Agung No. 101 Jagakarsa, Jakarta Selatan ',
    'telpon' => '(021) 788 83030',
    ]);

    Penerbit::create([
    'kode_Penerbit' => '6',
    'nama' => 'Skripta',
    'alamat' => 'Jl. Babadan No. 749, KD VIII Plumbon, Banguntapan, Bantul, DI Yogyakarta.',
    'telpon' => '(0274) 4536316',
    ]);


    }
}
