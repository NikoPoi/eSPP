<!-- Bootstrap core JS-->
<script src="../assets/bootstraps/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../asset/js/scripts.js"></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<script>
    document.querySelector('#logout').onclick = function(){
        swal({ title: "LOGOUT",
                text: "Yakin Logout??",
                type: "success",
                icon: "error",
                buttons: ["Kembali", "Iya"]
            }).then(okay => {
                if (okay) {
                    window.location.href = "../server/logout.php";
                }
            });
    }


    // function logout(){
    //     swal({
    //         swal({ title: "SUKSES",
    //             text: "Yakin ingin Log Out??",
    //             type: "danger",
    //             icon: "danger"
    //         }).then(okay => {
    //             if (okay) {
    //                 window.location.href = "../../server/logout.php";
    //             }
    //         });
    //     })
    // }
</script>