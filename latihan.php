<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<div class="container mt-4">
<h3>Latihan Soal</h3>

<p>2 + 2 = ?</p>

<button onclick="cek(3)" class="btn btn-outline-primary">3</button>
<button onclick="cek(4)" class="btn btn-outline-primary">4</button>

<p id="hasil"></p>
</div>

<script>
function cek(j){
if(j==4){
document.getElementById('hasil').innerHTML='Benar';
}else{
document.getElementById('hasil').innerHTML='Salah';
}
}
</script>
</body>
</html>