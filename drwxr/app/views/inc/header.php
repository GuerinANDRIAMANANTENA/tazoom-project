<?php
//session_start();

require 'functions.php';
//require 'inc/countactivity.php';
require 'db.php';

loggedonly();

//include 'app/helpers/user.php';
//$user = getUser($_SESSION['USERNAME'], $conn);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta charset="ISO-8859-1">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/cssb5data/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/cssb5data/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/cssb5data/responsive.bootstrap5.min.css">

        <link rel="icon" href="<?php echo URLROOT; ?>/img/logo-tazoom.png">
        <title><?php echo SITENAME; ?></title>

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sortable-theme-light.min.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/fontawesome.min.css">

        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/main.css">
        <style>
            table .trtbody:not(:first-child){
                cursor: pointer;
                transition: all .25s ease-in-out;
            }
            table .trtbody:not(:first-child):hover{
                background-color:#DDD;
            }
            .navbar_left .logo{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .notify-data ._name{
                /*color: #757575;*/
                font-weight: 400;
                /*font-size: 15px;*/
                margin-bottom: 8px;
            }
            .notify-data ._fonction{
                /*font-size: 15px;*/
                color: #9B9EAC;
                white-space: nowrap;
                /*overflow: hidden;*/
                text-overflow: ellipsis;
                /*margin-top:  -48px;*/
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <div class="bartazoom"> 
            <input type="checkbox" name="" id="menu-toggle" />
            <div class="overlay">
                <label for="menu-toggle"></label>
            </div>

            <div class="sidebar">
                <div class="navbar_inner">
                    <nav class="navbar_top fixed-top navbar navbar-expand-lg">
                        <div class="navbar_left">
                            <div class="logo"> 
                                <a href="<?php echo URLROOT; ?>/pages/">
                                    <img src="<?php echo URLROOT; ?>../../logo-tazoom.png" style="padding: 1px;
                                         width: 50px;
                                         margin-right: 5px; border-radius: 50%;
                                         "></a>

                                <div class="notify-data">
                                    <div class="_name text-white display-6 post001" style="font-size: 2rem;line-height: 0.5;">
                                        <?= $_SESSION['auth']->LASTNAME; ?> 
                                        <?= $_SESSION['auth']->FIRSTNAME; ?>
                                    </div>
                                    <div class="_fonction text-white-50">
                                        <?= $_SESSION['auth']->POSTEOCCUP; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar_right">
                            <ul style="display: flex;">
                                <li class="dropdown __help2 settings" title='Param&egrave;tres' data-toggle='tooltip' data-bs-placement="bottom">
                                    <div class="icon __ul st first-child ">
                                        <span class="name text-white-50">
                                            <!--i class='bx bx-cog'></i--> 
                                            Param&egrave;tres
                                        </span>
                                    </div>
                                    <div class="wrapper_settings">
                                        <ul class="menu_items">
                                            <li class="about_settings">
                                                <div class="notify_icon"></div>
                                                <div class="notify_data">
                                                    <div class="__name">
                                                        Param&egrave;tres
                                                    </div>
                                                </div>
                                            </li>  
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/designers/">
                                                    <div class="icon">
                                                    </div> Designer
                                                </a></li>
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/formats/">
                                                    <div class="icon">
                                                    </div> Format
                                                </a></li>
                                                <!--<hr style="margin-top: 2px">-->
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/medias/">
                                                    <div class="icon">
                                                    </div> Section
                                                </a></li>
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/mtypes/">
                                                    <div class="icon">
                                                    </div> M&eacute;dia/Type
                                                </a></li>
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/designations/">
                                                    <div class="icon">
                                                    </div> D&eacute;signation
                                                </a></li>
                                                <!--<hr style="margin-top: 2px">-->
                                            <li class="type-missing-item"><a href="<?php echo URLROOT; ?>/todolists/">
                                                    <div class="icon">
                                                    </div> To do list
                                                </a></li>

                                            <li class="home-to-work-item"><a href="<?php echo URLROOT; ?>/agendas/">
                                                    <div class="icon">
                                                        <!--i class='bx bxs-calendar-alt'></i-->
                                                    </div> Agenda
                                                </a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown __profile __help3">
                                    <div class="icon __ul name last-child text-white-50" style="width: 50px;height: 40px;">
                                        <span class="name">
                                            <!--i class='bx bx-user' ></i--> 
                                            <img src="<?php echo URLROOT; ?>../../signup/img/<?= $_SESSION['auth']->URLFILE; ?>" 
                                                 style="
                                                 width: 30px;
                                                 margin-right: 4px;
                                                 border-radius: 50%;
                                                 ">
                                        </span>
                                    </div>

                                    <div class="wrapper_profil">
                                        <ul class="menu_items">

                                            <li class="user-item"><a href="<?php echo URLROOT; ?>/upgradpwds/">
                                                    <div class="icon">
                                                        <!--i class='bx bxs-circle '></i-->
                                                    </div> Changement mot de passe
                                                </a></li>
                                            <li class="user-item"><a href="<?php echo URLROOT; ?>/users/users">
                                                    <div class="icon">
                                                        <!--span class="bx bx-align-middle"></span-->
                                                    </div> Liste d'utilisateur
                                                </a></li>

                                            <li class="user-item"><a href="<?php echo URLROOT; ?>/../signup/logout.php">
                                                    <div class="icon">
                                                        <!--span class="bx bxs-door-open"></span-->
                                                    </div>  Se d&eacute;connecter
                                                </a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- END NAVBAR_RIGHT -->
                    </nav> <!-- END NAVBAR_TOP FIXED-TOP -->
                </div>
            </div>





