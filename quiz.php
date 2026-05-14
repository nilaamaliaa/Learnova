<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
// Ambil user
$username = $_SESSION['user'];
$mapel = $_GET['mapel'] ?? '';
$kelas = $_GET['kelas'] ?? '';
$bab = $_GET['bab'] ?? '';
$quizData = [

    // ================= IPA =================
    'ipa' => [

        'geraklurus' => [
            'judul' => 'Gerak Lurus',
            'soal' => [

                [
                    'pertanyaan' => 'Planet terbesar di tata surya adalah?',
                    'opsi' => ['Mars', 'Jupiter', 'Venus'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Planet terdekat dengan matahari adalah?',
                    'opsi' => ['Merkurius', 'Bumi', 'Saturnus'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Bumi merupakan planet ke?',
                    'opsi' => ['2', '3', '4'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Planet bercincin adalah?',
                    'opsi' => ['Saturnus', 'Mars', 'Venus'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Pusat tata surya adalah?',
                    'opsi' => ['Bulan', 'Matahari', 'Bumi'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Planet merah disebut?',
                    'opsi' => ['Mars', 'Venus', 'Jupiter'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Satelit alami bumi adalah?',
                    'opsi' => ['Bintang', 'Bulan', 'Mars'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Planet paling panas adalah?',
                    'opsi' => ['Venus', 'Mars', 'Saturnus'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Jumlah planet di tata surya adalah?',
                    'opsi' => ['7', '8', '9'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Planet terbesar kedua adalah?',
                    'opsi' => ['Saturnus', 'Mars', 'Bumi'],
                    'jawaban' => 'A'
                ]

            ]
        ]
    ],

    // ================= IPS =================
    'ips' => [

        'geografi' => [
            'judul' => 'Geografi Indonesia',
            'soal' => [

                [
                    'pertanyaan' => 'Indonesia berada di benua?',
                    'opsi' => ['Asia', 'Eropa', 'Afrika'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Ibu kota Indonesia adalah?',
                    'opsi' => ['Bandung', 'Jakarta', 'Surabaya'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Pulau terbesar di Indonesia adalah?',
                    'opsi' => ['Jawa', 'Kalimantan', 'Bali'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Indonesia disebut negara?',
                    'opsi' => ['Maritim', 'Kutub', 'Gurun'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Gunung tertinggi di Indonesia adalah?',
                    'opsi' => ['Semeru', 'Puncak Jaya', 'Merapi'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Laut terkenal di Indonesia adalah?',
                    'opsi' => ['Laut Jawa', 'Laut Mati', 'Laut Hitam'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Mata uang Indonesia adalah?',
                    'opsi' => ['Ringgit', 'Rupiah', 'Yen'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'Indonesia memiliki berapa musim?',
                    'opsi' => ['2', '4', '1'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Pulau Bali terkenal dengan?',
                    'opsi' => ['Wisata', 'Salju', 'Tambang'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Provinsi paling timur Indonesia?',
                    'opsi' => ['Papua', 'Jawa Barat', 'Banten'],
                    'jawaban' => 'A'
                ]

            ]
        ]
    ],

    // ================= MTK =================
    'mtk' => [

        'aljabar' => [
            'judul' => 'Aljabar',
            'soal' => [

                [
                    'pertanyaan' => '2 + 2 = ?',
                    'opsi' => ['3', '4', '5'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => '5 x 2 = ?',
                    'opsi' => ['10', '12', '15'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => '10 - 5 = ?',
                    'opsi' => ['4', '5', '6'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => '6 : 2 = ?',
                    'opsi' => ['2', '3', '4'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => '3² = ?',
                    'opsi' => ['6', '9', '12'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => '7 + 1 = ?',
                    'opsi' => ['8', '9', '10'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => '12 : 3 = ?',
                    'opsi' => ['2', '3', '4'],
                    'jawaban' => 'C'
                ],

                [
                    'pertanyaan' => '9 - 4 = ?',
                    'opsi' => ['5', '4', '3'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => '8 x 1 = ?',
                    'opsi' => ['6', '7', '8'],
                    'jawaban' => 'C'
                ],

                [
                    'pertanyaan' => '15 + 5 = ?',
                    'opsi' => ['20', '25', '10'],
                    'jawaban' => 'A'
                ]

            ]
        ]
    ],

    // ================= BAHASA INDONESIA =================
    'indo' => [

        'deskripsi' => [
            'judul' => 'Teks Deskripsi',
            'soal' => [

                [
                    'pertanyaan' => 'Teks deskripsi bertujuan untuk?',
                    'opsi' => ['Menggambarkan objek', 'Menghitung angka', 'Bernyanyi'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Ciri teks deskripsi adalah?',
                    'opsi' => ['Banyak detail', 'Banyak angka', 'Pendek'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Teks deskripsi termasuk?',
                    'opsi' => ['Karangan', 'Rumus', 'Lagu'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Objek pada teks deskripsi harus?',
                    'opsi' => ['Jelas', 'Rahasia', 'Kosong'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Bahasa pada teks deskripsi biasanya?',
                    'opsi' => ['Detail', 'Singkat', 'Asing'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Teks deskripsi membuat pembaca?',
                    'opsi' => ['Membayangkan', 'Tidur', 'Bingung'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Contoh objek deskripsi?',
                    'opsi' => ['Pantai', 'Rumus', 'Nilai'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Deskripsi biasanya menggunakan?',
                    'opsi' => ['Kata sifat', 'Rumus', 'Angka'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Teks deskripsi memiliki?',
                    'opsi' => ['Paragraf', 'Hitungan', 'Kode'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Tujuan utama deskripsi adalah?',
                    'opsi' => ['Memberi gambaran', 'Menghitung', 'Menyanyi'],
                    'jawaban' => 'A'
                ]

            ]
        ]
    ],

    // ================= INGGRIS =================
    'inggris' => [

        'introduction' => [
            'judul' => 'Introduction',
            'soal' => [

                [
                    'pertanyaan' => 'How are you artinya?',
                    'opsi' => ['Apa kabar', 'Siapa nama kamu', 'Selamat pagi'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Good morning artinya?',
                    'opsi' => ['Selamat malam', 'Selamat pagi', 'Selamat tinggal'],
                    'jawaban' => 'B'
                ],

                [
                    'pertanyaan' => 'My name is ... digunakan untuk?',
                    'opsi' => ['Perkenalan nama', 'Berhitung', 'Bernyanyi'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Hello termasuk?',
                    'opsi' => ['Greeting', 'Food', 'Number'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Thank you artinya?',
                    'opsi' => ['Terima kasih', 'Maaf', 'Halo'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Good bye artinya?',
                    'opsi' => ['Selamat tinggal', 'Selamat datang', 'Apa kabar'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'I am fine artinya?',
                    'opsi' => ['Saya baik', 'Saya lapar', 'Saya sedih'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'See you later artinya?',
                    'opsi' => ['Sampai jumpa', 'Selamat pagi', 'Terima kasih'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'What is your name artinya?',
                    'opsi' => ['Siapa namamu', 'Berapa umurmu', 'Apa hobimu'],
                    'jawaban' => 'A'
                ],

                [
                    'pertanyaan' => 'Nice to meet you artinya?',
                    'opsi' => ['Senang bertemu denganmu', 'Selamat malam', 'Apa kabar'],
                    'jawaban' => 'A'
                ]

            ]
        ]
    ]

];
if(
    !isset($quizData[$mapel]) ||
    !isset($quizData[$mapel][$bab])
){
    die("Quiz tidak ditemukan");
}

$dataQuiz = $quizData[$mapel][$bab];
$soalList = $dataQuiz['soal'];
$score = null;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz Learnnova</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  body {
      min-height: 100vh;
      margin: 0;
      padding-top: 55px;
      color: white;
      background-color: #44113E;
      background-image:
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed;
    }

 .navbar {
      background: #1e2127 !important;
      backdrop-filter: blur(10px);
    }
 .soal-box{
    background:white;
    border-radius:10px;
    color:#333;
    max-width:850px;
    margin-bottom: 18px;
    }
 .btn-primary{
    background:#2b59c3;
    border:none;
    }
  .btn-primary:hover{
    background:#1f459c;
    }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Learnnova</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="materiLn.php">Materi</a></li>
        <li class="nav-item"><a class="nav-link active" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="leaderboard.php">Leaderboard</a></li>
        <li class="nav-item"><a href="logout.php" class="btn btn-danger ms-2">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">

<div class="quiz-card shadow p-4">

<h3 class="mb-1">
<i class="bi bi-patch-question"></i>
Quiz <?= strtoupper($mapel); ?>
</h3>

<p class="text-muted mb-4">

Kelas <?= $kelas; ?> • <?= $dataQuiz['judul'] ?> </p>
<form method="POST" action="hasil_quiz.php" onsubmit="return validasiQuiz()">

<input type="hidden" name="kelas" value="<?= $kelas; ?>">
<input type="hidden" name="mapel" value="<?= $mapel; ?>">
<input type="hidden" name="bab" value="<?= $bab; ?>">

<?php foreach($soalList as $index => $soal): ?>

<?php $nomor = $index + 1; ?>

<div class="soal-box">

<p>
<b><?= $nomor; ?>. <?= $soal['pertanyaan']; ?></b>
</p>

<?php
$huruf = ['A','B','C'];

foreach($soal['opsi'] as $key => $opsi):
?>

<div class="form-check">

<input
class="form-check-input"
type="radio"
name="q<?= $nomor; ?>"
value="<?= $huruf[$key]; ?>"
id="q<?= $nomor . $huruf[$key]; ?>"
>

<label
class="form-check-label"
for="q<?= $nomor . $huruf[$key]; ?>"
>

<?= $opsi; ?>

</label>

</div>

<?php endforeach; ?>

</div>

<?php endforeach; ?>

<div class="d-flex gap-2 mt-4">

<a href="materiLn.php?kelas=<?= $kelas?>&mapel=<?= $mapel ?><?= isset($bab) ? "&bab=" . $bab : "" ?>"
class="btn btn-secondary btn-sm">

Kembali

</a>

<button
type="submit"
class="btn btn-primary btn-sm">

Submit Quiz

</button>

</div>

</form>

<?php if($score !== null): ?>

<div class="alert alert-info mt-4">

Skor kamu:
<b><?= $score; ?></b>

</div>

<?php if($score == 100): ?>

<div class="alert alert-success">
Nilai sempurna! Pertahankan ya.
</div>

<?php else: ?>

<div class="alert alert-warning">
Coba lagi untuk mendapatkan nilai lebih tinggi.
</div>

<?php endif; ?>

<?php endif; ?>

</div>

</div>

<script>

function validasiQuiz(){

    for(let i = 1; i <= 10; i++){

        let soal =
        document.querySelector(`input[name="q${i}"]:checked`);

        if(!soal){

            alert("Masih ada soal yang belum dijawab");

            return false;
        }
    }

    return true;
}

</script>

</body>
</html>

