<?php
include './db/db.php';
include './nf/nav.php';
?>
    <script>
        $(function(){
            $(".btnWrite").click(function() {
                location.href = "boardWrite.php";
            });
        });
    </script>
    <div class="container">
        <div class="card">
            <div class="card-header">
                통합게시판
            </div>
            <div class="card-body">
                <table class="table">
                <thead class="listH">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Name/Department</th>
                        <th>time</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody class="listB">
                    <?php
                    include './back/boardListAll.php'
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 text-right" style="margin:15px;">
            <button class="btnWrite btn btn-primary">
                    글쓰기
                </button>
        </div>
        <div class="col-md-12 paging text-center">
            <nav class="Page navigation example text-center">
                <?php echo $paging ?>
            </nav>
		</div>
    </div>
    <?php
include './nf/footer.php';
?>
