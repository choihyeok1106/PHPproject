<?php
    $category=$_GET['category'];
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
    }
    $sql = 'select count(*) as cnt from board category='".$category."' order by no desc';
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

	$allPost = $row['cnt']; //전체 게시글의 수
	$onePage = 7; // 한 페이지에 보여줄 게시글의 수.
	$allPage = ceil($allPost / $onePage); //전체 페이지의 수
	if($page < 1 || ($allPage && $page > $allPage)) {
?>
		<script>
			alert("존재하지 않는 페이지입니다.");
			history.back();
		</script>
<?php
		exit;
	}

	

	$oneSection = 5; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
	$currentSection = ceil($page / $oneSection); //현재 섹션
	$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
	}

	
	$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.

	
	$paging = '<ul class="pagination">'; // 페이징을 저장할 변수 
		$paging .= '<li class="page page_start page-item"><a class="page-link" href="boardAll.php?page=1">처음</a></li>';
	//첫 섹션이 아니라면 이전 버튼을 생성
	if($currentSection != 1) { 
		$paging .= '<li class="page page_prev page-item"><a class="page-link" href="boardAll.php?page=' . $prevPage . '">이전</a></li>';

    }
    
	for($i = $firstPage; $i <= $lastPage; $i++) {
		if($i == $page) {
			$paging .= '<li class="page current page-item"><a class="page-link" href="boardAll.php?page=' . $i . '">' . $i . '</a></li>';
		} else {
			$paging .= '<li class="page page-item"><a class="page-link" href="boardAll.php?page=' . $i . '">' . $i . '</a></li>';
		}
	}

	//마지막 섹션이 아니라면 다음 버튼을 생성
	if($currentSection != $allSection) { 
		$paging .= '<li class="page page_next page-item"><a class="page-link" href="boardAll.php?page=' . $nextPage . '">다음</a></li>';
	}
		$paging .= '<li class="page page_end page-item"><a class="page-link" href="boardAll.php?page=' . $allPage . '">끝</a></li>';
	$paging .= '</ul>';

	
	/* 페이징 끝 */
	$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
	$sqlLimit = " limit " . $currentLimit . ", " . $onePage; //limit sql 구문
	$sql = "select * from board where del_y='N' and category='".$category."' order by no desc" . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
	$result = $conn->query($sql);