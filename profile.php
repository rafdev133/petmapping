<?php
require_once "connection.php";
$eid =$_GET['profid'];
$sql =mysqli_query($con, "SELECT * FROM dogprofile WHERE id='$eid'");
$result = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dog Profiling</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">

        <style>
            body{
                margin-top: 20px;
                color:#1a202c;
                text-align:left;
                background-color:#e2e8f0;
            }
            .main-body{
                padding: 15px;
            }
            .card{
                box-shadow: 0 1px 0 rgba(0,0,0,.1).0 1px 2px 0 rgba(0,0,0,.06);
            }
            .card{
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }
            .card-body{
                flex: 1 1 auto;
                main-height: 1px;
                padding: 1rem;
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="doginfos.php">Back</a></li>
                </ol>
            </nav>
            <div class="row gutters-sm">
                <div class="col-md-mb3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="avatar.jpg" class="img-circle" alt="dog photo">
                                <div class="mt-3 text-capitalize">
                                    <h4><?php echo $result['petname']?></h4>
                                    <p class="text-secondary mb-1"><span class="glyphicon glyphicon-fire"></span><?php echo $result['breed'];?></p>
                                    <p class="text-secondary mb-1"><span class="glyphicon glyphicon-heart"></span><?php echo $result['vacstatus'];?></p>
                                    <p class="text-muted font-size-sm"><span class="glyphicon glyphicon-map-marker"></span><?php echo $result['address'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>