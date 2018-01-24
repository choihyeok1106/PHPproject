<?php 
     $admin = 688273097;
if($_SESSION['user'] == $row['id'] || $_SESSION['user'] == $admin){
                ?>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" >
                    편집
                    </button>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header text-center">
                            <h5 class="modal-title text-left" id="myModalLabel">Edit</h4>
                            </div>
                            <div class="modal-body">
                            <div class="col-md-12 text-center">
                                <button id="Edit" type="button" class="btn btn-info">수정</button>
                                <button id="Delete" type="button" class="btn btn-danger">삭제</button>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>
<?php }?>