<?php

    $admin = 688273097; 
    $sql2 = 'select * from comment where del_y="N" and boardid = '.$no.' order by no desc';
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while($comment=$result2->fetch_assoc()) {
    ?>
        <div class="row" style="margin: 0; margin:2% 0px 1.5%; border:2px solid #87bfff; border-radius: 8px;">
                <div class="col-md-5" style="margin: 1%;">
                    <div class="hide2">
                        <?php echo $comment['no']?>
                    </div>
                    <div>
                        작성자: <?php echo $comment['name']?>
                    </div>
                </div>
                <div class="col-md-6 text-right" style="margin: 1% 0px 1% 6%;">
                    <div><?php echo $comment['time']?></div>
                </div>
                <div class="col-md-12 cmt" style="font-size: 20px; padding-bottom:10px;">
                    <?php echo $comment['contents']?>
                </div>
            <?php if($_SESSION['user'] == $comment['kakaoid'] || $_SESSION['user'] == $admin)
            {
            ?>
            <div class="col-md-12">   
                <div class="col-md-12 text-right show" style="margin-bottom: 5px;">
                    <button class="btn btn-info editShow" style="margin: 5px;">수정</button>
                    <button class="btn btn-success commentDelete">삭제</button>
                </div>
                <div class="input-group hide" style="margin-bottom: 5px;">
                    <textarea class="col-md-10 border border-right-0 form-control cmtEdit" rows="3"></textarea>
                    <span class="col-md-1 btn btn-info commentEdit" style="padding-top:3%;">작성</span>
                    <div class="col-md-1 btn btn-danger cancle" style="margin-left:5px; padding-top:3%;">취소</div> 
                </div>
            </div>
            <?php }?>
        </div>
        <?php
         }
    } else {
        echo "댓글이 없습니다. 댓글을 작성해주세요~";
    }
?>