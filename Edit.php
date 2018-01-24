<?php
include 'db/db.php';
include './nf/nav.php';
session_start();

$admin = 688273097;
$no=$_GET['no'];
$sql = "select * from board where no ='$no'";
$result= $conn->query($sql);
$row = $result->fetch_assoc();

if($_SESSION['user'] == $admin || $_SESSION['user'] == $row['id'])
{
?>
<script type="text/javascript">
    $(function(){
        CKEDITOR.replace('contents');
        $("#cancle").click(function(){
            window.history.back();
        });
        $("#write").click(function(){
            if($("#category option").index($("#category option:selected")) == 0 || $("#depart option").index($("#depart option:selected")) == 0){
                alert('메뉴,학과를 선택해주세요');
            }else{
            write();
            }
        });
        function write() {
            var no = <?php echo $no?>;
            var title = $("#title").val();
            var contents = CKEDITOR.instances['contents'].getData();
            var depart = $("#depart option:checked").text();
            var category = $("#category option:checked").text();
            console.log(no);
            console.log(title);
            console.log(contents);
            console.log(depart);
            if (title == "" || contents == "") {
                alert("제목이나 내용을 입력해주세요");
            } else {
                $.ajax({
                    type:'POST',
                    url : './back/EditBack.php',
                    data: {
                        "no": no,
                        "title": title,
                        "contents": contents,
                        "depart": depart,
                        "category": category
                    },
                success: function() {
                    alert("수정완료 !")
                    window.history.back();
                }
                     })
                }
            }  
    });
</script>

    <div class="container">
        <h1>Write</h1>
        <select id="category" class="form-control">
            <option value="0">Menu를 선택해주세요</option>
            <option value="1">월택/분실</option>
            <option value="2">과팅</option>
            <option value="3">시험족보</option>
            <option value="4">스포츠</option>
            <option value="5">밥한끼</option>
            <option value="6">대나무숲(익명글)</option>
        </select>
        <div style="margin:20px 0px 20px 0px;">
            <div class="row">
            <span style="margin-left:20px;">제목 : </span>
                <div class="col-md-5 text-right">
                    <input id="title" type="text" class="form-control" value="<?php echo $row['title']?>"/>
                </div>
                <?php?>
                <div class="col-md-3">
                    <span style="margin:0px 5px 0px 5px;">작성자 : <input id="nickname" type="text" readonly value="<?php echo $_SESSION['nickname'];?>"/></span>
                </div>
                <div class="col-md-3 text-right">
                    <select id="depart" class="form-control">
                        <option value="0">학과를 선택해주세요</option>
                        <option value="1">컴퓨터공학과</option>
                        <option value="2">보육복지과</option>
                        <option value="3">뷰티아트과</option>
                        <option value="4">방송과</option>
                        <option value="5">실용음악과</option>
                        <option value="6">건축인테리어학과</option>
                        <option value="7">브랜드디자인과</option>
                        <option value="8">메카트로닉스공학과</option>
                        <option value="9">디스플레이공학과</option>
                        <option value="10">스마트IT학과</option>
                        <option value="11">스마트자동차과</option>
                        <option value="12">호텔관광과</option>
                        <option value="13">호텔조리과</option>
                        <option value="14">의료복지행정과</option>
                    </select>
                </div>
            </div>
        </div>
            <div class="row">
                    <div class="col-md-12">
                        <textarea id="contents" name="contents">
                            <?php echo $row['contents']?>
                        </textarea>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 20px;">
                        <button type="button" class="btn btn-primary" id="write">SUCCESS</button>
                        <button id="cancle" type="button" class="btn btn-warning">CanCel</button>
                    </div>
            </div>
        </div>
    </div>
<?php
include './nf/footer.php';
}
else if(empty($_SESSION['user'] || $_SESSION['nickname'] || $_SESSION['user'] != $row['id'])){
?>
<script>
    alert('허튼수작부리지마쇼 손모가지 날아가붕게');
    window.history.back();
</script>
<?php 
}
?>
