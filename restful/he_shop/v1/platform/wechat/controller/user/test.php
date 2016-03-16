
<?php
/**
 * 为每个用户创建objectId
 */
$data = unserialize(stripslashes(file_get_contents('D:/fresh/user.txt')));
$用户 = $data[0];

$userid = array();
foreach ($用户 as $k=>$v)
	$userid[$v['序号']] = new MongoDB\BSON\ObjectID();

// print_r($userid);
// exit;
	
$en = json_encode($userid);
echo $en;
//print_r($en);
exit;

$de = json_decode($en);
print_r($de);
exit;
	


?>
<script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript'>
$(function()
{
	var userid = <?php echo json_encode($userid);?>;
	var page = 76;
	var timer = window.setInterval("Ajax('../../restful.php?master=user&controller=user.move&action=move')",31000);

	Ajax = function(url)
	{
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {page: page, userid: userid},
			url: url,
			success:function(data)
			{		
				document.write("第"+page+"页数据:</br>");	
				switch(data.return)
				{
					case 'OK':
						var start = (page-1)*500;
						var end = page*500;
						document.write("	  " + start + " ~ " + end + " 条执行:成功!</br>");
						if (page >= 79)
							window.clearInterval(timer); 
						page ++;
						break;
						
					default:
						var start = (page-1)*500;
						var end = page*500;
						document.write("	  " + start + " ~ " + end + " 条执行:失败!</br>");
						break;
				};
			},
			error:function()
			{
				alert("地址错误或访问的文件程序出错！");
				return false;
			}
		});
	}
	
});

</script>