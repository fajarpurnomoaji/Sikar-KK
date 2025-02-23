<div class="container-fluid" style="padding:0px; margin-top:-25px;">

    <div class="row" style="background-color: #f9f9f9; padding:5%;">

        <div class="col-sm-12 col-md-6  col-xl-6 text-center">
            <img src="assets/foto/computer_engineering.png" class="img-fluid rounded">
        </div>
        <div class="col-sm-12 col-md-6  col-xl-6">
            <div class="group-text">
                <p class="h1 font-weight-bolder text-center">Sistem Pakar<br>Kerusakan Komputer</p>
                <p class="h5 text-center">Sistem ini digunakan untuk membantu melakukan Diagnosa kerusakan komputer dan Sistem ini mempunyai dua metode yaitu Forward Chaining dan Backward Chaining.</p>
            </div>
            <div class="group-tombol d-flex justify-content-center align-items-center">
                <a href="<?= base_url('home/konsultasi_fc') ?>"><button type="button" class="btn btn-primary btn-lg" style="margin: 0px 5px 0px 5px;">Forward Chaining</button></a>
                <a href="<?= base_url('home/konsultasi_bc') ?>"><button type="button" class="btn btn-primary btn-lg" style="margin: 0px 5px 0px 5px;">Backward Chaining</button></a>
            </div>
        </div>
    </div>
    <div class=" row" style="padding:5%;">

        <div class="col-md-6 col-xl-6 text-center" id="petunjuk">
            <img src="assets/foto/computernote.png" class="img-fluid rounded">
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="group-text">
                <p class="h2 text-center font-weight-bolder">Petunjuk Penggunaan Sistem Pakar</p>
                <ul>
                    <li>
                        <p>Untuk memulai Diagnosa, Pilih dahulu ingin menggunakan metode Forward Chaining atau Backward Chaining.</p>
                    </li>
                    <li>
                        <p>Setelah memilih metode yang ingin digunakan, jawab pertanyaan yang tampil pada layar.</p>
                    </li>
                    <li>
                        <p>Jika sudah selesai, Maka akan muncul hasil diagnosa dari jawaban yang sudah diberikan.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row" style="padding:5% 0% 0% 0%;">
        <div class="col-md-12 col-xl-12 py-4 text-center" id="informasi" style="background-color:  #809fff;">
            <p class="h1 font-weight-bolder">Informasi</h1>
            <p class="h6">Sistem ini merupakan sistem pakar untuk mendiagnosa kerusakan Komputer berbasis web. Sistem ini bertujuan untuk memberi informasi apa saja kerusakan pada komputer serta langkah yang harus dilakukan serta solusi terbaik jika terjadi kerusakan pada komputer sehingga bisa menemukan solusi supaya komputer bisa diperbaiki.</p>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top" style="position: fixed; bottom:80px; right:20px; z-index:99; border:none; outline:none; background-color:blue; color:white; padding:15px; border-radius:50px; font-size:50%;"><i class="fas fa-arrow-up"></i><br>Top</button>

</div>