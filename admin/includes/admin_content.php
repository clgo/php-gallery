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
                $result_set = User::find_all_users();

                while($row = mysqli_fetch_array($result_set)) {
                    
                    echo $row['username'] . "<BR />";
                }
                

                $thisuser = User::find_user_by_id(1);
                $found_user = mysqli_fetch_array($thisuser);
                $user = User::instantiate($found_user);               
                echo $user->username;
            ?>
        </div>
    </div>
    <!-- /.row -->
</div>