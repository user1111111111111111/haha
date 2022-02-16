<?php

//=======       POPUP 창 설정 ==========================================================//
$now_time       =  date('Y-m-d');
// $now_time		= time();
$popup_result   =   $db->select("cs_popup", " where start_day <='$now_time' AND end_day >= '$now_time'");

$left   = "80";
$ii     = "0";
$z_index= "10000";
//while($popup_row=mysql_fetch_object($popup_result)) {
foreach ($popup_result as $popup_row){
	
    $ii++;

    if($popup_row['lefts']){   $left= $popup_row['lefts'];  }else{  $left = $left;   }
    if($popup_row['tops']){ $top= $popup_row['tops'];   }else{  $top    =   "10"; }
    $COOKIE_NAME="POPUP_COOKIE_".$popup_row['idx'];

    if( $HTTP_COOKIE_VARS['POPUP_COOKIE_'.$popup_row['idx']] != 'NO' ) {
            $popup_row['height']=$popup_row['height'];
            $z_index    =   $z_index+"1";
?>

<!--레이어팝업--> 
<script type="text/javascript">
function setCookie<?php echo $ii;?>( name, value, expiredays )
{
    var todayDate = new Date();
    //todayDate.setDate( todayDate.getDate() + expiredays );
    //document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    var cookieDate = new Date(todayDate.getFullYear(), todayDate.getMonth(), (todayDate.getDate()+1)); 
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + cookieDate.toGMTString() + ";"
}

<?php if($popup_row['live']=="0") {?>
function closeWin<?php echo $ii;?>(){
    if ( document.notice_form<?php echo $ii;?>.popup_end<?php echo $ii;?>.checked ) {
        setCookie<?php echo $ii;?>( '<?php echo $COOKIE_NAME;?>', 'NO', 1 );//쿠기 저장 기간은 1일로 한다.
    }
    
    //window.close();
    document.all['divpop<?php echo $ii;?>'].style.display = "none";
} 
<?} else if($popup_row['live']=="1") {?>
function closeWin<?php echo $ii;?>(){
    if ( document.notice_form<?php echo $ii;?>.popup_end<?php echo $ii;?>.checked ) {
        setCookie<?php echo $ii;?>( '<?php echo $COOKIE_NAME;?>', 'NO', 365 );//쿠기 저장 기간은 1일로 한다.
    }
    //window.close();
    document.all['divpop<?php echo $ii;?>'].style.display = "none";
} 
<?}?>

function closeGo<?php echo $ii;?>(url){
    document.all['divpop<?php echo $ii;?>'].action.href='http://'+url;
    //window.close();
    document.all['divpop<?php echo $ii;?>'].style.display = "none";
} 


</script>
<style>
	#divpop<?php echo $ii;?>{
		position:absolute;
		left:<?php echo $left;?>px;
		top:<?php echo $top;?>px;
		z-index:100000000;
		visibility:hidden;
	}
	.popup_contents<?php echo $ii;?>{
		background-color:#fff;
		width:<?php echo $popup_row['width'];?>px;
		height:<?php echo $popup_row['height'];?>px;
		padding: 15px 15px 15px 15px;
		border:1px solid #d5d5d5;
		word-break:break-all;
		overflow:hidden;
		/* overflow-y:auto; */
	}
	.popup_close<?php echo $ii;?>{
		background-color:#666;
		width:<?php echo $popup_row['width']+2;?>px;
		padding: 5px 15px 5px 15px;
		text-align:right;
	}
	.popup_close<?php echo $ii;?> span{
		color:#fff;
	}
	.popup_close<?php echo $ii;?> a{
		color:#fff;
		font-weight:700;
	}

	@media all and (max-width:1024px){
		.popup_wrap{left:20px !important; top:20px !important; width:calc(100% - 20px);}
		.popup_wrap form{position:relative; width:65%; max-width:300px}
		.popup_wrap .pop_cts{width:100% !important; box-sizing:border-box; padding:7px; height:auto}
		.popup_wrap .pop_cts img{width:100%; height:auto;}
		.popup_close<?php echo $ii;?>{width:100%; box-sizing:border-box; padding:5px; height:auto}
		.popup_close<?php echo $ii;?> span{color:#fff; font-size:11px;}
		.popup_close<?php echo $ii;?> a{color:#fff; font-weight:700; font-size:11px;}
	}
	@media all and (max-width:768px){
		.popup_wrap form{max-width:200px}
	}
</style>

<!--popup-->
<div id="divpop<?php echo $ii;?>" class="popup_wrap">
	<form name="notice_form<?php echo $ii;?>">
		<div class="pop_cts popup_contents<?php echo $ii;?>">
			<?php if($popup_row['display']=="0") {?>
				<?php echo stripcslashes($popup_row['content']);?>
			<?} else if($popup_row['display']=='1') {?>
				<? if($popup_row['link_url']) {?><a href="http://<?php echo $popup_row['link_url'];?>"><img src="../../data/designImages/<?php echo $popup_row['popup_images'];?>" <? if($popup_row['popup_img_width']){ ?>width='<?php echo $popup_row['popup_img_width'];?>'<? } ?> <? if($popup_row['popup_img_height']){ ?>height='<?php echo $popup_row['popup_img_height'];?>'<? } ?> ></a>
				<?} else {?><img src="../../data/designImages/<?php echo $popup_row['popup_images'];?>" <? if($popup_row['popup_img_width']){ ?>width=<?php echo $popup_row['popup_img_width'];?><? }else{ ?>width=<?php echo $popup_row['width'];?><? } ?> <? if($popup_row['popup_img_height']){ ?>height=<?php echo $popup_row['popup_img_height'];?><? } ?>>
				<?}?>
			<?}?>
		</div>

		<div class="popup_close<?php echo $ii;?>"><!-- id="btn_popClose"-->
			<input type="checkbox" name="popup_end<?php echo $ii;?>">
			<span>
			<?php if($popup_row['live']=="0") {?>
				오늘 하루 이창을 열지 않음.
			<?} else if($popup_row['live']=="1") {?>
				이창은 다시는 띄우지 않음.
			<?}?>
			</span>
			<a href="javascript:closeWin<?php echo $ii;?>();">[닫기]</a>
		</div>
	</form>
</div>
 
<script type="text/javascript">
cookiedata = document.cookie;  
if ( cookiedata.indexOf("<?php echo $COOKIE_NAME;?>=NO") < 0 ){    
	document.all['divpop<?php echo $ii;?>'].style.visibility = "visible";
}else{
	document.all['divpop<?php echo $ii;?>'].style.visibility = "hidden";
}
</script>


<?php
		$left = $left + $popup_row['width']+"30";
    }
}
//=====================================================================================
?>
