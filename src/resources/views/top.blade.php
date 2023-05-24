@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

        <!-- Masthead-->
        <header class="masthead mb-3" style="background-image: url('assets/img/hello.jpg')">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h2 class="mb-5">英単語学習用クイズアプリ</h2>
                            <!-- Register form-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            @if (Route::has('register'))
                                <div class="nav-item">
                                <button type="button" class="btn btn-success">
                                @if (Route::has('register'))
                                <div class="nav-item" >
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('無料会員登録') }}</a>
                                </div>
                            @endif
                                </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Image Showcases-->
    <div class="container mb-3">
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/apple5.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2><span style="color: #696969;">クイズ形式で楽しく英単語を覚えよう！</span>
                        </h2>
                     
                        <p class="lead mb-0"><span style="color: #696969;">最後に正解数が出るので、満点目指して頑張りましょう！間違えた単語は単語帳に自動的に保存されて便利です。</span></p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/mypage3.png')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2><span style="color: #696969;">便利なマイページ</span></h2>
                        <p class="lead mb-0"><span style="color: #696969;">初級問題は全て無料で遊べます！有料会員になれば全てのカテゴリーと単語帳機能が利用できます。</span></p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/fav3.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2><span style="color: #696969;">オリジナルの単語帳が作れます！</span></h2>
                        <p class="lead mb-0"><span style="color: #696969;">有料プランでは、英単語のお気に入り機能がありオリジナルの英単語帳を簡単に作ることができます。</span></p>
                    </div>
                </div>
            </div>
        </section>
</div>   
        <!-- Call to Action-->
        <section class="text-white text-center" id="register" style="background-color: #696969;">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="my-5">今すぐ始めよう！</h2>
                        <button type="button" class="btn btn-success mb-5">
                        @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('無料会員登録') }}</a>
                                </div>
                            @endif
                            </button>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>



@endsection
