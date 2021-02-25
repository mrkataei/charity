<?php
$type=send_mail();
?>
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 item text">
                    <div class="row" style="height: 60% ;">
                        <h3><?php echo c_projectName ?></h3>
                        <p><?php echo c_about?></p>
                    </div>
                    <div class="row item social" style="height: 20%;padding-top: 10px">
                        <a href="#"><i class="icon ion-social-facebook"></i></a>
                        <a href="#"><i class="icon ion-social-twitter"></i></a>
                        <a href="#"><i class="icon ion-social-instagram"></i></a>
                    </div>
                    <div class="row" style="height: 30%; padding-top: 20px">
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <?php echo c_Contact ?></button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-container">
                                            <form  class="form-group" name="frmContact"  method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label><?php echo c_EmailName ?></label>
                                                    <input type="text" name="userName" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo c_nameEmail ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo c_Email ?></label>
                                                    <input type="email" name="userEmail" class="form-control"  aria-describedby="emailHelp" placeholder="<?php echo c_YourEmail ?>" required>
                                                    <small id="emailHelp" class="form-text text-muted"><?php echo c_WeNever ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1"><?php echo c_EmailMessage ?></label>
                                                    <textarea class="form-control" name="message" rows="3" placeholder="<?php echo c_YourMessage ?>" required></textarea>
                                                </div>
                                                <div>
                                                    <button class="btn btn-success" style="width: 100%" name="send" type="submit"><?php echo c_send ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 item text" >
                    <?php if(isset($type)){?>
                        <div class="alert alert-success" id="alerty">
                            <?php echo c_successEmailSend ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <p class="copyright"><?php echo c_projectName?>© 2021</p>
        </div>
    </footer>
</div>

</body>
</html>