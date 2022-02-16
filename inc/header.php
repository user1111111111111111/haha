<!DOCTYPE html>
<html lang="ko">
<head>
<title>3Rwave</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="telephone=no"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=no" />
	<meta property="og:title" content="3Rwave"/>
	<meta property="og:image" content="../images/common/meta_img.png"/>
	<meta property="og:description" content="3Rwave"/>
	<meta name="description" content="3Rwave"/>
	<link href="../css/import.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
		<script src="../js/html5shiv.js"></script>
		<script src="../js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="../js/slick.min.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
	<script type="text/javascript" src="../js/jquery.rolling.js"></script>
	<script type="text/javascript" src="../js/jquery.rwdImageMaps.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link href="../css/noto/noto.css" rel="stylesheet">  <!-- font-family: 'Noto Sans KR'; -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet"> <!-- font-family: 'Open Sans', sans-serif; -->

	<script type="text/javascript">
	var sb_dep1_id = "<?=$sb_dep1_id;?>";
	var sb_dep2_id = "<?=$sb_dep2_id;?>";
	</script>
</head>
<body id="<?=$sb_page_type?>" class="sub_<?=$sb_dep1_id;?>">
	<div id="wrap">
		<div id="skipNavi">
			<a href="#nav">주메뉴바로가기</a>
			<a href="#content">본문바로가기</a>
		</div>
		<div id="header">
			<h1><a href="/kor/main/">3Rwave</a></h1>
			<div id="nav">
				<div class="gnb">
					<ul>
						<li><a href="../main/">HOME</a></li>
						<li class="menu01"><a href="../company/about.php"><span>COMPANY</span></a>
							<ul class="sgnb">
								<li><a href="../company/about.php">About Us</a></li>
								<li><a href="../company/history.php">History</a></li>
								<li><a href="../company/core.php">Core value</a></li>
							</ul>
						</li>
						<li class="menu02"><a href="../technology/technique.php"><span>TECHNOLOGY</span></a>
							<ul class="sgnb">
								<li><a href="../technology/technique.php">Technique</a></li>
								<li><a href="../technology/patent.php">Patents/Certificates</a></li>
							</ul>
						</li>
						<?php ?>
						<li class="menu03"><a href="../product/prod.php"><span>PRODUCT</span></a>
							<ul class="sgnb">
								<?php foreach($mnPtRes as $mnPtRow){?>
								<li><a href="../product/prod.php?pt1=<?php echo $mnPtRow['idx'];?>"><?php echo $mnPtRow['part_name'];?></a></li>
								<?php }?>
							</ul>
						</li>
						<li class="menu04"><a href="../contact/contact.php"><span>CONTACT</span></a>
							<ul class="sgnb">
								<li><a href="../contact/contact.php">Contact</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<a href="#" class="btn_close">전체메뉴닫기</a>
			</div>
			<div class="bg"></div>
			<a href="#" class="btn_nav">전체메뉴보기</a>
		</div><!-- end: id : header -->
