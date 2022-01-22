<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tiktok No Watermark Downloader</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="/">Tiktok No Watermark Downloader</a>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Download Tiktok Video Without Watermark in Here</h1>
                        <form class="form-subscribe" id="contactForm" method="POST"
                            action="{{ route('getdata.index') }}">
                            @method('POST')
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="urlvideo" name="urlvideo" type="url"
                                        placeholder="Url Video" />
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton"
                                        type="submit">Download</button></div>
                            </div>
                            @if (session('status'))
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Error !</div>
                                        <p> {{ session('status') }}</p>
                                    </div>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    Download Video
                </div>
                <div class="card-body">
                    <img src="{{ $dynamic_cover }}" class="img-fluid" alt="Responsive image">

                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Video ID</th>
                                <td>{{ $video_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Username</th>
                                <td>{{ $username }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nickname</th>
                                <td>{{ $nickname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Desc</th>
                                <td>{{ $desc }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                        <form action="{{ route('downloadVideo.download') }}" method="POST">
                            @csrf
                            <input id="option" name="option" type="hidden" value="without_watermark">
                            <input id="video_id" name="video_id" type="hidden" value="{{ $video_id }}">
                            <button class="btn btn-success m-3" id="submitButton" type="submit">Download Without
                                Watermark</button>
                        </form>
                        <form action="{{ route('downloadVideo.download') }}" method="POST">
                            @csrf
                            <input id="option" name="option" type="hidden" value="with_watermark">
                            <input id="video_id" name="video_id" type="hidden" value="{{ $play_url }}">
                            <button class="btn btn-danger m-3" id="submitButton" type="submit">Download With
                                Watermark</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <p class="text-muted small mb-4 mb-lg-0">Code by sandro putraa with ❤️️</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">

                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
