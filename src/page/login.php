<?php include "../bootstrap.php" ?>
<?php $bodyClass = "login-background" ?>
<?php include "layout/header.php" ?>

<?php

?>

    <div class="page-login pt-1">
        <div class="row ">
            <div class="offset-md-2 offset-xl-4 col-md-8 col-xl-4">
                <form class="text-center border border-light p-5 bg-white shadow-lg p-3 mb-5 bg-white rounded"
                      action="index.php">
                    <p class="h4 mb-4">Sign in</p>
                    <label for="defaultLoginFormEmail"></label><input type="email" id="defaultLoginFormEmail"
                                                                      class="form-control mb-4" placeholder="E-mail"/>
                    <label for="defaultLoginFormPassword"></label><input type="password" id="defaultLoginFormPassword"
                                                                         class="form-control mb-4"
                                                                         placeholder="Password"/>
                    <div class="d-flex justify-content-around">
                        <div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <a href="">Forgot password?</a>
                        </div>
                    </div>
                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                    <a href="">Register</a>
                </form>
            </div>
        </div>
    </div>
<?php include "layout/footer.php" ?>