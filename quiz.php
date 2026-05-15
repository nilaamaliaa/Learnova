<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$kelas = $_GET['kelas'] ?? '';
$mapel = $_GET['mapel'] ?? '';
$bab = $_GET['bab'] ?? '';

$quizData = [

    // ================= KELAS 10 =================
    '10' => [

        'ipa' => [

            'geraklurus' => [

                'judul' => 'Gerak Lurus',

                'soal' => [

                    [
                        'pertanyaan' => 'Planet terbesar di tata surya adalah?',
                        'opsi' => ['Mars', 'Jupiter', 'Merkurius'],
                        'jawaban' => 'B'
                    ],

                    [
                        'pertanyaan' => 'Planet terdekat dengan matahari adalah?',
                        'opsi' => ['Merkurius', 'Bumi', 'Saturnus'],
                        'jawaban' => 'A'
                    ],

                    [
                        'pertanyaan' => 'Planet bercincin adalah?',
                        'opsi' => ['Saturnus', 'Mars', 'Venus'],
                        'jawaban' => 'A'
                    ]

                ]
            ]
        ],

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
                    ]

                ]
            ]
        ]
    ],

    // ================= KELAS 11 =================
    '11' => [

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
                    ]

                ]
            ]
        ]
    ],

    // ================= KELAS 12 =================
    '12' => [

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
                        'pertanyaan' => 'Thank you artinya?',
                        'opsi' => ['Terima kasih', 'Maaf', 'Halo'],
                        'jawaban' => 'A'
                    ]

                ]
            ]
        ]
    ]
];

$error = '';
$score = null;
$benar = 0;
$total = 0;

// ================= PROSES NILAI =================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kelas = $_POST['kelas'];
    $mapel = $_POST['mapel'];
    $bab = $_POST['bab'];

    $dataQuiz = $quizData[$kelas][$mapel][$bab];
    $soalList = $dataQuiz['soal'];

    foreach ($soalList as $index => $soal) {

        $nomor = $index + 1;

        if (!isset($_POST['q' . $nomor])) {

            $error = "Semua soal wajib dijawab!";
            break;
        }
    }

    if (empty($error)) {

        $total = count($soalList);

        foreach ($soalList as $index => $soal) {

            $nomor = $index + 1;

            $jawabanUser = $_POST['q' . $nomor];

            if ($jawabanUser == $soal['jawaban']) {

                $benar++;
            }
        }

        $score = ($benar / $total) * 100;
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Quiz Learnnova</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#44113E;
            min-height:100vh;
            color:white;
        }

        .menu-btn{
            background:white;
            color:#44113E;
            border-radius:18px;
            padding:25px;
            text-decoration:none;
            display:block;
            font-weight:bold;
            text-align:center;
            transition:0.3s;
            height:100%;
        }

        .menu-btn:hover{
            background:#ffb3d9;
        }

        .soal-box{
            background:white;
            color:#333;
            border-radius:15px;
            padding:20px;
            margin-bottom:20px;
        }

        .hasil-box{
            background:white;
            color:#333;
            border-radius:20px;
            padding:40px;
            max-width:600px;
            margin:auto;
            text-align:center;
        }

    </style>

</head>
<body>

<div class="container py-5">

<!-- ================= PILIH KELAS ================= -->

<?php if (empty($kelas)) : ?>

    <h2 class="text-center mb-5">
        Pilih Kelas
    </h2>

    <div class="row g-4">

        <div class="col-md-4">

            <a href="quiz.php?kelas=10"
            class="menu-btn">

                Kelas 10

            </a>

        </div>

        <div class="col-md-4">

            <a href="quiz.php?kelas=11"
            class="menu-btn">

                Kelas 11

            </a>

        </div>

        <div class="col-md-4">

            <a href="quiz.php?kelas=12"
            class="menu-btn">

                Kelas 12

            </a>

        </div>

    </div>

<!-- ================= LIST QUIZ ================= -->

<?php elseif (!empty($kelas) && empty($bab)) : ?>

    <h2 class="mb-5 text-center">
        Quiz Kelas <?= $kelas; ?>
    </h2>

    <div class="row g-4">

        <?php foreach ($quizData[$kelas] as $namaMapel => $babList) : ?>

            <?php foreach ($babList as $kodeBab => $isiBab) : ?>

                <div class="col-md-4">

                    <a
                    href="quiz.php?kelas=<?= $kelas; ?>&mapel=<?= $namaMapel; ?>&bab=<?= $kodeBab; ?>"
                    class="menu-btn">

                        <?= strtoupper($namaMapel); ?>
                        <br><br>

                        <?= $isiBab['judul']; ?>

                    </a>

                </div>

            <?php endforeach; ?>

        <?php endforeach; ?>

    </div>

<!-- ================= HASIL QUIZ ================= -->

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)) : ?>

    <div class="hasil-box">

        <h2 class="mb-4">
            Quiz Selesai 🎉
        </h2>

        <h1 class="display-1">
            <?= $score; ?>
        </h1>

        <p class="fs-5">
            Jawaban benar:
            <?= $benar; ?>/<?= $total; ?>
        </p>

        <?php if ($score == 100) : ?>

            <div class="alert alert-success">
                Nilai sempurna!
            </div>

        <?php elseif ($score >= 70) : ?>

            <div class="alert alert-primary">
                Bagus! Pertahankan ya
            </div>

        <?php else : ?>

            <div class="alert alert-warning">
                Belajar lagi yaa
            </div>

        <?php endif; ?>

        <a
        href="quiz.php?kelas=<?= $kelas; ?>"
        class="btn btn-primary">

            Kembali

        </a>

    </div>

<!-- ================= HALAMAN SOAL ================= -->

<?php else : ?>

    <?php

    $dataQuiz = $quizData[$kelas][$mapel][$bab];
    $soalList = $dataQuiz['soal'];

    ?>

    <h2 class="mb-2">
        <?= $dataQuiz['judul']; ?>
    </h2>

    <p class="mb-4">
        Kelas <?= $kelas; ?>
    </p>

    <?php if (!empty($error)) : ?>

        <div class="alert alert-danger">

            <?= $error; ?>

        </div>

    <?php endif; ?>

    <form method="POST">

        <input type="hidden"
        name="kelas"
        value="<?= $kelas; ?>">

        <input type="hidden"
        name="mapel"
        value="<?= $mapel; ?>">

        <input type="hidden"
        name="bab"
        value="<?= $bab; ?>">

        <?php foreach ($soalList as $index => $soal) : ?>

            <?php $nomor = $index + 1; ?>

            <div class="soal-box">

                <h5 class="mb-3">

                    <?= $nomor; ?>.
                    <?= $soal['pertanyaan']; ?>

                </h5>

                <?php

                $huruf = ['A', 'B', 'C'];

                foreach ($soal['opsi'] as $key => $opsi) :

                ?>

                    <div class="form-check mb-2">

                        <input
                        class="form-check-input"
                        type="radio"
                        name="q<?= $nomor; ?>"
                        value="<?= $huruf[$key]; ?>"

                        <?php
                        if (
                            isset($_POST['q' . $nomor]) &&
                            $_POST['q' . $nomor] == $huruf[$key]
                        ) {
                            echo "checked";
                        }
                        ?>
                        >

                        <label class="form-check-label">

                            <?= $opsi; ?>

                        </label>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

        <button
        type="submit"
        class="btn btn-primary">

            Submit Quiz

        </button>

    </form>

<?php endif; ?>

</div>

</body>
</html>