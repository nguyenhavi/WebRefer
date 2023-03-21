<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
   exit();
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c2f43f80f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/resources/user-resource/css/tracking.css">
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="./profile.html"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="#" target="__blank"><i
                                        class="fa-solid fa-truck mr-1"></i><span>Tracking</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="./profile_edit.html" target="__blank"><i
                                        class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">                             
                                    <div class="title">Purchase Reciept</div>
                                    <div class="receipt">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-7">
                                                    <span id="heading">Date</span><br>
                                                    <span id="details">10 October 2018</span>
                                                </div>
                                                <div class="col-5 pull-right">
                                                    <span id="heading">Order No.</span><br>
                                                    <span id="details">012j1gvs356c</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing">
                                            <div class="row">
                                                <div class="col-9">
                                                    <span id="name">BEATS Solo 3 Wireless Headphones</span>
                                                </div>
                                                <div class="col-3">
                                                    <span id="price">&pound;299.99</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-9">
                                                    <span id="name">Shipping</span>
                                                </div>
                                                <div class="col-3">
                                                    <span id="price">&pound;33.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total">
                                            <div class="row">
                                                <div class="col-9"></div>
                                                <div class="col-3"><big>&pound;262.99</big></div>
                                            </div>
                                        </div>
                                        <div class="tracking">
                                            <div class="title">Tracking Order</div>
                                        </div>
                                        <div class="progress-track">
                                            <ul id="progressbar">
                                                <li class="step0 active " id="step1">Ordered</li>
                                                <li class="step0 active text-center" id="step2">Shipped</li>
                                                <li class="step0 active text-right" id="step3">On the way</li>
                                                <li class="step0 text-right" id="step4">Delivered</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- More receipt -->
                                    <div class="receipt">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-7">
                                                    <span id="heading">Date</span><br>
                                                    <span id="details">7 June 2022</span>
                                                </div>
                                                <div class="col-5 pull-right">
                                                    <span id="heading">Order No.</span><br>
                                                    <span id="details">219f7dfm729e</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing">
                                            <div class="row">
                                                <div class="col-9">
                                                    <span id="name">MacBook Pro 13</span>
                                                </div>
                                                <div class="col-3">
                                                    <span id="price">&pound;99.99</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-9">
                                                    <span id="name">Shipping</span>
                                                </div>
                                                <div class="col-3">
                                                    <span id="price">&pound;3.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total">
                                            <div class="row">
                                                <div class="col-9"></div>
                                                <div class="col-3"><big>&pound;102.99</big></div>
                                            </div>
                                        </div>
                                        <div class="tracking">
                                            <div class="title">Tracking Order</div>
                                        </div>
                                        <div class="progress-track">
                                            <ul id="progressbar">
                                                <li class="step0 active " id="step1">Ordered</li>
                                                <li class="step0 active text-center" id="step2">Shipped</li>
                                                <li class="step0 active text-right" id="step3">On the way</li>
                                                <li class="step0 active text-right" id="step4">Delivered</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <button class="btn btn-block btn-secondary">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold">Support</h6>
                                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                <button type="button" class="btn btn-primary">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
            background: #f8f8f8
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>