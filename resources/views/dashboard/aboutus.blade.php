@extends('layouts.dashboard')
@section('erga')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Mari Menggalang Dana untuk Mereka</h2>
                        <p>“Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api.“ (HR. Tirmidzi)</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Tentang Kami</li>
                </ol>
            </div>
        </nav>
    </div>

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Tentang Kami</h2>
                <p>
                    Pelajar yang rela begadang demi kebaikan bangsa
                </p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <h3>Latar Belakang pembuatan Website Bantu Mereka</h3>
                    <img src="img/aboutus/abouts.png" class="img-fluid rounded-4 mb-4" alt="">
                    <p>
                        Website Bantu Mereka adalah sebuah website yang bertemakan donasi dari kami kelompok 1 kelas B1
                        program studi D4 Teknik Informatika yang dimana tujuan adanya website ini sebagai project mata
                        kuliah pembelajaran kita yaitu mata kuliah Management Project Perangkat Lunak dan project ini dibuat
                        dari awal pembelajaran semester hingga final pada Ujian Akhir Semester nanti.
                    </p>
                    <p>
                        Selain sebagai Project, Website Bantu Mereka kami adalah sebuah website penggalangan dana dengan
                        memiliki tujuan yaitu memberikan bantuan dalam berbagai bidang, termasuk pendidikan, kesehatan,
                        penanggulangan bencana, pangan, dan banyak lagi. Kami berusaha untuk memberikan akses yang lebih
                        baik terhadap fasilitas pendidikan, menyediakan peralatan medis yang diperlukan, mendukung upaya
                        pemulihan pasca-bencana, dan membantu dalam memberikan makanan bagi yang kelaparan dengan melalui
                        saluran dana donasi yang diberikan. dengan adanya website ini, akan mempermudah masyarakat untuk
                        membantu dalam melakukan donasi kepada yang membutuhkan. Website ini akan ditujukan kepada para user
                        yang memiliki usia diatas 15 tahun keatas yaitu rentang usia remaja hingga dewasa. Website ini
                        terinspirasi oleh sebuah website penggalangan dana yaitu Kita Bisa dengan fungsi dan kegunaan yang
                        hampir sama namun disajikan dengan fitur yang sangat sederhana guna mempermudah user dan mempunyai
                        tampilan website yang sangat jelas guna user mudah memahami.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Dalam pembuatan website ini tentu tidak dilakukan secara seorang sendiri karena website ini
                            adalah sebuah website yang tergolong cukup besar. maka dari itu pengerjaan project website ini
                            dilakukan secara kelompok yang berjumlah 5 anggota yang terdiri dari Project manager yang
                            bertugas mengatur semua jobdesk yang dikerjakan oleh anggota, lalu di lanjut dengan resource
                            manager programmer yang bertugas membuat keseluruhan dari program yang ada pada website,
                            selanjutnya ada change manager programmer yang bertugas membantu resource manager programmer ,
                            Quality assurance atau yang disebut designer yang memiliki tugas memberikan ide-ide tentang apa
                            saja yang ada pada website serta membuat layout website menjadi lebih teratur, dan yang terakhir
                            terdapat technical writer atau yang disebut dengan analyst dengan tugas melakukan analisis dan
                            merancang untuk sistem website bagaimana untuk kedepannya.
                        </p>
                        <p>
                            Untuk sistem pengerjaan dari website ini, para anggota melakukan diskusi sebelum memulai
                            mengerjakan project website tersebut, setelah itu agar tidak terjadi kesalahan dalam komunikasi,
                            setiap progres pengerjaan akan saling melakukan pelaporan. dan hasil pelaporan tersebut pada
                            akhirnya juga dijadikan bahan evaluasi untuk project website
                        </p>

                        <div class="position-relative mt-4">
                            <img src="img/aboutus/donasi.png" class="img-fluid rounded-4" alt="">
                            {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="team" class="team" style="background-color: #F6F6F6">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Anggota Kami</h2>
            </div>

            <div class="row justify-content-center gy-4">

                <div class="col-xl-2 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="img/arekarek/samid.jpeg" class="img-fluid" alt="">
                        <h4>Dimas Suamid</h4>
                        <span>System Analyst</span>
                        <div class="social mt-4">
                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                <span style="font-family:courier">152111513033</span>
                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="img/arekarek/rondo.jpeg" class="img-fluid" alt="">
                        <h4>Rizka Salisa</h4>
                        <span>Designer</span>
                        <div class="social mt-4">
                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                <span style="font-family:courier">152111513043</span>
                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="img/arekarek/indahpenyetan.jpeg" class="img-fluid" alt="">
                        <h4>Indah Narendra</h4>
                        <span>Project Manager</span>
                        <div class="social mt-4">
                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                <span style="font-family:courier">152111513040</span>
                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <img src="img/arekarek/rio.jpeg" class="img-fluid" alt="">
                        <h4>Rio Ferdinand</h4>
                        <span>Programmer</span>
                        <div class="social mt-4">
                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                <span style="font-family:courier">152111513034</span>
                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="500">
                    <div class="member">
                        <img src="img/arekarek/wonganteng.jpg" class="img-fluid" alt="">
                        <h4>Bayu Safutra</h4>
                        <span>Programmer</span>
                        <div class="social mt-4">
                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                <span style="font-family:courier">152111513032</span>
                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
