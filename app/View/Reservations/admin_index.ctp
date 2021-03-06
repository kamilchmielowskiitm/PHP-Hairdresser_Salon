<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Spis Rezerwacji
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php  echo $this->Html->url(array('controller'=>'../Pages','action'=>'display'), true);?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> Wszystkie rezerwacje
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th><?php echo 'id'; ?></th>
                            <th><?php echo 'Data wykonania usługi'; ?></th>
                            <th><?php echo 'Użytkownik dokonujacy rezerwacji'; ?></th>
                            <th><?php echo 'Wybrana usługa'; ?></th>
                            <th><?php echo 'Pracownik wykonujący usługe'; ?></th>

                            <th class="actions"><?php echo __('Opcje'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <td><?php echo h($reservation['Reservation']['id']); ?></td>
                                <td><?php echo h($reservation['Reservation']['reservation_date']); ?></td>

                                <?php
                                foreach($users as $user)
                                {
                                    if($user['User']['id'] == $reservation['Reservation']['users_id'])
                                        echo "<td>".$user['User']['username']."</td>";
                                }
                                ?>

                                <?php
                                foreach($services as $service)
                                {
                                    if($service['Service']['id'] == $reservation['Reservation']['services_id'])
                                        echo "<td>".$service['Service']['service_name']."</td>";
                                }
                                foreach($employees as $employee)
                                {
                                    if($employee['Employee']['id'] == $reservation['Reservation']['employees_id'])
                                        echo "<td>".$employee['Employee']['first_name'].' '.$employee['Employee']['last_name']."</td>";
                                }
                                ?>

                                <td class="actions">
                                    <?php echo $this->Form->postLink(__('Usunięcie'), array('action' => 'delete', $reservation['Reservation']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Jesteś pewien że chcesz usunąć reservation o id: # %s?', $reservation['Reservation']['id']))); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
