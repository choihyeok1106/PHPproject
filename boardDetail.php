<?php
include './db/db.php';
include './nf/nav.php';
session_start();
$no = $_GET['no'];

$sql = 'select * from board where del_y="N" and no= ' . $no;
$result = $conn->query($sql);
$row_cnt=$result->num_rows;
$row=mysqli_fetch_assoc($result);

if(empty($_SESSION['user'])){
?>
<script>
alert("카카오 로그인이 필요합니다. 첫페이지로 이동합니다.")
location.href='../index.php'
</script>
<?php
}else if(empty($no) || $row_cnt == 0){
?>
<script>
alert("잘못된 접근입니다. 첫페이지로 이동합니다.")
location.href='../index.php';
</script>
<?php
} else{
?>
<script>
    $(function(){
        $(".hide").hide();
        $(".hide2").hide();
        var isRun = false;

        //글쓰기
        $(".commentWrite").click(function(){
            if ($("#comment").val() == "") {
                alert("내용을 입력하세요");
            }else if($("#comment").val().length > 400){
                alert("내용은 최대 400자 입니다.")
            }else if(isRun == true){
            return;
            }else{
            isRun = true;
            var boardid = <?php echo $no?>;
            var kakaoid = <?php echo $_SESSION['user']?>;
            var name = "<?php echo $_SESSION['nickname']?>";
            var contents = $('#comment').val();
            contents = contents.replace(/\n/g, "<br>");
            console.log(boardid,kakaoid,name,contents);
            $.ajax({
                type:'POST',
                url:'./back/commentWrite.php',
                data:{
                        "boardid":boardid,
                        "kakaoid":kakaoid,
                        "name":name,
                        "contents":contents
                },
                success:function(){
                    isRun  = false;
                    $('#comment').val("");
                    location.reload();
                    alert("댓글이 작성되었습니다.");
                }
            })
            }
        });

        //게시글삭제
        $('#Delete').click(function(){
            var no = <?php echo $row['no'];?>;
            console.log('no');
            $.ajax({
                type:'POST',
                url:'back/Delete.php',
                data:{
                    'no':no
                },success:function(){
                    location.href = 'boardAll.php';
                }
            })
        });
        //게시판 수정
        $('#Edit').click(function(){
            location.href = 'Edit.php?no=<?php echo $row['no']?>';
        })

        //댓글 show/hide
        $(".editShow").click(function(){
            var i = $(".editShow").index(this);
            $(".hide").eq(i).show();
            $(".show").eq(i).hide();
            var cmtNo = $(".hide2").eq(i).text();
            var contents = $(".cmt").eq(i).html().substring(21);
            contents = contents.substring(0,contents.length - 16);
            contents = contents.replace(/<br>/g, '\n');
            $('.cmtEdit').eq(i).text(contents);
        });
        $(".cancle").click(function(){
            var i = $(".cancle").index(this);
            $(".hide").eq(i).hide();
            $(".show").eq(i).show();
        });

        //댓글 삭제
        $(".commentDelete").click(function(){
            var i = $(".hide2").index(this);
            var cmtNo = $(".hide2").eq(i).text();
            $.ajax({
                type:'POST',
                url:'./back/commentDelete.php',
                data:{
                    "cmtNo":cmtNo
                },success:function(){
                    alert("댓글이 삭제되었습니다.");
                    location.reload();
                }
            })
        });

        //댓글 수정
        $('.commentEdit').click(function(){
            var i = $('.commentEdit').index(this);
            if($('.cmtEdit').eq(i).val()==""){
                alert("글을 작성해주세요");
            }else if($('.cmtEdit').val().length > 400){
                alert("내용은 최대 400자 입니다.")
            }else if(isRun == true){
            return;
            }else{
            isRun = true;
            var contents = $('.cmtEdit').eq(i).val();
            contents = contents.replace(/\n/g, "<br>");
            var cmtNo = $('.hide2').eq(i).text();
            console.log(i);
            $.ajax({
                type:'POST',
                url:'./back/commentEdit.php',
                data:{
                    'contents':contents,
                    'cmtNo':cmtNo
                },success:function(){
                    isRun  = false;
                    $('.cmtEdit').val("");
                    alert("수정되었습니다.");
                    location.reload();
                }
            })
            }
        });
    })
</script>

<div class="container">
    <div class="card" style="margin-bottom:20px;">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><?php echo $row['category']?></div>
                <?php
                if($row['category']=='대나무숲(익명글)'){                   
                ?>
                <div class="col-md-3 text-center"><span style="margin-right:4px;">작성자 : 익명 </span></div>
                <?php } else {?>
                <div class="col-md-3 text-center"><span style="margin-right:4px;">작성자 :</span><?php echo $row['name']?></div>
                <?php }?>
                <div class="col-md-3 text-right"><?php echo $row['time']?></div>
            </div>
        </div>
        <div class="card-footer AC">
            <h4 class="card-title" style="margin-bottom:30px;"><?php echo $row['title']?></h4>
            <p class="card-text"><?php echo $row['contents']?></p>
            <?php include 'Editpopup.php';?>            
        </div>
    </div>

    <!-- 댓글부분 -->
    <!-- 댓글Write -->
    <div class="input-group">
        <textarea class="col-xs-10 border border-right-0 form-control" id="comment" rows="5" placeholder="댓글을 달아주세요. 욕설 / 비방시에 제재 될 수 있습니다. 글자수는 400자로 제한합니다."></textarea>
        <span class="col-xs-2 btn btn-info commentWrite" style="padding:5% 3%;">작성</span>
    </div>

    <!-- 댓글list -->
    <?php
    include 'commentList.php';
    ?>
</div>
<?php
}
include './nf/footer.php';
?>
