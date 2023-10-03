<!--<a href="#" class="scroll-to-top" style="display: inline;"> 
    <i class='bx bx-chevron-up'></i>
</a>-->


<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>-->


<script src="<?php echo URLROOT; ?>/js4/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js4/jquery-3.3.1.min.js"></script>
<script src="<?php echo URLROOT; ?>/js4/bootstrap.bundle.min.js"></script>

<!--<script src="<!?php echo URLROOT; ?>/js/jquery-3.5.1.js"></script>-->
<!--<script src="<?php // echo URLROOT; ?>/js/jquery.dataTables.min.js"></script>-->
<!--<script src="<?php // echo URLROOT; ?>/js/dataTables.bootstrap5.min.js"></script>-->

<script src="<?php echo URLROOT; ?>/jsb5data/jquery-3.5.1.js"></script>
<script src="<?php echo URLROOT; ?>/jsb5data/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/jsb5data/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT; ?>/jsb5data/dataTables.responsive.min.js"></script>
<script src="<?php echo URLROOT; ?>/jsb5data/responsive.bootstrap5.min.js"></script>

<script src="<?php echo URLROOT; ?>/js/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/fontawesome.min.js"></script>

</div> <!-- END BAR BLEU -->


</body>
</html>


<script>
    $(document).ready(function () {
        $('#table-settings').DataTable();
        $('#table-settingss').DataTable();
        $('#table-atelier').DataTable();
        $('#table-designer').DataTable();
//        $('#table-settings-event').DataTable();
        $('#table-pages').DataTable();
        $('#table-pages02').DataTable();
        $('#table-pages03').DataTable();
        $('#table-contract').DataTable();
        $('#table-reankings').DataTable();
        $('#tbl-greatdevis').DataTable();
    });
</script>

<script type="text/javascript">
    function calculaDays() {
        var d1 = document.getElementById("DATEBEGIN").value;
        var d2 = document.getElementById("DATEEND").value;
        const dateOne = new Date(d1);
        const dateTwo = new Date(d2);
        const time = Math.abs(dateTwo - dateOne);
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        document.getElementById("NUMBERDAY").innerHTML = days;
        document.getElementById("NUMBERDAY0").innerHTML = days + " Jours";


//        var d22 = document.getElementById("DATEEND").value;
//        const dateTwo2 = new Date(d22);
//        const daysplusUn = Math.abs(dateTwo2+ 1);
//        document.getElementById("DATEREPRISE").innerHTML = daysplusUn;
    }

//    function calculaDaysplusUn() {
//        var d22 = document.getElementById("DATEEND").value;
//        const dateTwo2 = new Date(d22);
//        const daysplusUn = Math.abs(dateTwo2+ 1);
//        document.getElementById("DATEREPRISE").innerHTML = daysplusUn;
//    }

    function calculaMonth() {
        var d1 = document.getElementById("DATEDEMBAUCHE").value;
        var d2 = document.getElementById("DATEFINDEMBAUCHE").value;
        const dateOne = new Date(d1);
        const dateTwo = new Date(d2);
        const time = Math.abs(dateTwo - dateOne);
        const mois = Math.round((time / (1000 * 60 * 60 * 24)) / 30);
        document.getElementById("TIMEMONTH").innerHTML = mois;
        document.getElementById("TIMEMONTH0").innerHTML = mois + " Mois";
    }
</script>

<script type="text/javascript">

    //    $(document).on('click', '.wrapper ul li a', function () {
    //        $(this).addClass('active').siblings().removeClass('active');
    //    });

    $(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#SIDBAR, #BODYCNT').toggleClass('active');
        });
    });

    $(document).ready(function () {
//        $(".drp-profil .icon").click(function () {
//            $(this).parent().toggleClass("active");
//            $(".drp-settings").removeClass("active");
//            $(".drp-helps").removeClass("active");
//        });

//        $(".drp-settings .icon").click(function () {
//            $(this).parent().toggleClass("active");
//            $(".drp-profil").removeClass("active");
//            $(".drp-helps").removeClass("active");
//        });

//        $(".__settings .icon").click(function () {
//            $(this).parent().toggleClass("active");
//            $(".__profile").removeClass("active");
//            $(".__help").removeClass("active");
//        });
        $(".__profile .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".__settings").removeClass("active");
            $(".__help").removeClass("active");
        });
//        $(".profile .icon").click(function () {
//            $(this).parent().toggleClass("active");
//            $(".settings").removeClass("active");
//            $(".__help").removeClass("active");
//        });
        $(".__help .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".__help3").removeClass("active");
            $(".__help2").removeClass("active");
        });
        $(".__help2 .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".__help3").removeClass("active");
            $(".__help").removeClass("active");
        });
        $(".__help3 .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".__help2").removeClass("active");
            $(".__help").removeClass("active");
        });

        $(".sidebar-container").click(function () {
            $(".__profile").removeClass("active");
            $(".__settings").removeClass("active");
            $(".__help").removeClass("active");
        });
        $(".menuadjust").click(function () {
            $(".__help2").removeClass("active");
            $(".__help3").removeClass("active");
        });
        $(".main-content").click(function () {
            $(".__profile").removeClass("active");
            $(".__settings").removeClass("active");
            $(".__help").removeClass("active");
            $(".__help2").removeClass("active");
            $(".__help3").removeClass("active");
        });
        $(".header-title-wrapper").click(function () {
            $(".__profile").removeClass("active");
            $(".__settings").removeClass("active");
            $(".__help").removeClass("active");
        });

        $(".drp-helps .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".drp-profil").removeClass("active");
            $(".drp-settings").removeClass("active");
        });

        $(".__profile .icon").click(function () {
            $(this).parent().toggleClass("active");
            $(".__settings").removeClass("active");
            $(".__help").removeClass("active");
            $(".__picker").removeClass("active");
        });

//        $(".__settings .icon").click(function () {
//            $(this).parent().toggleClass("active");
//            $(".__profile").removeClass("active");
//            $(".__help").removeClass("active");
//            $(".__picker").removeClass("active");
//        });

        $(".sidebar").click(function () {
            $(".drp-settings").removeClass("active");
            $(".drp-profil").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".card-erahassi").click(function () {
            $(".drp-settings").removeClass("active");
            $(".drp-profil").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".header-title-wrapper").click(function () {
            $(".drp-settings").removeClass("active");
            $(".drp-profil").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".block-grid").click(function () {
            $(".drp-profil").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".block-grid-01").click(function () {
            $(".drp-profil").removeClass("active");
            $(".drp-settings").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".block-grid-02").click(function () {
            $(".drp-profil").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".block-grid-03").click(function () {
            $(".drp-profil").removeClass("active");
            $(".drp-settings").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".block-grid-04").click(function () {
            $(".drp-profil").removeClass("active");
            $(".drp-settings").removeClass("active");
            $(".drp-helps").removeClass("active");
        });
        $(".CNTNR").click(function () {
            $(".drp-settings").removeClass("active");
            $(".drp-helps").removeClass("active");
            $(".drp-profil").removeClass("active");
        });

        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
