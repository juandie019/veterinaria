
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Logo tab --}}

        <title>Construblock</title>
        <link rel="icon" href="/storage/logo/logoconstrublock.png"/>

            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* color: #D8D8D9; */
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                /* font-weight: 200; */
            }

            .btn-primary {
                background-color: #003764 !important;
                border-color: #003764 !important;
            }

            .btn-link {
                color: #003764 !important;
            }

            .shadow-card {
                box-shadow: 12px 0px 10px 0 rgba(0, 0, 0, 0.30);
                border-radius: 25px;
            }

            .height-card {
                height: 96vh;
            }

            .footer-transparent {
                background-color: rgba(255, 255, 255, 0) !important;
            }

            #back-screws, #front-screws {
                animation: screws 3s infinite linear;
                transform-origin: center;
                transform-box: fill-box;
                fill:orange
            }

            #truck {
                animation: truck 1s ease-in-out infinite alternate;
                transform-origin: bottom;
                fill: aqua;
            }

            #tree {
                animation: tree 8s linear infinite;
                position: relative;
                transform-origin: bottom;
            }

            #shape {
                position: relative;
                height: 50px;
                left: 0;
            }

            @keyframes screws{
                from {
                    transform: rotateZ(0deg);
                }
                to {
                    transform: rotateZ(360deg);
                }
            }

            @keyframes truck{
                from {
                    transform: rotateZ(0deg);
                }
                to {
                    transform: rotateZ(.5deg);
                }

                50%{
                    fill: black;
                }
            }

            @keyframes tree {
                100% {
                    transform: translateX(-1300px);
                }
            }
        </style>
    </head>
    <body>
        <div class="containter" id="app">
            <div class="row no-gutters">
                <div class="col-md-9 col-sm-0" >
                    <svg class="" width="100%" height ="100%"  viewBox="0 0 1087 763" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="undraw_towing_6yy4 1" clip-path="url(#clip0)">
                        <g id="shape">
                        <path d="M-10 735.833V-356C-4.80297 -275.362 19.4622 -247.07 42.1513 -231.93C64.9986 -216.685 86.2478 -214.776 84.8206 -186.185C81.976 -129.2 244.119 -115.523 276.358 -65.3764C302.149 -25.2589 256.762 30.3585 230.844 53.1525C219.466 60.3706 199.554 92.1302 210.932 161.424C225.155 248.041 -22.3267 334.659 230.844 408.739C433.381 468.003 605.702 631.297 517.202 773H42.1513L-10 772.303V735.833Z" fill="#003764"/>
                        <path d="M-10 -356V735.833V772.303M-10 -356V772.303M-10 -356C-4.80297 -275.362 19.4622 -247.07 42.1513 -231.93C64.9986 -216.685 86.2478 -214.776 84.8206 -186.185C81.976 -129.2 244.119 -115.523 276.358 -65.3764C302.149 -25.2589 256.762 30.3585 230.844 53.1525C219.466 60.3706 199.554 92.1302 210.932 161.424C225.155 248.041 -22.3267 334.659 230.844 408.739C433.381 468.004 605.702 631.297 517.202 773H42.1513L-10 772.303" stroke="#003764"/>
                        </g>
                        <path id="Vector 1" d="M1068.5 773H517C510.5 706.333 502.1 581.4 520.5 615C538.9 648.6 602.167 681 631.5 693C655.5 696.6 837.833 707.833 926 713C951 716.333 1003.7 725.2 1014.5 734C1028 745 1044 741.5 1074.5 753C1098.9 762.2 1080.67 770.167 1068.5 773Z" fill="#003764" stroke="#003764"/>
                        <g id="truck" filter="url(#filter0_d)">
                        <path id="Vector" d="M668.862 425.424H656.752V511.184H668.862V425.424Z" fill="#3F3D56"/>
                        <path id="Vector_2" d="M881.216 634.387H365.68C364.576 634.387 363.68 635.283 363.68 636.387V678.286C363.68 679.391 364.576 680.286 365.68 680.286H881.216C882.321 680.286 883.216 679.391 883.216 678.286V636.387C883.216 635.283 882.321 634.387 881.216 634.387Z" fill="#3F3D56"/>
                        <path id="Vector_3" d="M797.838 655.336C797.838 656.441 796.943 657.336 795.838 657.336H675.101C673.996 657.336 673.101 656.441 673.101 655.336V502.917C673.101 501.812 673.996 500.917 675.101 500.917H764.996C765.815 500.917 766.55 501.415 766.854 502.175L797.696 579.45C797.79 579.686 797.838 579.937 797.838 580.191V655.336Z" fill="#D8D8D9"/>
                        <path id="Vector_4" d="M743.763 510.58H694.478C693.373 510.58 692.478 511.475 692.478 512.58V561.726C692.478 562.831 693.373 563.726 694.478 563.726H743.763C744.868 563.726 745.763 562.831 745.763 561.726V512.58C745.763 511.475 744.868 510.58 743.763 510.58Z" fill="white"/>
                        <path id="Vector_5" d="M784.748 561.645C785.224 562.95 784.258 564.33 782.869 564.33H753.818C752.714 564.33 751.818 563.435 751.818 562.33V513.184C751.818 512.079 752.714 511.184 753.818 511.184H764.952C765.792 511.184 766.543 511.709 766.831 512.499L784.748 561.645Z" fill="white"/>
                        <path id="Vector_6" d="M707.01 593.923H694.9V616.873H707.01V593.923Z" fill="#3F3D56"/>
                        <path id="Vector_7" d="M762.112 545.004H762.718C765.769 545.004 768.696 546.213 770.853 548.365C773.011 550.517 774.223 553.436 774.223 556.479V556.479C774.223 559.522 773.011 562.441 770.853 564.593C768.696 566.745 765.769 567.954 762.718 567.954H762.112V545.004Z" fill="#3F3D56"/>
                        <path id="Vector_8" d="M311.605 634.387H312.211C315.262 634.387 318.189 635.596 320.346 637.748C322.504 639.9 323.716 642.818 323.716 645.862V645.862C323.716 648.905 322.504 651.824 320.346 653.976C318.189 656.128 315.262 657.336 312.211 657.336H311.605V634.387Z" fill="#3F3D56"/>
                        <path id="Vector_9" d="M846.28 634.214C864.413 634.214 880.756 642.823 892.246 656.6C892.633 657.063 893.202 657.337 893.805 657.337H913.675C915.06 657.337 916.025 655.963 915.556 654.659L893.894 594.475C893.656 593.813 893.088 593.325 892.398 593.19L788.808 572.812C787.543 572.564 786.377 573.558 786.423 574.846L789.292 655.408C789.33 656.484 790.214 657.337 791.291 657.337H798.754C799.357 657.337 799.927 657.063 800.313 656.6C811.803 642.823 828.146 634.214 846.28 634.214Z" fill="#D8D8D9"/>
                        <path id="Vector_10" d="M676.734 479.175H651.302V662.168H676.734V479.175Z" fill="#3F3D56"/>
                        <path id="Vector_11" d="M676.734 628.952H311V639.823H676.734V628.952Z" fill="#3F3D56"/>
                        <path id="Vector_12" d="M769.379 566.746H757.268V571.577H769.379V566.746Z" fill="#3F3D56"/>
                        <path id="Vector_13" d="M901.427 615.806L900.861 616.02C898.007 617.096 894.841 616.998 892.06 615.747C889.278 614.495 887.11 612.193 886.03 609.346V609.346C884.951 606.5 885.049 603.342 886.304 600.568C887.559 597.794 889.867 595.631 892.721 594.554L893.287 594.34L901.427 615.806Z" fill="#3F3D56"/>
                        <g id="bloques">
                        <rect id="Rectangle 1" x="405" y="459" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 2" x="485.923" y="459" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 3" x="566.845" y="459" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 13" x="405" y="568.944" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 14" x="485.923" y="568.944" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 5" x="405" y="486.486" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 4" x="515.986" y="486.486" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 6" x="435.063" y="486.486" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 10" x="405" y="541.458" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 11" x="515.986" y="541.458" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 12" x="435.063" y="541.458" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 16" x="405" y="596.43" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 17" x="515.986" y="596.43" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 18" x="435.063" y="596.43" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 7" x="405" y="513.972" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 8" x="485.923" y="513.972" width="79.0145" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 9" x="566.845" y="513.972" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        <rect id="Rectangle 15" x="566.845" y="568.944" width="28.1546" height="26.5698" fill="#D8D8D9"/>
                        </g>
                        <g id="tarima">
                        <path id="Vector_14" d="M382.418 629.015L382.5 623.015L370.53 623L370.449 629.001L382.418 629.015Z" fill="#3F3D56"/>
                        <path id="Vector_15" d="M511.977 628.808L512.053 623.176L500.084 623.162L500.007 628.793L511.977 628.808Z" fill="#3F3D56"/>
                        <path id="Vector_16" d="M625.97 628.979L626.051 623.015L614.081 623L614 628.964L625.97 628.979Z" fill="#3F3D56"/>
                        <path id="Vector_17" d="M370.027 621.87V623.87H626.344V621.87H370.027Z" fill="#3F3D56"/>
                        <path id="Vector_18" d="M370 627V630H626.4V627H370Z" fill="#3F3D56"/>
                        </g>
                        </g>
                        <g id="back-wheel">
                        <path id="Vector_19" d="M370.672 727.573C396.088 727.573 416.692 706.969 416.692 681.553C416.692 656.137 396.088 635.533 370.672 635.533C345.256 635.533 324.652 656.137 324.652 681.553C324.652 706.969 345.256 727.573 370.672 727.573Z" fill="#3F3D56"/>
                        <path id="Vector_20" d="M370.672 705.774C384.049 705.774 394.893 694.93 394.893 681.553C394.893 668.176 384.049 657.332 370.672 657.332C357.295 657.332 346.451 668.176 346.451 681.553C346.451 694.93 357.295 705.774 370.672 705.774Z" fill="#D8D8D9"/>
                        </g>
                        <g id="front-wheel">
                        <path id="Vector_21" d="M843.68 727.729C872.774 727.729 896.36 704.143 896.36 675.049C896.36 645.954 872.774 622.369 843.68 622.369C814.586 622.369 791 645.954 791 675.049C791 704.143 814.586 727.729 843.68 727.729Z" fill="#3F3D56"/>
                        <path id="Vector_22" d="M843.68 702.775C858.993 702.775 871.406 690.362 871.406 675.049C871.406 659.736 858.993 647.322 843.68 647.322C828.367 647.322 815.954 659.736 815.954 675.049C815.954 690.362 828.367 702.775 843.68 702.775Z" fill="#D8D8D9"/>
                        </g>
                        <g id="back-screws">
                        <path id="Vector_23" d="M384.536 693.091C386.417 693.091 387.941 691.566 387.941 689.686C387.941 687.805 386.417 686.281 384.536 686.281C382.655 686.281 381.131 687.805 381.131 689.686C381.131 691.566 382.655 693.091 384.536 693.091Z" fill="#3F3D56"/>
                        <path id="Vector_24" d="M369.942 700.115C371.822 700.115 373.347 698.591 373.347 696.71C373.347 694.829 371.822 693.305 369.942 693.305C368.061 693.305 366.536 694.829 366.536 696.71C366.536 698.591 368.061 700.115 369.942 700.115Z" fill="#3F3D56"/>
                        <path id="Vector_25" d="M355.347 677.286C357.228 677.286 358.752 675.761 358.752 673.881C358.752 672 357.228 670.476 355.347 670.476C353.466 670.476 351.942 672 351.942 673.881C351.942 675.761 353.466 677.286 355.347 677.286Z" fill="#3F3D56"/>
                        <path id="Vector_26" d="M355.347 693.091C357.228 693.091 358.752 691.566 358.752 689.686C358.752 687.805 357.228 686.281 355.347 686.281C353.466 686.281 351.942 687.805 351.942 689.686C351.942 691.566 353.466 693.091 355.347 693.091Z" fill="#3F3D56"/>
                        <path id="Vector_27" d="M384.536 677.286C386.417 677.286 387.941 675.761 387.941 673.881C387.941 672 386.417 670.476 384.536 670.476C382.655 670.476 381.131 672 381.131 673.881C381.131 675.761 382.655 677.286 384.536 677.286Z" fill="#3F3D56"/>
                        <path id="Vector_28" d="M369.942 670.261C371.822 670.261 373.347 668.737 373.347 666.856C373.347 664.976 371.822 663.451 369.942 663.451C368.061 663.451 366.536 664.976 366.536 666.856C366.536 668.737 368.061 670.261 369.942 670.261Z" fill="#3F3D56"/>
                        <path id="Vector_29" d="M369.942 687.322C372.897 687.322 375.293 684.927 375.293 681.972C375.293 679.017 372.897 676.622 369.942 676.622C366.986 676.622 364.59 679.017 364.59 681.972C364.59 684.927 366.986 687.322 369.942 687.322Z" fill="#3F3D56"/>
                        </g>
                        <g id="front-screws">
                        <path id="Vector_30" d="M860.086 688.145C862.229 688.145 863.966 686.408 863.966 684.265C863.966 682.122 862.229 680.385 860.086 680.385C857.944 680.385 856.206 682.122 856.206 684.265C856.206 686.408 857.944 688.145 860.086 688.145Z" fill="#3F3D56"/>
                        <path id="Vector_31" d="M843.465 696.145C845.608 696.145 847.345 694.408 847.345 692.265C847.345 690.122 845.608 688.385 843.465 688.385C841.322 688.385 839.585 690.122 839.585 692.265C839.585 694.408 841.322 696.145 843.465 696.145Z" fill="#3F3D56"/>
                        <path id="Vector_32" d="M826.843 670.145C828.986 670.145 830.723 668.408 830.723 666.265C830.723 664.122 828.986 662.385 826.843 662.385C824.7 662.385 822.963 664.122 822.963 666.265C822.963 668.408 824.7 670.145 826.843 670.145Z" fill="#3F3D56"/>
                        <path id="Vector_33" d="M826.843 688.145C828.986 688.145 830.723 686.408 830.723 684.265C830.723 682.122 828.986 680.385 826.843 680.385C824.7 680.385 822.963 682.122 822.963 684.265C822.963 686.408 824.7 688.145 826.843 688.145Z" fill="#3F3D56"/>
                        <path id="Vector_34" d="M860.086 670.145C862.229 670.145 863.966 668.408 863.966 666.265C863.966 664.122 862.229 662.385 860.086 662.385C857.944 662.385 856.206 664.122 856.206 666.265C856.206 668.408 857.944 670.145 860.086 670.145Z" fill="#3F3D56"/>
                        <path id="Vector_35" d="M843.465 662.145C845.608 662.145 847.345 660.408 847.345 658.265C847.345 656.122 845.608 654.385 843.465 654.385C841.322 654.385 839.585 656.122 839.585 658.265C839.585 660.408 841.322 662.145 843.465 662.145Z" fill="#3F3D56"/>
                        <path id="Vector_36" d="M843.463 681.575C846.829 681.575 849.558 678.846 849.558 675.48C849.558 672.114 846.829 669.385 843.463 669.385C840.097 669.385 837.369 672.114 837.369 675.48C837.369 678.846 840.097 681.575 843.463 681.575Z" fill="#3F3D56"/>
                        </g>
                        </g>
                        <defs>
                        <filter id="filter0_d" x="307" y="425.424" width="612.676" height="262.862" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <clipPath id="clip0">
                        <rect width="1087" height="763" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="col-md-3">
                    <div class="card  mt-3 mr-4 height-card shadow-card border-0" >
                        <div class ="card-body" >
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="/storage/logo/logoconstrublock2.png" style=""  class="img-fluid mx-auto d-block" alt="Logo">
                                </div>
                            </div>
                            <br>
                            <div class="row d-none d-lg-block">
                                <br><br>
                            </div>
                            <div class="col-sm-0 col-md-12 text-left mb-2" style="font-size:2vw">
                                Bienvenido :)
                            </div>
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('login') }}" class="">
                                  @csrf

                                    <div class="form-group row">
                                        <div class="col-md-11 col-lg-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electronico">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-lg-12">
                                            <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row pb-2 ">
                                        <div class="col-lg-12 col-md-12 text-lg-right">
                                            <a class="btn btn-link" href="{{ route('register') }}">
                                                {{ __('Hacer cuenta') }}
                                            </a>

                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Olvide contraseña') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 ml-1">
                                        <div class="col-md-6 col-sm-2 col-lg-3 form-check mt-2  offset-lg-4">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                <small>{{ __('Recordarme') }} </small>
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-sm-2 ml-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Entrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer border-0 footer-transparent">
                            <div class="col-sm-0 col-md-12 text-center my-auto" style="font-size:3vw">
                                    ConstruBlock
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
