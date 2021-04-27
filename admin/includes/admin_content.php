<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard Page
                <small>Subheading</small>
            </h1>
            <?php 
                // To shorten the code by not using instanting the class everytime, static method is used
                // $user = new User();
                
                // $result_set = $user->find_all_users();
                // $result_set = User::find_all_users();

                // foreach ($result_set as $result) {
                //     # code...
                //     echo $result->username . '<BR />';
                // }
                

                // $thisuser = User::find_user_by_id(1);
                           
                //  foreach ($thisuser as $result) {
                //     # code...
                //     echo $result->username . '<BR />';
                // }

                $found_user = User::find_user_by_id(1);
                echo $found_user->username;

            ?>
        </div>
    </div>
    <!-- /.row -->
</div>